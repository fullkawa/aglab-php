<?php
App::uses('AppController', 'Controller');
/**
 * GameComponents Controller
 *
 * @property GameComponent $GameComponent
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GameComponentsController extends AppController {

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
		$this->GameComponent->recursive = 0;
		$this->set('gameComponents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GameComponent->exists($id)) {
			throw new NotFoundException(__('Invalid game component'));
		}
		$options = array('conditions' => array('GameComponent.' . $this->GameComponent->primaryKey => $id));
		$this->set('gameComponent', $this->GameComponent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GameComponent->create();
			if ($this->GameComponent->save($this->request->data)) {
				$this->Session->setFlash(__('The game component has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game component could not be saved. Please, try again.'));
			}
		}
		$games = $this->GameComponent->Game->find('list');
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
		if (!$this->GameComponent->exists($id)) {
			throw new NotFoundException(__('Invalid game component'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GameComponent->save($this->request->data)) {
				$this->Session->setFlash(__('The game component has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game component could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GameComponent.' . $this->GameComponent->primaryKey => $id));
			$this->request->data = $this->GameComponent->find('first', $options);
		}
		$games = $this->GameComponent->Game->find('list');
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
		$this->GameComponent->id = $id;
		if (!$this->GameComponent->exists()) {
			throw new NotFoundException(__('Invalid game component'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GameComponent->delete()) {
			$this->Session->setFlash(__('The game component has been deleted.'));
		} else {
			$this->Session->setFlash(__('The game component could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
