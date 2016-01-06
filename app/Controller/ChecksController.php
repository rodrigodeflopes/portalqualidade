<?php
App::uses('AppController', 'Controller');
/**
 * Checks Controller
 *
 * @property Check $Check
 * @property PaginatorComponent $Paginator
 */
class ChecksController extends AppController {

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
            $this->Check->recursive = 0;
            $checks = $this->Check->find('all', array(
                'conditions' => array(
                    'Service.enterprise_id' => $this->Session->read('enterpriseId')
                )
            ));
            $this->set('checks', $checks);
            //debug($checks);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Check->exists($id)) {
			throw new NotFoundException(__('Invalid check'));
		}
		$options = array('conditions' => array('Check.' . $this->Check->primaryKey => $id));
		$this->set('check', $this->Check->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Check->create();
			if ($this->Check->save($this->request->data)) {
				$this->Session->setFlash(__('The check has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The check could not be saved. Please, try again.'));
			}
		}
		$services = $this->Check->Service->find('list');
		$this->set(compact('services'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Check->exists($id)) {
			throw new NotFoundException(__('Invalid check'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Check->save($this->request->data)) {
				$this->Session->setFlash(__('The check has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The check could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Check.' . $this->Check->primaryKey => $id));
			$this->request->data = $this->Check->find('first', $options);
		}
		$services = $this->Check->Service->find('list');
		$this->set(compact('services'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Check->id = $id;
		if (!$this->Check->exists()) {
			throw new NotFoundException(__('Invalid check'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Check->delete()) {
			$this->Session->setFlash(__('The check has been deleted.'));
		} else {
			$this->Session->setFlash(__('The check could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
