<?php
App::uses('AppController', 'Controller');
/**
 * Plugins Controller
 *
 * @property Plugin $Plugin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PluginsController extends AppController {

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
		$this->Plugin->recursive = 0;
		$this->set('plugins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Plugin->exists($id)) {
			throw new NotFoundException(__('Invalid plugin'));
		}
		$options = array('conditions' => array('Plugin.' . $this->Plugin->primaryKey => $id));
		$this->set('plugin', $this->Plugin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Plugin->create();
			if ($this->Plugin->save($this->request->data)) {
				$this->Session->setFlash(__('The plugin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plugin could not be saved. Please, try again.'));
			}
		}
		$games = $this->Plugin->Game->find('list');
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
		if (!$this->Plugin->exists($id)) {
			throw new NotFoundException(__('Invalid plugin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Plugin->save($this->request->data)) {
				$this->Session->setFlash(__('The plugin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plugin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Plugin.' . $this->Plugin->primaryKey => $id));
			$this->request->data = $this->Plugin->find('first', $options);
		}
		$games = $this->Plugin->Game->find('list');
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
		$this->Plugin->id = $id;
		if (!$this->Plugin->exists()) {
			throw new NotFoundException(__('Invalid plugin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Plugin->delete()) {
			$this->Session->setFlash(__('The plugin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The plugin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
