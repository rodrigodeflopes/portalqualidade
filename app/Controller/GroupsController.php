<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends AppController {

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
		$this->Group->recursive = 0;
		$this->set('groups', $this->Paginator->paginate());
                
                $this->Group->recursive = 0;
                                
                if ($this->request->is('post')) {
                
                    $groups = $this->Group->find('all', array( 'conditions' => array('OR' => array('Group.name LIKE' => "%".$this->request->data['Group']['search']."%"))));
                    $this->set('groups', $groups);
                }
                else {
                    $this->set('groups', $this->Group->find('all'));                    
                }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
                                
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Usuário Inválido!'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {                                                                    
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {                                
                                //Inserção do aro.
                                $aro = new Aro(); 
                                $aro->create(); 
                                $aro_options = array( 
                                    'model' => 'Group', 
                                    'foreign_key' => $this->Group->id
                                );
                                if (!$aro->save($aro_options)) {
                                    $this->Session->setFlash(__('Grupo não adicionado na tabela ARO, tente novamete!'),'alert_error');
                                }                            
				$this->Session->setFlash(__('Grupo salvo com sucesso!'),'alert_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O Grupo não pode ser salvo, tente novamete!'),'alert_error');
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
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Grupo Inválido!'));
		}                
		if ($this->request->is(array('post', 'put'))) {
                    
                        //Editar imagem de perfil se for selecionado algum arquivo.
                        $file = $this->request->data['Group']['uploadfile'];                        
                        if (!empty($file['tmp_name'])) {                                                                        
                            //Salva o arquivo de upload.                                                    
                            $file_path = 'files' . DS . 'uploads' . DS . 'groups' . DS . $id;   
                            $allowed = array('jpg', 'jpeg', 'png');                            
                            $file_path_abs = $this->Upload->upload($file, $file_path, $allowed);
                            if (!$file_path_abs) {
                                $this->Session->setFlash(__('Tipo de arquivo não suportado, tente novamete!'),'alert_error');
                                return $this->redirect(array('action' => 'edit', $id));
                            }
                            //Apaga o arquivo de imagem atual.
                            $pathToDelete =  substr($this->request->data['Group']['image_path'],(strlen($this->request->data['Group']['image_path'])-1)*-1);
                            $file = new File($pathToDelete, false, 0777);
                            $file->delete();
                            $this->request->data['Group']['id'] = $id;
                            $this->request->data['Group']['image_path'] = DS . $file_path_abs;
                        }                        
                        
                        //Salva os dados do grupo.
			if ($this->Group->save($this->request->data)) { 
				$this->Session->setFlash(__('Alterações salvas com sucesso!'),'alert_success');
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('As alterações não puderam ser salvas, tente novamete!'),'alert_error');
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
		}
                
                //Obtenção do aroId do grupo selecionado.  
                $aro = $this->Acl->Aro->find('first', array(
                    'conditions' => array(
                        'Aro.model' => 'Group',
                        'Aro.foreign_key' => $id
                    )
                ));
                $aroId = $aro['Aro']['id'];
                                
                //Obtendo os membros do grupo selecionado (Pode ser usuarios e grupos).
                $members = $this->Acl->Aro->query('SELECT * FROM aros AS Aro
                                                   INNER JOIN users AS User ON Aro.foreign_key = User.id
                                                   WHERE Aro.parent_id = ' .$aroId);
                $this->set('members', $members);
                //debug($members);
                                               
                //lista de usuários.
                $this->loadModel('User');
                $users = $this->User->find('list');
                $this->set(compact('users'));
                               
                //Obtendo as permissões do grupo.
                $this->loadModel('Page');
                $pages = $this->Page->find('all', array(
                    'conditions'=>array(
                        'Page.enable'=>1
                    ),
                    'order' => 'Page.name'
                )); 
                //debug($pages);
                $lista = array();
                $aros_aco_id= NULL;
                $aco_parent_id = NULL;
                foreach ($pages as $page):
                    //Check permissão
                    $check_permission = $this->Acl->check(array('Group' => array('id' => $id)), array('Page' => array('id' => $page['Page']['id'])));
                    //.....
                    $direct_permission = $this->Acl->Aco->Permission->find('first', array(
                        'conditions' => array(
                            'Aco.model' => 'Page',
                            'Aco.foreign_key' => $page['Page']['id'],
                            'Aro.model' => 'Group',
                            'Aro.foreign_key' => $id
                        )
                    ));
                    //debug($direct_permission);                         
                    if(Set::check($direct_permission, 'Permission')) {
                        $aco_parent_id = $direct_permission['Aco']['parent_id'];
                        $aros_aco_id = $direct_permission['Permission']['id'];
                        $direct_permission = true;
                    }
                    $page_acos = $this->Acl->Aco->find('first', array(
                        'conditions' => array(
                            'Aco.model' => 'Page',
                            'Aco.foreign_key' => $page['Page']['id']
                        ),
                        'fields' => 'Aco.parent_id'
                    ));
                    $aco_parent_id = $page_acos['Aco']['parent_id'];
                    //debug($aco_parent_id);
                    $lista[] = array(
                        'aco_parent_id' => $aco_parent_id,
                        'aros_aco_id' => $aros_aco_id,
                        'page_id' => $page['Page']['id'],
                        'pageName' => $page['Page']['name'], 
                        'check_permission' => $check_permission,
                        'direct_permission' => $direct_permission
                    );
                    $aros_aco_id= NULL;
                    $aco_parent_id = NULL;
                endforeach;                
                $this->set('permissions', $lista);
                //debug($lista);
                //debug($this->Acl->Aco->find('all'));
                
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Usuário Inválido!'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Group->delete()) {                        
                        //Delete Aros
                        // Ao deletar Aros automaticamente são excluído as permissões em Aros_Acos.
                        $Aros = $this->Acl->Aro->find('list', array(
                            'conditions' => array(
                                'model' => 'Group',
                                'foreign_key' => $id
                            )
                        ));    
                        foreach ($Aros as $Aro) {    
                            $this->Acl->Aro->id = $Aro;
                            $this->Acl->Aro->delete(); 
                        }                          
			$this->Session->setFlash(__('Grupo excluido com sucesso!'),'alert_success');
		} else {
			$this->Session->setFlash(__('O Grupo não pode ser excluido, tente novamete!'),'alert_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * Members_Add method
 * Freitas - 2014-11-11
 */
        public function members_add($id = null) {
                if ($this->request->is('post')) {                    
                                        
                    //Obtenção do aroId do grupo selecionado.  
                    $aro = $this->Acl->Aro->find('first', array(
                        'conditions' => array(
                            'Aro.model' => 'Group',
                            'Aro.foreign_key' => $id
                        )
                    ));
                    $aroId = $aro['Aro']['id'];
                    //debug($aro);
                    
                    //Inserção do aro.
                    $aro = new Aro(); 
                    $aro->create(); 
                    $aro_options = array( 
                        'model' => 'User', 
                        'foreign_key' => $this->data['Group']['user_id'], 
                        'parent_id' => $aroId, 
                        'alias' => 'via members', 
                    );

                    if ($aro->save($aro_options)) {
                            $this->Session->setFlash(__('Membro adicionado com sucesso!'),'alert_success');
                            return $this->redirect(array('action' => 'edit', $id));
                    } else {
                            $this->Session->setFlash(__('Membro não pode ser adicionado, tente novamete!'),'alert_error');
                    }
		}
        }

 /**
 * Members_delete method
 * Freitas - 2014-11-16
 */
        public function members_delete($groupId = null, $aroId = null) {                
                if ($this->request->is('post')) {   
                    //Exclusão do aro.
                    $aro = new Aro(); 
                    $aro->create(); 
                    $aro_options = array( 
                        'id' => $aroId                   
                    );

                    if ($aro->delete($aro_options)) {
                            $this->Session->setFlash(__('Membro excluido com sucesso!'),'alert_success');
                            return $this->redirect(array('action' => 'edit', $groupId));
                    } else {
                            $this->Session->setFlash(__('Membro não pode ser excluido, tente novamete!'),'alert_error');
                    }
		}
        }
        
/**
 * permission_add method
 * Freitas - 2014-11-21
 */
        public function permission_add($groupId, $pageId, $permission) {                
                if ($this->request->is('post')) {   
                    if ($permission == '1') {
                        $this->Acl->allow(
                            array('model' => 'Group', 'foreign_key' => $groupId),
                            array('model' => 'Page', 'foreign_key' => $pageId),
                            '*'
                        );
                    } else {
                        $this->Acl->deny(
                            array('model' => 'Group', 'foreign_key' => $groupId),
                            array('model' => 'Page', 'foreign_key' => $pageId),
                            '*'
                        );
                    }
                    
                    $this->Session->setFlash(__('Permissão adicionada com sucesso!'),'alert_success');
                    return $this->redirect(array('action' => 'edit', $groupId));                    
		}
        }
        
/**
 * permission_delete method
 * Freitas - 2014-11-21
 */
        public function permission_delete($groupId, $pageId) {   
                $this->loadModel('ArosAco');
                $this->ArosAco->id = $pageId;
                
		if (!$this->ArosAco->exists()) {
			throw new NotFoundException(__('Ação não permitida!'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ArosAco->delete()) {
			$this->Session->setFlash(__('Permissão excluida com sucesso!'),'alert_success');
                            
		} else {
			$this->Session->setFlash(__('A permissão não pode ser excluida!, tente novamete!'),'alert_error');
		}
		return $this->redirect(array('action' => 'edit', $groupId));
        }
        
/**
 * Permissões diretas
 *
 *
 */        
        public function beforeFilter() { 
            parent::beforeFilter(); 
            $this->Auth->allow('add'); 
        } 
        
}
