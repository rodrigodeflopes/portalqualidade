<?php
App::uses('AppController', 'Controller');

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('Xml', 'Utility');

/**
 * Transfers Controller
 *
 * @property Transfer $Transfer
 * @property PaginatorComponent $Paginator
 */
class TransfersController extends AppController {

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
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transfer->exists($id)) {
			throw new NotFoundException(__('Invalid transfer'));
		}
                $this->Transfer->recursive = 0;
		$transfer = $this->Transfer->find('first', array(
                    'conditions' => array(
                        'Transfer.' . $this->Transfer->primaryKey => $id)
                    )
                );
		$this->set('transfer', $transfer);
                //debug($transfer);
                
                
                $this->paginate = array(        
                    'conditions' => array('Measurement.transfer_id' => $id),                    
                    'limit' => 25
                 );
                $measurements = $this->paginate('Measurement');
                
                $this->set('measurements', $measurements);
                //debug($measurements);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Transfer->create();
			if ($this->Transfer->save($this->request->data)) {
				$this->Session->setFlash(__('The transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
			}
		}
		$towers = $this->Transfer->Tower->find('list');
                $TowerId = $id;
		$this->set(compact('towers', 'TowerId'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transfer->exists($id)) {
			throw new NotFoundException(__('Invalid transfer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transfer->save($this->request->data)) {
				$this->Session->setFlash(__('The transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transfer.' . $this->Transfer->primaryKey => $id));
			$this->request->data = $this->Transfer->find('first', $options);
		}
		$enterprises = $this->Transfer->Enterprise->find('list');
		$this->set(compact('enterprises'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $tower_id = null) {
		$this->Transfer->id = $id;
		if (!$this->Transfer->exists()) {
			throw new NotFoundException(__('Invalid transferr'));
		}
		$this->request->allowMethod('post', 'delete');
                
//                //Primeiro deletar todas as medições.
//                $this->Transfer->Measurement->deleteAll(array(
//                    'Measurement.transfer_id' => $id
//                ), false);
		
                //Apaga o item de transferencia selecionado.
                if ($this->Transfer->delete($id, true)) {
			$this->Session->setFlash(__('The transfer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transfer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'towers', 'action' => 'view', $tower_id));
	}
        
/**
 * Upload AJAX
 */        
        public function upload($uuid) { 
            $this->layout = 'ajax';
            
            $this->loadModel('Device');
            $this->Device->recursive = 0;
            $device = $this->Device->find('first', array('conditions' => array('uuid' => $uuid)));
            
            $arrayForm = $this->request['form'];
            if($arrayForm){
                if($device){                    
                    //Abre o arquivo json de upload temporário e converte em array.
                    $file = new File($arrayForm['file']['tmp_name']);
                    $jsonText = $file->read(true, 'r');
                    $jsonArray = json_decode($jsonText, true);
                      
                    //Salva as informações em transfers
                    $arrayTransfer = array('Transfer' => array('tower_id' => $jsonArray['Info']['tower_id'], 'device_id' => $device['Device']['id']));                        
                    $this->Transfer->create();
                        if ($this->Transfer->save($arrayTransfer)) {
        				
                            foreach ($jsonArray['Item'] as $measurements):
                                $newMeasurements = array('Measurement' => array( 
                                    'item_id' => $measurements['id'],
                                    'transfer_id' => $this->Transfer->id,
                                    'checked' => $measurements['checked'],
                                    'note' => $measurements['note'],
                                ));
                                $this->Transfer->Measurement->create();
                                $this->Transfer->Measurement->save($newMeasurements);  //Implementar se der erro de save apagar o transfer inserido acima. Obs vc já tem o id dele.
                                
                                $newLastMeasurements = array('Item' => array( 
                                    'id' => $measurements['id'],
                                    'lastChecked' => $measurements['checked'],
                                    'lastNote' => $measurements['note'],
                                ));
                                $this->loadModel('Item');
                                $this->Item->save($newLastMeasurements);
                                
                            endforeach;                                
                            $this->set('message', true);  
        				
                        } else {
                                $this->set('message', 'Erro ao gravar Transfer!');
                        }
                            
                }else{                
                    $this->set('message', 'Dispositivo não habilitado!');
                }
            }else{                
                $this->set('message', 'Arquivo não carregado');              
            }       
            
            
            //Upload das fotos.            
            $jsonData = $this->request->input();
            if($jsonData){
                $jsonArray = array('Photo' => json_decode($jsonData, true)); 
                
                $this->loadModel('Photo');  
                $photo = $this->Photo->findByName($jsonArray['Photo']['name']);
                if(empty($photo)){
                    $this->Photo->create();
                    if ($this->Photo->save($jsonArray)) {
                        $this->set('message', $jsonData);                               

                    }else{
                        $this->set('message', 'Erro!');
                    } 
                }else{
                    $this->set('message', 'Existente');
                }
            }
            
        } 
        
/**
 * Download AJAX
 */        
        public function download($tower_id, $uuid) { 
                $this->layout = 'ajax';
                                
                //Verificar se o Dispositivo tem permissão para acesso, se já é cadastrado.
                //$this->loadModel('Device');
                $this->Transfer->Device->recursive = 0;
                $device = $this->Transfer->Device->find('first', array('conditions' => array('uuid' => $uuid)));                
                if($device){  
            
                    $this->loadModel('Item');
                    $items = $this->Item->find('all', array(  
                        'contain' => array(
                            'Tower',
                            'Location1',
                            'Location2',
                            'Location3',
                            'Service',
                            'Check',
                            'Measurement' => array(
                                'order' => 'transfer_id DESC',
                                'limit' => 1
                            ),
                        ),
                        'conditions' => array(  
                            'Item.Tower_id' => $tower_id
                        ),
                        'fields' => array(
                            'Item.id', 'Tower.name', 'Location1.name', 'Location2.name', 'Location3.name', 'Service.name', 'Check.name', 'Check.method'
                        )
                    ));
                    //debug($items);
                    
                    //$this->loadModel('Tower');
                    $tower = $this->Transfer->Tower->find('first', array(
                        'recursive' => 0,
                        'conditions' => array(
                            'Tower.id =' => $tower_id
                        )
                    ));
                    //debug($tower);
                                   
                    foreach ($items as $item):
                        
                        if(Set::check($item, 'Measurement.0')){       
                            $checked = $item['Measurement'][0]['checked'];
                            $note = $item['Measurement'][0]['note'];
                        }
                        
                        $newItems[] = array( 
                            'id' => $item['Item']['id'],
                            'loc1' => $item['Location1']['name'],
                            'loc2' => $item['Location2']['name'],
                            'loc3' => $item['Location3']['name'],
                            'loc4' => $item['Service']['name'],
                            'name' => $item['Check']['name'],
                            'method' => $item['Check']['method'],
                            'checked' => $checked,
                            'note' => $note,
                            'image' => '',
                        );
                    endforeach; 

                    $output = array('Item' => $newItems);

                    //adicionando tag de informações e juntando com items.
                    $arrayInfo = array('Info' => array(
                        'tower_id' => $tower['Tower']['id'], 
                        'towerName' => $tower['Tower']['name'],
                        'enterprise_id' => $tower['Townhouse']['id'],
                        'enterpriseName' => $tower['Townhouse']['name'],
                        'countItems' => count($items),
                        'countChecked' => 0,
                        'fileDate' => date('Y-m-d')
                    ));
                    $output = Set::merge($arrayInfo, $output);

                    //Conversão do array em JSON.
                    $jsonString = json_encode($output);

                    //Salvando o objeto como arquivo.
                    $file_path = 'files' . DS . 'downloads' . DS . 'test.json';   
                    $file = new File($file_path, true, 0777);
                    $contents = $file->read();
                    $file->write($jsonString);
                    $file->close();

                    //debug($jsonString);           
                    //debug($jsonString);            
                    //debug(json_decode($jsonString, TRUE));
                    
                    $this->autoRender = false;

                    $this->response->file(
                        "files/downloads/test.json",
                        array(
                                'download' => true
                        )
                    );
                    
                    return $this->response;
                }else{
                    
                    $this->set('message', false);
                }
                
                //apagar arquivo após download.
                    
        } 
        

/**
 * app update
 */        
        public function appUpdate($uuid, $appVersion) { 
            
            //Verificar se o Dispositivo tem permissão para acesso, se já é cadastrado.
            $this->loadModel('Device');
            $this->Device->recursive = 0;
            $device = $this->Device->find('first', array('conditions' => array('uuid' => $uuid)));                
            if($device){                 
                $this->response->file(
                    "files/downloads/app_updates/current_update/android-debug.apk",
                    array(
                            'download' => true
                    )
                );            
                return $this->response;  
            }else{                    
                $this->set('message', false);
            }
        } 
        
        
/**
 * TransfersFound method
 *
 */
        public function transfersFound() {
            
            $this->autoRender = false;
            
            //$conditions = array();
            
            //$conditions[] = array('Tower.townhouse_id' => 1);             
            //debug($conditions);
            //debug($this->request); 
            
            //lista de transferências
            $transfers = $this->Transfer->find('all', array(
                'recursive' => 0,
            ));
            //debug($transfers);
            
            
            $result = array();     
            foreach($transfers as $transfer) {
                $result[] = array($transfer['Device']['name'], $transfer['Tower']['name'], $transfer['Transfer']['created'], '<i class="icon-camera"></i>');                        
            }        
            $result = array('draw' => 10, 'recordsTotal' => count($transfers), 'recordsFiltered' => count($transfers), 'data' => $result);     
            
            
            //debug($result);            
            
            echo json_encode($result);  
            
        }  
 

/**
 * Permissões diretas
 */        
        public function beforeFilter() { 
                parent::beforeFilter(); 
                $this->Auth->allow('upload', 'download', 'appUpdate'); 
        } 
        
}
