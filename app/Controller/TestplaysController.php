<?php
App::uses('AppController', 'Controller');
/**
 * Testplays Controller
 *
 * @property Testplay $Testplay
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TestplaysController extends AppController {

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
		$this->Testplay->recursive = 0;
		$this->set('testplays', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Testplay->exists($id)) {
			throw new NotFoundException(__('Invalid testplay'));
		}
		$options = array('conditions' => array('Testplay.' . $this->Testplay->primaryKey => $id));
		$this->set('testplay', $this->Testplay->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Testplay->create();
			if ($this->Testplay->save($this->request->data)) {
				$this->Session->setFlash(__('The testplay has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testplay could not be saved. Please, try again.'));
			}
		}
		$games = $this->Testplay->Game->find('list');
		$this->set(compact('games'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Testplay->exists($id)) {
			throw new NotFoundException(__('Invalid testplay'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Testplay->save($this->request->data)) {
				$this->Session->setFlash(__('The testplay has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testplay could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Testplay.' . $this->Testplay->primaryKey => $id));
			$this->request->data = $this->Testplay->find('first', $options);
		}
		$games = $this->Testplay->Game->find('list');
		$this->set(compact('games'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Testplay->id = $id;
		if (!$this->Testplay->exists()) {
			throw new NotFoundException(__('Invalid testplay'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Testplay->delete()) {
			$this->Session->setFlash(__('The testplay has been deleted.'));
		} else {
			$this->Session->setFlash(__('The testplay could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
