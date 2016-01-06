<?php
App::uses('AppController', 'Controller');
/**
 * AppUpdates Controller
 *
 * @property AppUpdate $AppUpdate
 * @property PaginatorComponent $Paginator
 */
class AppUpdatesController extends AppController {

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
		$this->AppUpdate->recursive = 0;
                $appUpdates = $this->Paginator->paginate();
		$this->set('appUpdates', $appUpdates);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AppUpdate->exists($id)) {
			throw new NotFoundException(__('Invalid app update'));
		}
		$options = array('conditions' => array('AppUpdate.' . $this->AppUpdate->primaryKey => $id));
		$this->set('appUpdate', $this->AppUpdate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AppUpdate->create();
			if ($this->AppUpdate->save($this->request->data)) {
				$this->Session->setFlash(__('The app update has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app update could not be saved. Please, try again.'));
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
		if (!$this->AppUpdate->exists($id)) {
			throw new NotFoundException(__('Invalid app update'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AppUpdate->save($this->request->data)) {
				$this->Session->setFlash(__('The app update has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app update could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AppUpdate.' . $this->AppUpdate->primaryKey => $id));
			$this->request->data = $this->AppUpdate->find('first', $options);
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
		$this->AppUpdate->id = $id;
		if (!$this->AppUpdate->exists()) {
			throw new NotFoundException(__('Invalid app update'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AppUpdate->delete()) {
			$this->Session->setFlash(__('The app update has been deleted.'));
		} else {
			$this->Session->setFlash(__('The app update could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
