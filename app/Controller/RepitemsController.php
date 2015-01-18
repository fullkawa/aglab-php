<?php
App::uses('AppController', 'Controller');
/**
 * Repitems Controller
 *
 * @property Repitem $Repitem
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RepitemsController extends AppController {

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
		$this->Repitem->recursive = 0;
		$this->set('repitems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Repitem->exists($id)) {
			throw new NotFoundException(__('Invalid repitem'));
		}
		$options = array('conditions' => array('Repitem.' . $this->Repitem->primaryKey => $id));
		$this->set('repitem', $this->Repitem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Repitem->create();
			if ($this->Repitem->save($this->request->data)) {
				$this->Session->setFlash(__('The repitem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The repitem could not be saved. Please, try again.'));
			}
		}
		$games = $this->Repitem->Game->find('list');
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
		if (!$this->Repitem->exists($id)) {
			throw new NotFoundException(__('Invalid repitem'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Repitem->save($this->request->data)) {
				$this->Session->setFlash(__('The repitem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The repitem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Repitem.' . $this->Repitem->primaryKey => $id));
			$this->request->data = $this->Repitem->find('first', $options);
		}
		$games = $this->Repitem->Game->find('list');
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
		$this->Repitem->id = $id;
		if (!$this->Repitem->exists()) {
			throw new NotFoundException(__('Invalid repitem'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Repitem->delete()) {
			$this->Session->setFlash(__('The repitem has been deleted.'));
		} else {
			$this->Session->setFlash(__('The repitem could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
