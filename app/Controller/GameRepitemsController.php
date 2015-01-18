<?php
App::uses('AppController', 'Controller');
/**
 * GameRepitems Controller
 *
 * @property GameRepitem $GameRepitem
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GameRepitemsController extends AppController {

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
		$this->GameRepitem->recursive = 0;
		$this->set('gameRepitems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GameRepitem->exists($id)) {
			throw new NotFoundException(__('Invalid game repitem'));
		}
		$options = array('conditions' => array('GameRepitem.' . $this->GameRepitem->primaryKey => $id));
		$this->set('gameRepitem', $this->GameRepitem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GameRepitem->create();
			if ($this->GameRepitem->save($this->request->data)) {
				$this->Session->setFlash(__('The game repitem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game repitem could not be saved. Please, try again.'));
			}
		}
		$games = $this->GameRepitem->Game->find('list');
		$repitems = $this->GameRepitem->Repitem->find('list');
		$this->set(compact('games', 'repitems'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GameRepitem->exists($id)) {
			throw new NotFoundException(__('Invalid game repitem'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GameRepitem->save($this->request->data)) {
				$this->Session->setFlash(__('The game repitem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game repitem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GameRepitem.' . $this->GameRepitem->primaryKey => $id));
			$this->request->data = $this->GameRepitem->find('first', $options);
		}
		$games = $this->GameRepitem->Game->find('list');
		$repitems = $this->GameRepitem->Repitem->find('list');
		$this->set(compact('games', 'repitems'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GameRepitem->id = $id;
		if (!$this->GameRepitem->exists()) {
			throw new NotFoundException(__('Invalid game repitem'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GameRepitem->delete()) {
			$this->Session->setFlash(__('The game repitem has been deleted.'));
		} else {
			$this->Session->setFlash(__('The game repitem could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
