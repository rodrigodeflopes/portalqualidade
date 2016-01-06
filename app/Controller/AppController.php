<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {
    
    public $components = array( 
        'Export.Export',
        'Acl', 
        'Auth' => array( 
            'authorize' => array( 
                'Actions' => array('actionPath' => 'controllers') 
            ),
            'authError' => 'Acesso não permitido!',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email'),
                    'scope' => array('User.status' => 1)
                )
            )
        ), 
        'Session'
    );
        
    public $helpers = array('Time', 'Html', 'Form', 'Session', 'Password'); 
    
    public function beforeFilter() { 
        //Configure AuthComponent        
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login'); 
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login'); 
        $this->Auth->loginRedirect = array('controller' => 'enterprises', 'action' => 'index'); 
        
        
        if($this->Auth->User('id')){
            //Obtem a lista de Paginas permitidas pelo usuÃ¡rio para a montagem do menu.
            $pages = $this->Acl->Aco->query("
                SELECT Aco.id, Aco.alias, Page.id, Page.name FROM acos AS Aco
                LEFT JOIN pages AS Page 
                ON Aco.foreign_key = Page.id AND Page.enable = 1   
                WHERE Aco.parent_id = 1    
            ");
            $accesses = array();        
            foreach ($pages as $page){
                //Check permissÃ£o
                if(!empty($page['Page']['id'])){
                    $check_permission = $this->Acl->check(array('User' => array('id' => $this->Auth->User('id'))), array('Page' => array('id' => $page['Page']['id'])));
                    if ($check_permission) {
                        $accesses[] = array(
                            'pageName' => $page['Page']['name'],
                            'acoAlias' => $page['Aco']['alias']
                        ); 
                    }
                } 
            }
            //debug($this->params);
            
        }else{
            $accesses = '';
        }
        $this->set('accesses', $accesses);
    }     
    
}
