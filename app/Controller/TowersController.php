<?php
App::uses('AppController', 'Controller');
/**
 * Towers Controller
 *
 * @property Tower $Tower
 * @property PaginatorComponent $Paginator
 */
class TowersController extends AppController {

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
		$this->Tower->recursive = 0;
                $towers = $this->Paginator->paginate();
		$this->set('towers', $towers);                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $townhouse_id = null) {
		if (!$this->Tower->exists($id)) {
			throw new NotFoundException(__('Invalid tower'));
		}
                
		$options = array('conditions' => array('Tower.' . $this->Tower->primaryKey => $id));
                $this->Tower->recursive = 0;
		$towers = $this->Tower->find('first', $options);
                $this->set('tower', $towers);
                //debug($towers);     
                
                //Lista de Transferências.
                $this->Tower->Transfer->recursive = 0;
                $transfers = $this->Tower->Transfer->find('all', array(
                    'conditions' => array(
                        'tower_id' => $id
                    ),
                    'order' => 'Transfer.created DESC'
                ));
                $this->set('transfers', $transfers);
                //debug($transfers);     

                //lista de Itens
                //OBS.  o containable só funciona se colocado (public $actsAs = array('Containable'); em appModel.
                $this->paginate = array(                       
                    'contain' => array(
                        'Measurement' => array(
                            'order' => 'transfer_id DESC',
                            'limit' => 1
                        ),
                        'Photo'
                    ),
                    'conditions' => array('Item.tower_id' => $id),
                    
                    'limit' => 25
                 );
                $items = $this->paginate('Item');
                $this->set('items', $items);
                //debug($items);  
                //debug($this->params);
                                
	}

/*
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tower->create();
			if ($this->Tower->save($this->request->data)) {
				$this->Session->setFlash(__('The tower has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tower could not be saved. Please, try again.'));
			}
		}
		$enterprises = $this->Tower->Enterprise->find('list');
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
		if (!$this->Tower->exists($id)) {
			throw new NotFoundException(__('Invalid tower'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tower->save($this->request->data)) {
				$this->Session->setFlash(__('The tower has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tower could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tower.' . $this->Tower->primaryKey => $id));
			$this->request->data = $this->Tower->find('first', $options);
		}
		$enterprises = $this->Tower->Enterprise->find('list');
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
		$this->Tower->id = $id;
		if (!$this->Tower->exists()) {
			throw new NotFoundException(__('Invalid tower'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Tower->delete()) {
			$this->Session->setFlash(__('The tower has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tower could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
/**
 * Export CSV method
 * 
 * Plugin carregado em AppControleer public $components ->  'Export.Export',
 * Plugin disponínel na pasta app/plugin
 * Em app/config/Bootstrap -> CakePlugin::loadAll();
 */        
        public function csv($id) {
            $data = $this->Tower->Item->find('all', array(  
                'contain' => array(
                    'Measurement' => array(
                        'fields' => array(
                            'Measurement.checked', 'Measurement.note', 'Measurement.created' 
                        ),
                        'order' => 'transfer_id DESC',
                        'limit' => 1
                    ),
                    'Photo'
                ),
                'conditions' => array(  
                    'Item.Tower_id' => $id
                ),
                'fields' => array(
                    'Item.loc1', 'Item.loc2', 'Item.loc3', 'Item.loc4', 'Item.name', 'Item.method' 
                )
            ));
            //debug($data);
            
            //Remontagem do array, pois mesmo não setando ( Item.id e Measurement.Item_id) em fields eles aparecem, e não são desejados no csv.
            $newData = array();
            foreach ($data as $dataLine): 
                if( Set::check($dataLine, 'Measurement.0')){
                    $checked = $dataLine['Measurement']['0']['checked'];
                    $note = $dataLine['Measurement']['0']['note'];
                    $created = $dataLine['Measurement']['0']['created'];
                }else{
                    $checked = '';
                    $note = '';
                    $created = '';
                }
                $newData[] = array(
                    'loc1' => $dataLine['Item']['loc1'],
                    'loc2' => $dataLine['Item']['loc2'],
                    'loc3' => $dataLine['Item']['loc3'],
                    'loc4' => $dataLine['Item']['loc4'],
                    'name' => $dataLine['Item']['name'],
                    'method' => $dataLine['Item']['method'],
                    'checked' => $checked,
                    'note' => $note,
                    'created' => $created,
                );
            endforeach;   
            //debug($newData);
            
            $header = array( 'Loc1', 'Loc2', 'Loc3', 'Serviço', 'Vefificação', 'Método de Verificação', 'Verificado', 'Descrição de problemas', 'Data');
            $this->Export->exportCsv($header, $newData,'','',';');
        }
        
        
/**
 * research method
 *
 * 
 */
	public function research2($enterprise_id = null) {
                
                //Select Townhouses
                $townhouses = $this->Tower->Townhouse->find('list');
                $this->set('townhouses', $townhouses);
            
                //Enterprise
                $this->loadModel('Enterprise');  
                $enterprise = $this->Enterprise->find('first', array(
                    'recursive' => 0,
                    'conditions' => array(
                        'Enterprise.id' => $enterprise_id
                    )
                ));
                //debug($enterprise);
                
                $this->set('enterprise', $enterprise);
	}

/**
 * searchSelects method
 *
 */
        public function searchSelects($select, $dataSearch = null) {
                $this->autoRender = false;
                               
                if($select==='1'){
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
                            $children[$keyc]['label'] = $tower['name'];
                            $children[$keyc]['value'] = $tower['id'];
                        }                    
                        $result[$key]['children'] = $children;
                    }
                }else if($select==='2'){
                    $dataSearch = split(',', $dataSearch); 
                    $this->loadModel('Item');  
                    $this->Item->recursive = 0;
                    $items = $this->Item->find('all', array(
                        'conditions' => array(
                            'Item.tower_id' => $dataSearch,
                        ),
                        'group' => array(
                            'Item.loc1'
                        ),
                        'fields' => array(
                            'Item.loc1'
                        )
                    ));
                    //debug($items);

                    // Format the result for select2
                    $result = array();                
                    foreach($items as $key => $item) {
                        $result[$key]['label'] = $item['Item']['loc1'];
                        $result[$key]['value'] = $item['Item']['loc1'];                        
                    }                    
                }else if($select==='3'){
                    $dataSearch = split(',', $dataSearch); 
                    $this->loadModel('Item');  
                    $this->Item->recursive = 0;
                    $items = $this->Item->find('all', array(
                        'conditions' => array(
                            'Item.loc1' => $dataSearch,
                        ),
                        'group' => array(
                            'Item.loc2'
                        ),
                        'fields' => array(
                            'Item.loc2'
                        )
                    ));
                    //debug($items);

                    // Format the result for select2
                    $result = array();                
                    foreach($items as $key => $item) {
                        $result[$key]['label'] = $item['Item']['loc2'];
                        $result[$key]['value'] = $item['Item']['loc2']; 
                    }                    
                }else if($select==='4'){
                    $dataSearch = split(',', $dataSearch); 
                    $this->loadModel('Item');  
                    $this->Item->recursive = 0;
                    $items = $this->Item->find('all', array(
                        'conditions' => array(
                            'Item.loc2' => $dataSearch,
                        ),
                        'group' => array(
                            'Item.loc3'
                        ),
                        'fields' => array(
                            'Item.loc3'
                        )
                    ));
                    //debug($items);

                    // Format the result for select2
                    $result = array();                
                    foreach($items as $key => $item) {
                        $result[$key]['label'] = $item['Item']['loc3'];
                        $result[$key]['value'] = $item['Item']['loc3'];                        
                    }                    
                }else if($select==='5'){
                    $dataSearch = split(',', $dataSearch); 
                    $this->loadModel('Item');  
                    $this->Item->recursive = 0;
                    $items = $this->Item->find('all', array(
                        'conditions' => array(
                            'Item.loc3' => $dataSearch,
                        ),
                        'group' => array(
                            'Item.loc4'
                        ),
                        'fields' => array(
                            'Item.loc4'
                        )
                    ));
                    //debug($items);

                    // Format the result for select2
                    $result = array();                
                    foreach($items as $key => $item) {
                        $result[$key]['label'] = $item['Item']['loc4'];
                        $result[$key]['value'] = $item['Item']['loc4'];                        
                    }                    
                }else if($select==='6'){
                    $dataSearch = split(',', $dataSearch); 
                    $this->loadModel('Item');  
                    $this->Item->recursive = 0;
                    $items = $this->Item->find('all', array(
                        'conditions' => array(
                            'Item.loc4' => $dataSearch,
                        ),
                        'group' => array(
                            'Item.name'
                        ),
                        'fields' => array(
                            'Item.name'
                        )
                    ));
                    //debug($items);

                    // Format the result for select2
                    $result = array();                
                    foreach($items as $key => $item) {
                        $result[$key]['label'] = $item['Item']['name'];
                        $result[$key]['value'] = $item['Item']['name'];                        
                    }                    
                }
                
                echo json_encode($result);
        }

 /*
 *
 * itemsFound method
 *
 */
        public function itemsFound2($towers = null, $loc1 = null, $loc2 = null, $loc3 = null, $loc4 = null, $name = null, $check = null) {
            $this->autoRender = false;

            $conditions = array();
            
            if(!is_null($towers)){
                $towers = split(',', $towers);
                $conditions[] = array('Item.tower_id' => $towers);
            }  
            if($loc1 !== 'null'){
                $loc1 = split(',', $loc1);
                $conditions[] = array('Item.loc1' => $loc1);
            } 
            if($loc2 !== 'null'){
                $loc2 = split(',', $loc2);
                $conditions[] = array('Item.loc2' => $loc2);
            } 
            if($loc3 !== 'null'){
                $loc3 = split(',', $loc3);
                $conditions[] = array('Item.loc3' => $loc3);
            } 
            if($loc4 !== 'null'){
                $loc4 = split(',', $loc4);
                $conditions[] = array('Item.loc4' => $loc4);
            } 
            if($name !== 'null'){
                $name = split(',', $name);
                $conditions[] = array('Item.name' => $name);
            } 
            if($check !== 'null'){
                $check = split(',', $check);
                $conditions[] = array('Measurement.checked' => $check);
            } 
            
            //debug($conditions);
            //debug($this->request);            
            
            //lista de medições
            //OBS.  o containable só funciona se colocado (public $actsAs = array('Containable'); em appModel.      
            $this->loadModel('Measurement');  
            $measurements = $this->Measurement->find('all', array(
                'recursive' => 2,
                'contain' => array(
                    'Item',
                    'Item.Photo' => array(
                        'fields' => 'Photo.id',
                        'limit' => 1,                   
                    ),
                    'Transfer'
                ),
                'conditions' => $conditions,
                'limit' => 30
            ));
            
            //debug($measurements);
            

            
            echo json_encode($measurements);
            
        }

/*
 *
 * itemsFound method
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
}


