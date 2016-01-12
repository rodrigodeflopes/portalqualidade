<?php
App::uses('AppController', 'Controller');
/**
 * Enterprises Controller
 *
 * @property Enterprise $Enterprise
 * @property PaginatorComponent $Paginator
 */
class EnterprisesController extends AppController {

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
		$this->Enterprise->recursive = -1;
                $enterprises = $this->Enterprise->find('all');
		$this->set('enterprises', $enterprises);
                //debug($enterprises);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enterprise->exists($id)) {
			throw new NotFoundException(__('Invalid enterprise'));
		}
		$options = array('conditions' => array('Enterprise.' . $this->Enterprise->primaryKey => $id ));                
                $enterprise = $this->Enterprise->find('first', $options);
		$this->set('enterprise', $enterprise);                
                //debug($enterprise);
                
                //Variáveis de sessão sobre a obra selecionada.
                $this->Session->write('enterpriseId', $enterprise['Enterprise']['id']);
                $this->Session->write('enterpriseName', $enterprise['Enterprise']['name']);
                $this->Session->write('enterpriseLocation', $enterprise['Enterprise']['location']);
                $this->Session->write('enterpriseImagePath', $enterprise['Enterprise']['image_path']);
                
                //Numeros
                //-------------------------------------------------------
                $this->loadModel('Item');
                $total = $this->Item->find('count', array(
                    'conditions' => array('Item.enterprise_id' => $id)
                ));
                //debug($total);
                
                $totalC = $this->Item->find('count', array(
                    'conditions' => array('Item.enterprise_id' => $id, 'Item.lastChecked' => '1')
                ));
                //debug($totalC);
                
                $totalNC = $this->Item->find('count', array(
                    'conditions' => array('Item.enterprise_id' => $id, 'Item.lastChecked' => '2')
                ));
                //debug($totalNC);
                $this->set(array('total' => $total, 'totalC' => $totalC, 'totalNC' => $totalNC));    
                
                //Distribuição das não conformidades por Serviço
                //-------------------------------------------------------
                $services = $this->Enterprise->query("  
                        SELECT Service.alias, Item.total, ItemC.total
                        FROM services AS Service
                        
                        LEFT JOIN ( 
                            SELECT Item.service_id, count(Item.id) as total
                            FROM items AS Item   
                            WHERE Item.lastChecked = '2'
                            GROUP BY Item.service_id
                        ) as Item
                        ON Item.service_id = Service.id    
                        
                        LEFT JOIN ( 
                            SELECT ItemC.service_id, count(ItemC.id) as total
                            FROM items AS ItemC  
                            WHERE ItemC.lastChecked = '1' OR ItemC.lastChecked = '2'
                            GROUP BY ItemC.service_id
                        ) as ItemC
                        ON ItemC.service_id = Service.id   
                        
                        WHERE Service.enterprise_id = " . $id . 
                        " ORDER BY Item.total DESC                        
                ");
                //debug($services);
                
                $legends = array();
                $series = array();
                $cont = 1;
                $sumOthers = 0;
                foreach ($services as $service): 
                    if($cont <= 5){
                        $legends[] = $service['Service']['alias'];
                        $series[] = array(
                            'value' => $service['Item']['total'],
                            'name' => $service['Service']['alias']
                        );
                        $qtdeTotal[] = $service['ItemC']['total'];
                    }else{
                        $sumOthers = $sumOthers + $service['Item']['total'];
                    }
                    $cont++;
                endforeach;
                
                //Outros
                $legends[] = 'Outros';
                $series[] = array(
                    'value' => $sumOthers,
                    'name' => 'Outros'
                );
                
                $dataServices = array( 
                    'legends' => $legends,
                    'series' => $series,
                    'qtdeTotal' => $qtdeTotal 
                );
                $this->set('dataServices', $dataServices);     
                //debug($dataServices);
                
                
                
                //Distribuição das não conformidades por Condomínio
                //-------------------------------------------------------
                $townhouses = $this->Enterprise->query(" 
                    SELECT Townhouse.name, Tower.total
                    FROM townhouses AS Townhouse
                    LEFT JOIN ( 
                            SELECT Tower.townhouse_id, SUM(Item.total) as total
                            FROM towers AS Tower
                            LEFT JOIN ( 
                                SELECT Item.tower_id, count(Item.id) as total
                                FROM items AS Item    
                                WHERE Item.lastChecked = '2'
                                GROUP BY Item.tower_id                                
                            ) as Item
                            ON Item.tower_id = Tower.id  
                            GROUP BY Tower.townhouse_id
                            
                    ) as Tower
                    ON Tower.townhouse_id = Townhouse.id  
                    GROUP BY Townhouse.id
                ");
                //debug($townhouses);
                
                $legends = array();
                $series = array();
                foreach ($townhouses as $townhouse):                 
                    $legends[] = $townhouse['Townhouse']['name'];
                    $series[] = array(
                        'value' => $townhouse['Tower']['total'],
                        'name' => $townhouse['Townhouse']['name']
                    );
                endforeach;  
                $dataTownhouses = array( 
                    'legends' => $legends,
                    'series' => $series 
                );
                $this->set('dataTownhouses', $dataTownhouses);     
                //debug($dataServices);
                
                
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enterprise->create();
                        $this->request->data['Enterprise']['image_path'] = 'building.png';
			if ($this->Enterprise->save($this->request->data)) {
				$this->Session->setFlash(__('The enterprise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enterprise could not be saved. Please, try again.'));
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
		if (!$this->Enterprise->exists($id)) {
			throw new NotFoundException(__('Invalid enterprise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Enterprise->save($this->request->data)) {
				$this->Session->setFlash(__('The enterprise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enterprise could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Enterprise.' . $this->Enterprise->primaryKey => $id));
			$this->request->data = $this->Enterprise->find('first', $options);
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
		$this->Enterprise->id = $id;
		if (!$this->Enterprise->exists()) {
			throw new NotFoundException(__('Invalid enterprise'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Enterprise->delete()) {
			$this->Session->setFlash(__('The enterprise has been deleted.'));
		} else {
			$this->Session->setFlash(__('The enterprise could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
/**
 * Image_edit method
 * Freitas 2014-11-13
 */
        public function image_edit($id = null) {                
                $this->Enterprise->id = $id;
                if (!$this->Enterprise->exists()) {
                    throw new NotFoundException(__('Obra Inválida!'));
                }
                else {
                    if ($this->request->is(array('post', 'put'))) {  
                        if( !empty( $this->request->data)){ 
                            
                            //Salva o arquivo de upload.
                            $data = $this->request->data['Enterprise']['uploadfile'];                        
                            $file_path = 'files' . DS . 'uploads' . DS . 'enterprises' . DS . $id;   
                            $allowed = array('jpg', 'jpeg', 'png', 'gif');                            
                            $file_path_abs = $this->Upload->upload($data, $file_path, $allowed);
                            
                            if ($file_path_abs) {
                                //Apaga o arquivo de imagem atual.
                                $pathToDelete =  substr($this->request->data['Enterprise']['image_path'],(strlen($this->request->data['Enterprise']['image_path'])-1)*-1);
                                $file = new File($pathToDelete, false, 0777);
                                $file->delete();
                                //edita no campo "image_path" o caminho absoluto da nova imagem.
                                $this->request->data['Enterprise']['id'] = $id;
                                $this->request->data['Enterprise']['image_path'] = DS . $file_path_abs;
                                if ($this->Enterprise->save($this->request->data)) {
                                    $this->Session->setFlash(__('Imagem alterada com sucesso!'),'alert_success');
                                    return $this->redirect(array('action' => 'edit', $id));
                                }
                                else {
                                    $this->Session->setFlash(__('A imagem de perfil não pode ser alterada, tente novamete!'),'alert_error');
                                    return $this->redirect(array('action' => 'edit', $id));
                                }
                            } 
                            else {
                                $this->Session->setFlash(__('Tipo de arquivo não suportado, tente novamete!'),'alert_error');
                                return $this->redirect(array('action' => 'edit', $id));
                            }
                        }
                    }
                    else {
                        $this->Session->setFlash(__('A imagem de perfil não pode ser alterada, tente novamete8!'),'alert_error');
                        return $this->redirect(array('action' => 'edit', $id));
                    }
                }
        }
        
}