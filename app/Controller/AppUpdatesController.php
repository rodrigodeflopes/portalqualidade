<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

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
	public $components = array('Paginator', 'Upload');

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
                        debug($this->request->data);
                        
//			$this->AppUpdate->create();
//			if ($this->AppUpdate->save($this->request->data)) {
//                            
//                                //Salva o arquivo APK.
//                                $file = $this->request->data['AppUpdate']['uploadfile'];         
//                                if (!empty($file['tmp_name'])) {                                                                        
//                                    //Salva o arquivo de upload.                                                    
//                                    $file_path = 'files' . DS . 'uploads' . DS . 'appUpdates' . DS . $this->AppUpdate->id;   
//                                    $allowed = array('apk');                            
//                                    $file_path_abs = $this->Upload->upload($file, $file_path, $allowed);
//                                    if (!$file_path_abs) {
//                                        $this->Session->setFlash(__('Tipo de arquivo não suportado, tente novamete!'),'alert_error');
//                                        return $this->redirect(array('action' => 'add'));
//                                    }  
//                                    $this->request->data['AppUpdate']['app_path'] = DS . $file_path_abs;
//                                }      
//                            
//				$this->Session->setFlash(__('Update salvo com sucesso.'),'alert_success');
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('O update não pode ser salvo, tente novamente!'),'alert_error');
//			}
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
