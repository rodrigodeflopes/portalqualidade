<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
                $this->User->recursive = 0;
                                
                if ($this->request->is('post')) {
                
                    $users = $this->User->find('all', array( 'conditions' => array('OR' => array('User.name LIKE' => "%".$this->request->data['User']['search']."%",
                                                                                                 'User.email LIKE' => "%".$this->request->data['User']['search']."%",
                                                                                                 'User.status LIKE' => "%".$this->request->data['User']['search']."%"))));
                    $this->set('users', $users);
                }
                else {
                    $this->set('users', $this->User->find('all'));                    
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuário Inválido!'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
                                
                //Obtendo os grupos que este usuário pertence.
                    $belongs = $this->Acl->Aro->query("SELECT Aro.id, Aro.parent_id, parent.image_path, parent.name
                                                       FROM aros AS Aro
                                                       INNER JOIN ( SELECT aros.id, all_groups.image_path, all_groups.name 
                                                                    FROM aros 
                                                                    INNER JOIN ( SELECT groups.id, groups.image_path, groups.name FROM groups ) AS all_groups 
                                                                    ON aros.foreign_key = all_groups.id ) AS parent 
                                                       ON Aro.parent_id = parent.id                                                  
                                                       WHERE Aro.model = 'User' AND Aro.foreign_key = " .$id);
                    $this->set('belongs', $belongs);
                    //debug($belongs);
                
                //lista de grupos.
                    $this->loadModel('Group');
                    $groups = $this->Group->find('list');
                    $this->set(compact('groups'));
                
                //Obtendo as permissões do usuário.
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
                        $check_permission = $this->Acl->check(array('User' => array('id' => $id)), array('Page' => array('id' => $page['Page']['id'])));
                        //permissões diretas
                        $direct_permission = $this->Acl->Aco->Permission->find('first', array(
                            'conditions' => array(
                                'Aco.model' => 'Page',
                                'Aco.foreign_key' => $page['Page']['id'],
                                'Aro.model' => 'User',
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
                    //debug($this->Acl->Aco->Permission->find('all'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {                    
                        //Vericação do grupo padrão, model(Group) e id(1) na tabela ARO. 
                        $this->loadModel('Group');
                        if (!$this->Group->findById(1)) {
                            $this->Session->setFlash(__('Grupo padrão não criado!'),'alert_error');
                            return $this->redirect(array('action' => 'add'));
                        }                        
                        //Criptografia da senha.
                        $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);                         
                        //Salva os dados de usuário.
			$this->User->create();
			if ($this->User->save($this->request->data)) {                                
                                //Inserção do aro.
                                $aro = new Aro(); 
                                $aro->create(); 
                                $aro_options = array( 
                                    'model' => 'User', 
                                    'foreign_key' => $this->User->id, 
                                    'parent_id' => 1
                                );
                                if (!$aro->save($aro_options)) {
                                    $this->Session->setFlash(__('Usuário não adicionado na tabela ARO, tente novamete!'),'alert_error');
                                }                        
				$this->Session->setFlash(__('Usuário salvo com sucesso!'),'alert_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O usuário não pode ser salvo, tente novamete!'),'alert_error');
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuário Inválido!'));
		}
		if ($this->request->is(array('post', 'put'))) {
                        //Criptografia da senha.
                        if ($this->request->data['User']['new_password']) {
                            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['new_password']); 
                        }
                        //Salva os dados de usuário.
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Alterações salvas com sucesso!'),'alert_success');
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('As alterações não puderam ser salvas, tente novamete!'),'alert_error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuário Inválido!'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {                    
                        //Delete Aros
                        // Ao deletar Aros automaticamente são excluído as permissões em Aros_Acos.
                        $Aros = $this->Acl->Aro->find('list', array('conditions' => array(
                            'model' => 'User',
                            'foreign_key' => $id
                        )));    
                        foreach ($Aros as $Aro) {    
                            $this->Acl->Aro->id = $Aro;
                            $this->Acl->Aro->delete(); 
                        }                            
			$this->Session->setFlash(__('Usuário excluido com sucesso!'),'alert_success');
		} else {
			$this->Session->setFlash(__('O usuário não pode ser excluido, tente novamete!'),'alert_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
        
/**
 * Groups_add method
 * Freitas - 2014-11-20
 */
        public function groups_add($id = null) {
                if ($this->request->is('post')) {                    
                                        
                    //Obtenção do aroId do Usuário selecionado.  
                    $aro = $this->Acl->Aro->find('first', array(
                        'conditions' => array(
                            'Aro.model' => 'Group',
                            'Aro.foreign_key' => $this->data['User']['group_id'],
                        )
                    ));
                    $aroId = $aro['Aro']['id'];
                    
                    //Inserção do aro.
                    $aro = new Aro(); 
                    $aro->create(); 
                    $aro_options = array( 
                        'model' => 'User', 
                        'foreign_key' => $id, 
                        'parent_id' => $aroId, 
                        'alias' => 'via members', 
                    );

                    if ($aro->save($aro_options)) {
                            $this->Session->setFlash(__('Grupo adicionado com sucesso!'),'alert_success');
                            return $this->redirect(array('action' => 'view', $id));
                    } else {
                            $this->Session->setFlash(__('Grupo não pode ser adicionado, tente novamete!'),'alert_error');
                    }
		}
        }
        
/**
 * Groups_delete method
 * Freitas - 2014-11-20
 */
        public function groups_delete($id = null) {                
                if ($this->request->is('post')) {   
                    //Exclusão do aro.
                    $aro = new Aro(); 
                    $aro->create(); 
                    $aro_options = array( 
                        'id' => $this->request->data['User']['aro_id'],                         
                    );

                    if ($aro->delete($aro_options)) {
                            $this->Session->setFlash(__('Grupo excluido com sucesso!'),'alert_success');
                            return $this->redirect(array('action' => 'view', $id));
                    } else {
                            $this->Session->setFlash(__('Grupo não pode ser excluido, tente novamete!'),'alert_error');
                    }
		}
        }
        
/**
 * permission_add method
 * Freitas - 2014-11-21
 */
        public function permission_add($id = null) {                
                if ($this->request->is('post')) {   
                    if ($this->request->data['User']['guideline'] == 0) {
                        $this->Acl->allow(
                            array('model' => 'User', 'foreign_key' => $id),
                            array('model' => 'Page', 'foreign_key' => $this->request->data['User']['add_page_id']),
                            '*'
                        );
                    } else {
                        $this->Acl->deny(
                            array('model' => 'User', 'foreign_key' => $id),
                            array('model' => 'Page', 'foreign_key' => $this->request->data['User']['add_page_id']),
                            '*'
                        );
                    }
                    
                    $this->Session->setFlash(__('Permissão adicionada com sucesso!'),'alert_success');
                    return $this->redirect(array('action' => 'view', $id));                    
		}
        }
        
/**
 * permission_delete method
 * Freitas - 2014-11-21
 */
        public function permission_delete($id = null) {                
                $this->loadModel('ArosAco');
                $this->ArosAco->id = $this->request->data['User']['delete_page_id'];
                
		if (!$this->ArosAco->exists()) {
			throw new NotFoundException(__('Ação não permitida!'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ArosAco->delete()) {
			$this->Session->setFlash(__('Permissão excluida com sucesso!'),'alert_success');
                            
		} else {
			$this->Session->setFlash(__('A permissão não pode ser excluida!, tente novamete!'),'alert_error');
		}
		return $this->redirect(array('action' => 'view', $id));
        }
        
/**
 * login method
 *
 * 
 */        
        public function login() { 
            $this->layout='login';
            if ($this->request->is('post')) { 
                if ($this->Auth->login()) { 
                    $this->redirect($this->Auth->redirect()); 
                } else { 
                    $this->Session->setFlash('E-mail ou senha incorretos.','alert_error'); 
                } 
            } 
        } 

/**
 * logout method
 *
 * 
 */        
        public function logout() { 
                //$this->Session->setFlash('Usuário desconectado!','alert_success'); 
                $this->Session->destroy();
                $this->redirect($this->Auth->logout()); 
        } 
        
/**
 * myaccount method
 *
 * 
 */        
        public function myaccount($id = null) { 
                
                if (!$this->User->exists($id) || $this->Session->read('Auth.User.id')!=$id) {                        
                    throw new NotFoundException(__('Usuário Inválido!'));                        
		}
		if ($this->request->is(array('post', 'put'))) {
                        //Criptografia da senha.
                        if ($this->request->data['User']['new_password']) {
                            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['new_password']); 
                        }
                        
                        //Editar imagem de perfil se for selecionado algum arquivo.
                        $file = $this->request->data['User']['uploadfile'];                        
                        if (!empty($file['tmp_name'])) {                                                                        
                            //Salva o arquivo de upload.                                                    
                            $file_path = 'files' . DS . 'uploads' . DS . 'users' . DS . $id;   
                            $allowed = array('jpg', 'jpeg', 'png');                            
                            $file_path_abs = $this->Upload->upload($file, $file_path, $allowed);
                            if (!$file_path_abs) {
                                $this->Session->setFlash(__('Tipo de arquivo não suportado, tente novamete!'),'alert_error');
                                return $this->redirect(array('action' => 'myaccount', $id));
                            }
                            //Apaga o arquivo de imagem atual.
                            $pathToDelete =  substr($this->request->data['User']['image_path'],(strlen($this->request->data['User']['image_path'])-1)*-1);
                            $file = new File($pathToDelete, false, 0777);
                            $file->delete();
                            $this->request->data['User']['id'] = $id;
                            $this->request->data['User']['image_path'] = DS . $file_path_abs;
                        }
                        
                        //Salva os dados de usuário.
			if ($this->User->save($this->request->data)) {                                
				$this->Session->setFlash(__('Alterações salvas com sucesso!'), 'alert_success');
				return $this->redirect(array('action' => 'myaccount',$id));
			} else {
				$this->Session->setFlash(__('As alterações não puderam ser salvas, tente novamete!'), 'alert_error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
        } 
        
/**
 * Image_edit method
 * Freitas 2014-11-13
 */
        public function image_edit($id = null) {
                if (!$this->User->exists($id)) {
                    throw new NotFoundException(__('Usuário Inválido!'));
                }
                else {
                    if ($this->request->is('post')) {  
                        if( !empty( $this->request->data)){ 
                            
                            //Salva o arquivo de upload.
                            $data = $this->request->data['User']['uploadfile'];                        
                            $file_path = 'files' . DS . 'uploads' . DS . 'users' . DS . $id;   
                            $allowed = array('jpg', 'jpeg', 'png', 'gif');                            
                            $file_path_abs = $this->Upload->upload($data, $file_path, $allowed);
                            
                            if ($file_path_abs) {
                                //Apaga o arquivo de imagem atual.
                                $pathToDelete =  substr($this->request->data['User']['image_path'],(strlen($this->request->data['User']['image_path'])-1)*-1);
                                $file = new File($pathToDelete, false, 0777);
                                $file->delete();
                                //edita no campo "image_path" o caminho absoluto da nova imagem.
                                $this->request->data['User']['id'] = $id;
                                $this->request->data['User']['image_path'] = DS . $file_path_abs;
                                if ($this->User->save($this->request->data)) {
                                    $this->Session->setFlash(__('Imagem alterada com sucesso!'),'alert_success');
                                    return $this->redirect(array('action' => 'view', $id));
                                }
                                else {
                                    $this->Session->setFlash(__('A imagem de perfil não pode ser alterada, tente novamete!'),'alert_error');
                                    return $this->redirect(array('action' => 'view', $id));
                                }
                            } 
                            else {
                                $this->Session->setFlash(__('Tipo de arquivo não suportado, tente novamete!'),'alert_error');
                                return $this->redirect(array('action' => 'view', $id));
                            }
                        }
                    }
                    else {
                        $this->Session->setFlash(__('A imagem de perfil não pode ser alterada, tente novamete!'),'alert_error');
                        return $this->redirect(array('action' => 'view', $id));
                    }
                }
        }

/**
 * Export CSV method
 * 
 * Plugin carregado em AppControleer public $components ->  'Export.Export',
 * Plugin disponínel na pasta app/plugin
 * Em app/config/Bootstrap -> CakePlugin::loadAll();
 */        
        public function csv() {
            $this->User->recursive = -1;
            $data = $this->User->find('all');
            $header = array( 'c1','c2','c3','c4','c5','c6','c7','c8','c9','c10','c11','c12','c13','c14','c15','c16','c17','c18');
            $this->Export->exportCsv($header, $data,'','',';');
        }
        
/**
 * HighCharts 
 * 
 * 
 */        
        public function graf() {
            
            $dados = $this->Acl->Aco->find('all', array('conditions' => array('foreign_key >' => 0)));
            $this->set('dados', $dados);
            //debug($dados);
        }
        
/**
 * Permissões diretas
 *
 *
 */        
        public function beforeFilter() { 
                parent::beforeFilter(); 
                $this->Auth->allow('login', 'logout', 'add'); 
        } 
        
}
