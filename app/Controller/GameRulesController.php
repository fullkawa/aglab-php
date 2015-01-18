<?php
App::uses('AppController', 'Controller');
/**
 * GameRules Controller
 *
 * @property GameRule $GameRule
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GameRulesController extends AppController {

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
		$this->GameRule->recursive = 0;
		$this->set('gameRules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GameRule->exists($id)) {
			throw new NotFoundException(__('Invalid game rule'));
		}
		$options = array('conditions' => array('GameRule.' . $this->GameRule->primaryKey => $id));
		$this->set('gameRule', $this->GameRule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GameRule->create();
			if ($this->GameRule->save($this->request->data)) {
				$this->Session->setFlash(__('The game rule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game rule could not be saved. Please, try again.'));
			}
		}
		$games = $this->GameRule->Game->find('list');
		$rules = $this->GameRule->Rule->find('list');
		$this->set(compact('games', 'rules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GameRule->exists($id)) {
			throw new NotFoundException(__('Invalid game rule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GameRule->save($this->request->data)) {
				$this->Session->setFlash(__('The game rule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game rule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GameRule.' . $this->GameRule->primaryKey => $id));
			$this->request->data = $this->GameRule->find('first', $options);
		}
		$games = $this->GameRule->Game->find('list');
		$rules = $this->GameRule->Rule->find('list');
		$this->set(compact('games', 'rules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GameRule->id = $id;
		if (!$this->GameRule->exists()) {
			throw new NotFoundException(__('Invalid game rule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GameRule->delete()) {
			$this->Session->setFlash(__('The game rule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The game rule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
