<?php
App::uses('AppController', 'Controller');
/**
 * Townhouses Controller
 *
 * @property Townhouse $Townhouse
 * @property PaginatorComponent $Paginator
 */
class TownhousesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Townhouse->recursive = 0;
		$this->set('townhouses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Townhouse->exists($id)) {
			throw new NotFoundException(__('Invalid townhouse'));
		}
		$options = array('conditions' => array('Townhouse.' . $this->Townhouse->primaryKey => $id));
		$this->set('townhouse', $this->Townhouse->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Townhouse->create();
			if ($this->Townhouse->save($this->request->data)) {
				$this->Session->setFlash(__('The townhouse has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The townhouse could not be saved. Please, try again.'));
			}
		}
		$enterprises = $this->Townhouse->Enterprise->find('list');
		$this->set(compact('enterprises'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Townhouse->exists($id)) {
			throw new NotFoundException(__('Invalid townhouse'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Townhouse->save($this->request->data)) {
				$this->Session->setFlash(__('The townhouse has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The townhouse could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Townhouse.' . $this->Townhouse->primaryKey => $id));
			$this->request->data = $this->Townhouse->find('first', $options);
		}
		$enterprises = $this->Townhouse->Enterprise->find('list');
		$this->set(compact('enterprises'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Townhouse->id = $id;
		if (!$this->Townhouse->exists()) {
			throw new NotFoundException(__('Invalid townhouse'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Townhouse->delete()) {
			$this->Session->setFlash(__('The townhouse has been deleted.'));
		} else {
			$this->Session->setFlash(__('The townhouse could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
