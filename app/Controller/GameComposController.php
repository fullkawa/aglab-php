<?php
App::uses('AppController', 'Controller');
/**
 * GameCompos Controller
 *
 * @property GameCompo $GameCompo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GameComposController extends AppController {

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
		$this->GameCompo->recursive = 0;
		$this->set('gameCompos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GameCompo->exists($id)) {
			throw new NotFoundException(__('Invalid game compo'));
		}
		$options = array('conditions' => array('GameCompo.' . $this->GameCompo->primaryKey => $id));
		$this->set('gameCompo', $this->GameCompo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GameCompo->create();
			if ($this->GameCompo->save($this->request->data)) {
				$this->Session->setFlash(__('The game compo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game compo could not be saved. Please, try again.'));
			}
		}
		$games = $this->GameCompo->Game->find('list');
		$compos = $this->GameCompo->Compo->find('list');
		$this->set(compact('games', 'compos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GameCompo->exists($id)) {
			throw new NotFoundException(__('Invalid game compo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GameCompo->save($this->request->data)) {
				$this->Session->setFlash(__('The game compo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game compo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GameCompo.' . $this->GameCompo->primaryKey => $id));
			$this->request->data = $this->GameCompo->find('first', $options);
		}
		$games = $this->GameCompo->Game->find('list');
		$compos = $this->GameCompo->Compo->find('list');
		$this->set(compact('games', 'compos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GameCompo->id = $id;
		if (!$this->GameCompo->exists()) {
			throw new NotFoundException(__('Invalid game compo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GameCompo->delete()) {
			$this->Session->setFlash(__('The game compo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The game compo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
