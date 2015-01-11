<?php
App::uses('AppController', 'Controller');
/**
 * Plays Controller
 *
 * @property Play $Play
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlaysController extends AppController {

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
		$this->Play->recursive = 0;
		$this->set('plays', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Play->exists($id)) {
			throw new NotFoundException(__('Invalid play'));
		}
		$options = array('conditions' => array('Play.' . $this->Play->primaryKey => $id));
		$this->set('play', $this->Play->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Play->create();
			if ($this->Play->save($this->request->data)) {
				$this->Session->setFlash(__('The play has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The play could not be saved. Please, try again.'));
			}
		}
		$testplays = $this->Play->Testplay->find('list');
		$this->set(compact('testplays'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Play->exists($id)) {
			throw new NotFoundException(__('Invalid play'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Play->save($this->request->data)) {
				$this->Session->setFlash(__('The play has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The play could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Play.' . $this->Play->primaryKey => $id));
			$this->request->data = $this->Play->find('first', $options);
		}
		$testplays = $this->Play->Testplay->find('list');
		$this->set(compact('testplays'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Play->id = $id;
		if (!$this->Play->exists()) {
			throw new NotFoundException(__('Invalid play'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Play->delete()) {
			$this->Session->setFlash(__('The play has been deleted.'));
		} else {
			$this->Session->setFlash(__('The play could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
