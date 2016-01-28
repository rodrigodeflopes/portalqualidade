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
        
}


