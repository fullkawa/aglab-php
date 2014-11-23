<?php
App::uses('AppController', 'Controller');
/**
 * GamesPlugins Controller
 *
 * @property GamesPlugin $GamesPlugin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GamesPluginsController extends AppController {

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
		$this->GamesPlugin->recursive = 0;
		$this->set('gamesPlugins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GamesPlugin->exists($id)) {
			throw new NotFoundException(__('Invalid games plugin'));
		}
		$options = array('conditions' => array('GamesPlugin.' . $this->GamesPlugin->primaryKey => $id));
		$this->set('gamesPlugin', $this->GamesPlugin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GamesPlugin->create();
			if ($this->GamesPlugin->save($this->request->data)) {
				$this->Session->setFlash(__('The games plugin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The games plugin could not be saved. Please, try again.'));
			}
		}
		$games = $this->GamesPlugin->Game->find('list');
		$plugins = $this->GamesPlugin->Plugin->find('list');
		$this->set(compact('games', 'plugins'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GamesPlugin->exists($id)) {
			throw new NotFoundException(__('Invalid games plugin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GamesPlugin->save($this->request->data)) {
				$this->Session->setFlash(__('The games plugin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The games plugin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GamesPlugin.' . $this->GamesPlugin->primaryKey => $id));
			$this->request->data = $this->GamesPlugin->find('first', $options);
		}
		$games = $this->GamesPlugin->Game->find('list');
		$plugins = $this->GamesPlugin->Plugin->find('list');
		$this->set(compact('games', 'plugins'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GamesPlugin->id = $id;
		if (!$this->GamesPlugin->exists()) {
			throw new NotFoundException(__('Invalid games plugin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GamesPlugin->delete()) {
			$this->Session->setFlash(__('The games plugin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The games plugin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
