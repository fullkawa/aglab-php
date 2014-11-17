<?php
App::uses('AppController', 'Controller');
/**
 * PlayConditions Controller
 *
 * @property PlayCondition $PlayCondition
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlayConditionsController extends AppController {

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
		$this->PlayCondition->recursive = 0;
		$this->set('playConditions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlayCondition->exists($id)) {
			throw new NotFoundException(__('Invalid play condition'));
		}
		$options = array('conditions' => array('PlayCondition.' . $this->PlayCondition->primaryKey => $id));
		$this->set('playCondition', $this->PlayCondition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayCondition->create();
			if ($this->PlayCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The play condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The play condition could not be saved. Please, try again.'));
			}
		}
		$plays = $this->PlayCondition->Play->find('list');
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
		if (!$this->PlayCondition->exists($id)) {
			throw new NotFoundException(__('Invalid play condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlayCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The play condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The play condition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlayCondition.' . $this->PlayCondition->primaryKey => $id));
			$this->request->data = $this->PlayCondition->find('first', $options);
		}
		$plays = $this->PlayCondition->Play->find('list');
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
		$this->PlayCondition->id = $id;
		if (!$this->PlayCondition->exists()) {
			throw new NotFoundException(__('Invalid play condition'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PlayCondition->delete()) {
			$this->Session->setFlash(__('The play condition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The play condition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
