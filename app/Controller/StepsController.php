<?php
App::uses('AppController', 'Controller');
/**
 * Steps Controller
 *
 * @property Step $Step
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StepsController extends AppController {

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
		$this->Step->recursive = 0;
		$this->set('steps', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Step->exists($id)) {
			throw new NotFoundException(__('Invalid step'));
		}
		$options = array('conditions' => array('Step.' . $this->Step->primaryKey => $id));
		$this->set('step', $this->Step->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Step->create();
			if ($this->Step->save($this->request->data)) {
				$this->Session->setFlash(__('The step has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The step could not be saved. Please, try again.'));
			}
		}
		$plays = $this->Step->Play->find('list');
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
		if (!$this->Step->exists($id)) {
			throw new NotFoundException(__('Invalid step'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Step->save($this->request->data)) {
				$this->Session->setFlash(__('The step has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The step could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Step.' . $this->Step->primaryKey => $id));
			$this->request->data = $this->Step->find('first', $options);
		}
		$plays = $this->Step->Play->find('list');
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
		$this->Step->id = $id;
		if (!$this->Step->exists()) {
			throw new NotFoundException(__('Invalid step'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Step->delete()) {
			$this->Session->setFlash(__('The step has been deleted.'));
		} else {
			$this->Session->setFlash(__('The step could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
