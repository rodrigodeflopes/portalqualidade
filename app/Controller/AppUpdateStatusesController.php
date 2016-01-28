<?php
App::uses('AppController', 'Controller');
/**
 * AppUpdateStatuses Controller
 *
 * @property AppUpdateStatus $AppUpdateStatus
 * @property PaginatorComponent $Paginator
 */
class AppUpdateStatusesController extends AppController {

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
		$this->AppUpdateStatus->recursive = 0;
		$this->set('appUpdateStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AppUpdateStatus->exists($id)) {
			throw new NotFoundException(__('Invalid app update status'));
		}
		$options = array('conditions' => array('AppUpdateStatus.' . $this->AppUpdateStatus->primaryKey => $id));
		$this->set('appUpdateStatus', $this->AppUpdateStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AppUpdateStatus->create();
			if ($this->AppUpdateStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The app update status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app update status could not be saved. Please, try again.'));
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
		if (!$this->AppUpdateStatus->exists($id)) {
			throw new NotFoundException(__('Invalid app update status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AppUpdateStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The app update status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app update status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AppUpdateStatus.' . $this->AppUpdateStatus->primaryKey => $id));
			$this->request->data = $this->AppUpdateStatus->find('first', $options);
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
		$this->AppUpdateStatus->id = $id;
		if (!$this->AppUpdateStatus->exists()) {
			throw new NotFoundException(__('Invalid app update status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AppUpdateStatus->delete()) {
			$this->Session->setFlash(__('The app update status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The app update status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
