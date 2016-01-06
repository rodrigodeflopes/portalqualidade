<?php
App::uses('AppModel', 'Model');
/**
 * Device Model
 *
 * @property Enterprise $Enterprise
 */
class Device extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'enterprise_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Transfer' => array(
			'className' => 'Transfer',
			'foreignKey' => 'device_id',
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
