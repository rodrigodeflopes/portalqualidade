<?php
App::uses('AppController', 'Controller');
/**
 * Pages Controller
 *
 * @property Page $Page
 * @property PaginatorComponent $Paginator
 */
class PagesController extends AppController {

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
            
                if ($this->request->is('post')) {
                    $pages = $this->Acl->Aco->query("
                        SELECT * FROM acos AS Aco
                        LEFT JOIN pages AS Page 
                        ON Aco.foreign_key = Page.id
                        WHERE Aco.alias LIKE '%". $this->request->data['Page']['search'] ."%' OR Page.name LIKE '%". $this->request->data['Page']['search'] ."%'
                    ");
                }else{
                    $pages = $this->Acl->Aco->query("
                        SELECT * FROM acos AS Aco
                        LEFT JOIN pages AS Page 
                        ON Aco.foreign_key = Page.id
                    ");
                }                
		$this->set('pages', $pages);
                //debug($pages);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Acesso Inválido'));
		}
		$options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
		$this->set('page', $this->Page->find('first', $options));
                
                //Verifica Grupos permitidos.
                $this->loadModel('Group');
                $usersGroups = $this->Group->find('all', array('recursive' => -1));                
                foreach ($usersGroups as $usersGroup):
                    //Check permissão
                    $check_permission = $this->Acl->check(array('Group' => array('id' => $usersGroup['Group']['id'])), array('Page' => array('id' => $id)));
                    if ($check_permission) {
                        $lista[] = array(
                            'image_path' => $usersGroup['Group']['image_path'],
                            'controller' => 'groups',
                            'id' => $usersGroup['Group']['id'],                            
                            'name' => $usersGroup['Group']['name'],
                        ); 
                    }
                endforeach;
                
                //Verifica Usuários permitidos.                
                $this->loadModel('User');
                $usersGroups = $this->User->find('all', array('recursive' => -1));                
                foreach ($usersGroups as $usersGroup):
                    //Check permissão
                    $check_permission = $this->Acl->check(array('User' => array('id' => $usersGroup['User']['id'])), array('Page' => array('id' => $id)));
                    if ($check_permission) {
                        $lista[] = array(
                            'image_path' => $usersGroup['User']['image_path'],
                            'controller' => 'users',
                            'id' => $usersGroup['User']['id'],
                            'name' => $usersGroup['User']['name'],
                        ); 
                    }
                endforeach;
                
                $this->set('usersGroups', $lista);
                //debug($lista);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Page->create();
			if ($this->Page->save($this->request->data)) {
                                
                                //Edita o Model e o foreign_key do aco corresponente ao seu Page.
                                $aco = new Aco(); 
                                $aco->create(); 
                                $aco_options = array( 
                                    'id' => $this->request->data['Page']['aco_id'], 
                                    'model' => 'Page', 
                                    'foreign_key' => $this->Page->id
                                );
                                $aco->save($aco_options);
                                
				$this->Session->setFlash('Acesso controlado salvo com sucesso!','alert_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('O Acesso controlado não pode ser salvo. Tente novamente!','alert_error');
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
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Acesso Inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash('Alterações salvas com sucesso!','alert_success');
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash('As alterações não puderam ser salvas, tente novamete!','alert_error');
			}
		} else {
			$options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
			$this->request->data = $this->Page->find('first', $options);
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
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Acesso Inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Page->delete()) {
			$this->Session->setFlash('Acesso controlado excluido com sucesso!','alert_success');
		} else {
			$this->Session->setFlash('O Acesso controlado não pode ser excluido, tente novamete!','alert_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
