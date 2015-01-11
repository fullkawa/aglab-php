<?php
App::uses('AppController', 'Controller');
/**
 * ReportItems Controller
 *
 * @property ReportItem $ReportItem
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ReportItemsController extends AppController {

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
		$this->ReportItem->recursive = 0;
		$this->set('reportItems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReportItem->exists($id)) {
			throw new NotFoundException(__('Invalid report item'));
		}
		$options = array('conditions' => array('ReportItem.' . $this->ReportItem->primaryKey => $id));
		$this->set('reportItem', $this->ReportItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReportItem->create();
			if ($this->ReportItem->save($this->request->data)) {
				$this->Session->setFlash(__('The report item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report item could not be saved. Please, try again.'));
			}
		}
		$games = $this->ReportItem->Game->find('list');
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
		if (!$this->ReportItem->exists($id)) {
			throw new NotFoundException(__('Invalid report item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ReportItem->save($this->request->data)) {
				$this->Session->setFlash(__('The report item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ReportItem.' . $this->ReportItem->primaryKey => $id));
			$this->request->data = $this->ReportItem->find('first', $options);
		}
		$games = $this->ReportItem->Game->find('list');
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
		$this->ReportItem->id = $id;
		if (!$this->ReportItem->exists()) {
			throw new NotFoundException(__('Invalid report item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ReportItem->delete()) {
			$this->Session->setFlash(__('The report item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The report item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
