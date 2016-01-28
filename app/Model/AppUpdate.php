<?php
App::uses('AppModel', 'Model');
/**
 * AppUpdate Model
 *
 */
class AppUpdate extends AppModel {
    
//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'AppUpdateStatus' => array(
			'className' => 'AppUpdateStatus',
			'foreignKey' => 'app_update_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
