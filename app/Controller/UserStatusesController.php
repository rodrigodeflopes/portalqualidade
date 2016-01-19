<?php
App::uses('AppController', 'Controller');
/**
 * UserStatuses Controller
 *
 * @property UserStatus $UserStatus
 * @property PaginatorComponent $Paginator
 */
class UserStatusesController extends AppController {

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
		$this->UserStatus->recursive = 0;
		$this->set('userStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserStatus->exists($id)) {
			throw new NotFoundException(__('Invalid user status'));
		}
		$options = array('conditions' => array('UserStatus.' . $this->UserStatus->primaryKey => $id));
		$this->set('userStatus', $this->UserStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserStatus->create();
			if ($this->UserStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The user status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user status could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserStatus->exists($id)) {
			throw new NotFoundException(__('Invalid user status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The user status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserStatus.' . $this->UserStatus->primaryKey => $id));
			$this->request->data = $this->UserStatus->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserStatus->id = $id;
		if (!$this->UserStatus->exists()) {
			throw new NotFoundException(__('Invalid user status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserStatus->delete()) {
			$this->Session->setFlash(__('The user status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
