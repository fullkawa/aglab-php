<?php
App::uses('AppController', 'Controller');
/**
 * Repdata Controller
 *
 * @property Repdata $Repdata
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RepdataController extends AppController {

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
		$this->Repdata->recursive = 0;
		$this->set('repdata', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Repdata->exists($id)) {
			throw new NotFoundException(__('Invalid repdata'));
		}
		$options = array('conditions' => array('Repdata.' . $this->Repdata->primaryKey => $id));
		$this->set('repdata', $this->Repdata->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Repdata->create();
			if ($this->Repdata->save($this->request->data)) {
				$this->Session->setFlash(__('The repdata has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The repdata could not be saved. Please, try again.'));
			}
		}
		$plays = $this->Repdata->Play->find('list');
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
		if (!$this->Repdata->exists($id)) {
			throw new NotFoundException(__('Invalid repdata'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Repdata->save($this->request->data)) {
				$this->Session->setFlash(__('The repdata has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The repdata could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Repdata.' . $this->Repdata->primaryKey => $id));
			$this->request->data = $this->Repdata->find('first', $options);
		}
		$plays = $this->Repdata->Play->find('list');
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
		$this->Repdata->id = $id;
		if (!$this->Repdata->exists()) {
			throw new NotFoundException(__('Invalid repdata'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Repdata->delete()) {
			$this->Session->setFlash(__('The repdata has been deleted.'));
		} else {
			$this->Session->setFlash(__('The repdata could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
