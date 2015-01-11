<?php
App::uses('AppController', 'Controller');
/**
 * PlayHistories Controller
 *
 * @property PlayHistory $PlayHistory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlayHistoriesController extends AppController {

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
		$this->PlayHistory->recursive = 0;
		$this->set('playHistories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlayHistory->exists($id)) {
			throw new NotFoundException(__('Invalid play history'));
		}
		$options = array('conditions' => array('PlayHistory.' . $this->PlayHistory->primaryKey => $id));
		$this->set('playHistory', $this->PlayHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayHistory->create();
			if ($this->PlayHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The play history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The play history could not be saved. Please, try again.'));
			}
		}
		$plays = $this->PlayHistory->Play->find('list');
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
		if (!$this->PlayHistory->exists($id)) {
			throw new NotFoundException(__('Invalid play history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlayHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The play history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The play history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlayHistory.' . $this->PlayHistory->primaryKey => $id));
			$this->request->data = $this->PlayHistory->find('first', $options);
		}
		$plays = $this->PlayHistory->Play->find('list');
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
		$this->PlayHistory->id = $id;
		if (!$this->PlayHistory->exists()) {
			throw new NotFoundException(__('Invalid play history'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PlayHistory->delete()) {
			$this->Session->setFlash(__('The play history has been deleted.'));
		} else {
			$this->Session->setFlash(__('The play history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
