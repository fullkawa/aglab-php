<?php
App::uses('AppController', 'Controller');
/**
 * PlayDatas Controller
 *
 * @property PlayData $PlayData
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlayDatasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlayData->recursive = 0;
		$this->set('playData', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlayData->exists($id)) {
			throw new NotFoundException(__('Invalid play data'));
		}
		$options = array('conditions' => array('PlayData.' . $this->PlayData->primaryKey => $id));
		$this->set('playData', $this->PlayData->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayData->create();
			if ($this->PlayData->save($this->request->data)) {
				$this->Session->setFlash(__('The play data has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The play data could not be saved. Please, try again.'));
			}
		}
		$plays = $this->PlayData->Play->find('list');
		$this->set(compact('plays'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PlayData->exists($id)) {
			throw new NotFoundException(__('Invalid play data'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlayData->save($this->request->data)) {
				$this->Session->setFlash(__('The play data has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The play data could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlayData.' . $this->PlayData->primaryKey => $id));
			$this->request->data = $this->PlayData->find('first', $options);
		}
		$plays = $this->PlayData->Play->find('list');
		$this->set(compact('plays'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PlayData->id = $id;
		if (!$this->PlayData->exists()) {
			throw new NotFoundException(__('Invalid play data'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PlayData->delete()) {
			$this->Session->setFlash(__('The play data has been deleted.'));
		} else {
			$this->Session->setFlash(__('The play data could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
