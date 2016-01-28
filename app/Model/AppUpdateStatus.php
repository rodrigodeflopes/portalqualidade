<?php
App::uses('AppModel', 'Model');
/**
 * AppUpdateStatus Model
 *
 * @property AppUpdate $AppUpdate
 */
class AppUpdateStatus extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AppUpdate' => array(
			'className' => 'AppUpdate',
			'foreignKey' => 'app_update_status_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
