<?php
App::uses('AppController', 'Controller');
/**
 * Devices Controller
 *
 * @property Device $Device
 * @property PaginatorComponent $Paginator
 */
class DevicesController extends AppController {

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
                $devices = $this->Device->find('all');
                $this->set('devices', $devices);
                //debug($devices);
                
                //Update atual
                $this->loadModel('AppUpdate');
                $currentUpdate = $this->AppUpdate->find('first', array(
                    'conditions' => array(
                        'app_update_status_id' => '1'
                    ),
                    'fields' => array(
                        'AppUpdate.name'
                    )
                ));
                $this->set('currentUpdate', $currentUpdate);
                //debug($currentUpdate);
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Device->exists($id)) {
			throw new NotFoundException(__('Invalid device'));
		}
		$options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
		$this->set('device', $this->Device->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($enterprise_id = null) {                
		if ($this->request->is('post')) {
                    
			$this->Device->create();
			if ($this->Device->save($this->request->data)) {
				$this->Session->setFlash(__('The device has been saved.'));
				return $this->redirect(array('controller' => 'enterprises', 'action' => 'view', $enterprise_id));
			} else {
				$this->Session->setFlash(__('The device could not be saved. Please, try again.'));
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
		if (!$this->Device->exists($id)) {
			throw new NotFoundException(__('Invalid device'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Device->save($this->request->data)) {
				$this->Session->setFlash(__('The device has been saved.'));
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The device could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
			$this->request->data = $this->Device->find('first', $options);
		}
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
		$this->Device->id = $id;
		if (!$this->Device->exists()) {
			throw new NotFoundException(__('Invalid device'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Device->delete()) {
			$this->Session->setFlash(__('The device has been deleted.'));
		} else {
			$this->Session->setFlash(__('The device could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
/**
 * Upload Device AJAX
 */        
        public function uploadDevice() { 
                $this->layout = 'ajax';                                        
                $jsonData = $this->request->input();
                if(!empty($jsonData)){
                    
                        $arrayData = array('Device' => json_decode($jsonData, true));
                                               
                        if(!$this->Device->findByUuid($arrayData['Device']['uuid'])){
                                $arrayData['Device']['name'] = 'Não informado';
                                $arrayData['Device']['image_path'] = 'devices.png';
                                //$message = print_r($arrayData);
                                if ($this->Device->save($arrayData)) {
                                        $message = 'Dispositivo habilitado com sucesso!';
                                } else {
                                        $message = false;
                                }                                 
                                $this->set('message', $message);
                        }else{
                                
                                $this->set('message', 'Dispositivo já habilitado!!');
                        }
                }else{
                    $this->set('message', 'Failed!');
                }
        } 

/**
 * Permissões diretas
 */        
        public function beforeFilter() { 
                parent::beforeFilter(); 
                $this->Auth->allow('uploadDevice'); 
        } 
        
}


