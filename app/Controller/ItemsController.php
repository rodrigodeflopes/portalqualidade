<?php
App::uses('AppController', 'Controller');

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('Xml', 'Utility');

/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends AppController {

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
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
                $items = $this->Item->find('first', array(
                    'conditions' => array(
                        'Item.' . $this->Item->primaryKey => $id
                    ),
                ));
		$this->set('item', $items);                
                //debug($items);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Item->create();
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		}
		$towers = $this->Item->Tower->find('list');
		$this->set(compact('towers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		$towers = $this->Item->Tower->find('list');
		$this->set(compact('towers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Item->delete()) {
			$this->Session->setFlash(__('The item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
       
/**
 * research method
 *
 */
	public function research() {      
            
        }
        
/**
 * itemsFound method
 *
 */
        public function itemsFound($townhouses = null, $towers = null, $loc1 = null, $loc2 = null, $services = null, $checks = null, $checked1 = null, $checked2 = null, $checked3 = null) {
            
            $this->autoRender = false;
            
            $conditions = array();
            
            if($townhouses !== 'null'  && $townhouses !== null){
                $townhouses = split(',', $townhouses);
                $conditions[] = array('Tower.townhouse_id' => $townhouses);
            }
            if($towers !== 'null'  && $towers !== null){
                $towers = split(',', $towers);
                $conditions[] = array('Item.tower_id' => $towers);
            } 
            if($loc1 !== 'null' && $loc1 !== null){
                $loc1 = split(',', $loc1);
                $conditions[] = array('Item.Location1_id' => $loc1);
            } 
            if($loc2 !== 'null' && $loc2 !== null){
                $loc2 = split(',', $loc2);
                $conditions[] = array('Item.Location2_id' => $loc2);
            } 
//            if($loc3 !== 'null' && $loc3 !== null){
//                $loc3 = split(',', $loc3);
//                $conditions[] = array('Item.Location3_id' => $loc3);
//            } 
            if($services !== 'null' && $services !== null){
                $services = split(',', $services);
                $conditions[] = array('Item.Service_id' => $services);
            } 
            if($checks !== 'null' && $checks !== null){
                $checks = split(',', $checks);
                $conditions[] = array('Item.Check_id' => $checks);
            } 
            
            $conditionsChecks = array();
            if(($checked1 !== 'null' && $checked1 !== null) || ($checked2 !== 'null' && $checked2 !== null) || ($checked3 !== 'null' && $checked3 !== null)){
                if($checked1 !== 'null' && $checked1 !== null){
                    $conditionsChecks[] = $checked1;
                }
                if($checked2 !== 'null' && $checked2 !== null){
                    $conditionsChecks[] = $checked2;
                }
                if($checked3 !== 'null' && $checked3 !== null){
                    $conditionsChecks[] = $checked3;
                }
                $conditions[] = array('Item.lastChecked' => $conditionsChecks);
            }
            //debug($conditions);
            //debug($this->request); 
            
            //lista de Itens
            //OBS.  o containable só funciona se colocado (public $actsAs = array('Containable'); em appModel.
            $items = $this->Item->find('all', array(    
                'recursive' => -2,
                'contain' => array(
                    'Tower.Townhouse', 
                    'Location1',
                    'Location2',
                    'Location3',
                    'Service',
                    'Check',
                    'Photo' => array(
                        'limit' => 1
                    )
                ),
                'conditions' => $conditions,
                'limit' => 1500
            ));
            //debug($items);
            
            
            $result = array();     
            foreach($items as $item) {   
                
                $EnterpriseTownhouse = "<div class='text-semibold'<h6>" . $item['Tower']['Townhouse']['name'] . "</h6></div><div class='text-muted'>" . $item['Tower']['name'] . "</div>";
                
                //Verificar o tipo medido.                                    
                if($item['Item']['lastChecked'] === '1'){
                    $checked = '<i class="icon-thumbs-up3 text-success"></i>';
                }else if($item['Item']['lastChecked'] === '2'){
                    $checked = '<i class="icon-thumbs-down3 text-danger"></i>';
                }else{
                    $checked = '';
                }               
                
                $actions = "<ul class='icons-list'>";                
                $actions = $actions . (Set::check($item, 'Photo.0') ? "<li><a data-toggle='modal' data-target='#modal_photo' onclick='getPhoto(" . $item['Item']['id'] . ")'><i class='icon-camera'></i></a><li>" : "");                
                $actions = $actions . ($item['Item']['lastNote'] ? "<li><a data-toggle='modal' data-target='#modal_note' onclick='getNote(" . $item['Item']['id'] . ")'><i class='icon-comments'></i></a><li>" : "");                
                $actions = $actions . "</ul>";
                
                $result[] = array(
                    $EnterpriseTownhouse, 
                    $item['Location1']['name'], 
                    $item['Location2']['name'], 
                    $item['Service']['name'], 
                    $item['Item']['id'], 
                    $checked,
                    $actions
                ); 
            }        
            $result = array('draw' => 10, 'recordsTotal' => count($result), 'recordsFiltered' => count($result), 'data' => $result);   
            //debug($result);
            
            echo json_encode($result);              
        }  
        
/*
 *
 * photoFound method
 *
 */
        public function photoFound($itemId = null) {
            $this->autoRender = false;
            
            $this->loadModel('Photo');  
            $photos = $this->Photo->find('all', array(
                'recursive' => 1, 
                'conditions' => array(
                    'Photo.item_id' => $itemId
                )
            ));            
            //debug($photos);
            
            echo json_encode($photos);            
            
        }    
        
/*
 *
 * noteFound method
 *
 */
        public function noteFound($itemId = null) {
            $this->autoRender = false;
                         
            $note = $this->Item->find('first', array(
                'conditions' => array(
                    'Item.id' => $itemId
                )
            ));            
            //debug($photos);
            
            echo $note['Item']['lastNote']; 
        }    
        
/**
 * searchSelects method
 *
 */
        public function searchSelects($select, $dataSearch = null) {
                $this->autoRender = false;
                               
                if($select==='1'){
                        $this->loadModel('Townhouse');                
                        $townhouses = $this->Townhouse->find('all', array(
                            'recursive' => 0,
                            'conditions' => array(
                                'Enterprise.id' => $this->Session->read('enterpriseId'),
                            )
                        ));
                        //debug($townhouses);

                        // Format the result for select2
                        $result = array();                
                        foreach($townhouses as $key => $townhouse) {
                            $result[$key]['value'] = $townhouse['Townhouse']['id'];
                            $result[$key]['label'] = $townhouse['Townhouse']['name'];
                        }                
                }else if($select==='2'){
                        $dataSearch = split(',', $dataSearch); 
                        $this->loadModel('Townhouse');                
                        $townhouses = $this->Townhouse->find('all', array(
                            'conditions' => array(
                                'Townhouse.id' => $dataSearch,
                            )
                        ));
                        //debug($townhouses);

                        // Format the result for select2
                        $result = array();                
                        foreach($townhouses as $key => $townhouse) {
                            $result[$key]['label'] = $townhouse['Townhouse']['name'];
                            $children = array();
                            foreach($townhouse['Tower'] as $keyc => $tower) {
                                $children[$keyc]['value'] = $tower['id'];
                                $children[$keyc]['label'] = $tower['name'];
                            }                    
                            $result[$key]['children'] = $children;
                        }                
                }else if($select==='3'){
                        $dataSearch = split(',', $dataSearch);  
                        $items = $this->Item->find('all', array(
                            'contain' => array(
                                'Location1',
                            ),
                            'conditions' => array(
                                'Item.tower_id' => $dataSearch,
                            ),
                            'group' => array(
                                'Location1.id'
                            ),
                            'fields' => array(
                                'Location1.id',
                                'Location1.name'
                            )
                        ));
                        //debug($items);

                        // Format the result for select2
                        $result = array();                
                        foreach($items as $key => $item) {
                            $result[$key]['value'] = $item['Location1']['id'];
                            $result[$key]['label'] = $item['Location1']['name'];                        
                        }                    
                }else if($select==='4'){
                        $dataSearch = split(',', $dataSearch);  
                        $items = $this->Item->find('all', array(
                            'contain' => array(
                                'Location1',
                                'Location2'
                            ),
                            'conditions' => array(
                                'Location1.id' => $dataSearch,
                            ),
                            'group' => array(
                                'Location2.id'
                            ),
                            'fields' => array(
                                'Location2.id',
                                'Location2.name'
                            )
                        ));
                        //debug($items);

                        // Format the result for select2
                        $result = array();                
                        foreach($items as $key => $item) {
                            $result[$key]['value'] = $item['Location2']['id'];
                            $result[$key]['label'] = $item['Location2']['name'];                        
                        }                    
                }else if($select==='5'){
                        $dataSearch = split(',', $dataSearch);  
                        $items = $this->Item->find('all', array(
                            'contain' => array(
                                'Location2',
                                'Location3'
                            ),
                            'conditions' => array(
                                'Location2.id' => $dataSearch,
                            ),
                            'group' => array(
                                'Location3.id'
                            ),
                            'fields' => array(
                                'Location3.id',
                                'Location3.name'
                            )
                        ));
                        //debug($items);

                        // Format the result for select2
                        $result = array();                
                        foreach($items as $key => $item) {
                            $result[$key]['value'] = $item['Location3']['id'];
                            $result[$key]['label'] = $item['Location3']['name'];                        
                        }                    
                }else if($select==='6'){
                        $dataSearch = split(',', $dataSearch);  
                        $items = $this->Item->find('all', array(
                            'contain' => array(
                                'Location2',
                                'Service'
                            ),
//                            'conditions' => array(
//                                'Location2.id' => $dataSearch,
//                            ),
                            'group' => array(
                                'Service.id'
                            ),
                            'fields' => array(
                                'Service.id',
                                'Service.name'
                            )
                        ));
                        //debug($items);

                        // Format the result for select2
                        $result = array();                
                        foreach($items as $key => $item) {
                            $result[$key]['value'] = $item['Service']['id'];
                            $result[$key]['label'] = $item['Service']['name'];                        
                        }                    
                }
                else if($select==='7'){
                        $dataSearch = split(',', $dataSearch);  
                        $items = $this->Item->find('all', array(
                            'contain' => array(
                                'Service',
                                'Check'
                            ),
                            'conditions' => array(
                                'Service.id' => $dataSearch,
                            ),
                            'group' => array(
                                'Check.id'
                            ),
                            'fields' => array(
                                'Check.id',
                                'Check.name'
                            )
                        ));
                        //debug($items);

                        // Format the result for select2
                        $result = array();                
                        foreach($items as $key => $item) {
                            $result[$key]['value'] = $item['Check']['id'];
                            $result[$key]['label'] = $item['Check']['name'];                        
                        }                    
                }
                
                echo json_encode($result);
        }
        
/**
 * Export CSV method
 * 
 * Plugin carregado em AppControleer public $components ->  'Export.Export',
 * Plugin disponínel na pasta app/plugin
 * Em app/config/Bootstrap -> CakePlugin::loadAll();
 */        
        public function csv($id) {
            $data = $this->Item->find('all', array(  
                'contain' => array(
                    'Tower',
                    'Location1',
                    'Location2',
                    'Location3',
                    'Service',
                    'Check'
                ),
                'conditions' => array(  
                    'Item.Tower_id' => $id
                ),
                'fields' => array(
                    'Tower.name', 'Location1.name', 'Location2.name', 'Location3.name', 'Service.name', 'Check.name'
                )
            ));
            //debug($data);
            
            //Remontagem do array, pois mesmo não setando ( id ) em fields eles aparecem, e não são desejados no csv.
            $newData = array();
            foreach ($data as $dataLine):                 
                $newData[] = array(
                    'tower' => $dataLine['Tower']['name'],
                    'loc1' => $dataLine['Location1']['name'],
                    'loc2' => $dataLine['Location2']['name'],
                    'loc3' => $dataLine['Location3']['name'],
                    'service' => $dataLine['Service']['name'],
                    'check' => $dataLine['Check']['name'],
                );
            endforeach;   
            //debug($newData);
            
            $header = array( 'Bloco' ,'Pavimento', 'Apto./Hall', 'Outros', 'Serviço', 'Vefificação');
            $this->Export->exportCsv($header, $newData,'','',';');
        }
        
/*
 *
 * Import method
 *
 */
        public function import() {
            
            
            
        }  
        
}
