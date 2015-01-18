<?php
App::uses('AppController', 'Controller');
/**
 * Compos Controller
 *
 * @property Compo $Compo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ComposController extends AppController {

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
		$this->Compo->recursive = 0;
		$this->set('compos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Compo->exists($id)) {
			throw new NotFoundException(__('Invalid compo'));
		}
		$options = array('conditions' => array('Compo.' . $this->Compo->primaryKey => $id));
		$this->set('compo', $this->Compo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Compo->create();
			if ($this->Compo->save($this->request->data)) {
				$this->Session->setFlash(__('The compo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compo could not be saved. Please, try again.'));
			}
		}
		$games = $this->Compo->Game->find('list');
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
		if (!$this->Compo->exists($id)) {
			throw new NotFoundException(__('Invalid compo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Compo->save($this->request->data)) {
				$this->Session->setFlash(__('The compo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Compo.' . $this->Compo->primaryKey => $id));
			$this->request->data = $this->Compo->find('first', $options);
		}
		$games = $this->Compo->Game->find('list');
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
		$this->Compo->id = $id;
		if (!$this->Compo->exists()) {
			throw new NotFoundException(__('Invalid compo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Compo->delete()) {
			$this->Session->setFlash(__('The compo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The compo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
