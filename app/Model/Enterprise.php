<?php
App::uses('AppModel', 'Model');
/**
 * Enterprise Model
 *
 * @property Tower $Tower
 */
class Enterprise extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Townhouse' => array(
			'className' => 'Townhouse',
			'foreignKey' => 'enterprise_id',
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
