<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Tower $Tower
 * @property Location1 $Location1
 * @property Location2 $Location2
 * @property Location3 $Location3
 * @property Service $Service
 * @property Check $Check
 * @property Measurement $Measurement
 * @property Photo $Photo
 */
class Item extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tower' => array(
			'className' => 'Tower',
			'foreignKey' => 'tower_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location1' => array(
			'className' => 'Location1',
			'foreignKey' => 'location1_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location2' => array(
			'className' => 'Location2',
			'foreignKey' => 'location2_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location3' => array(
			'className' => 'Location3',
			'foreignKey' => 'location3_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Service' => array(
			'className' => 'Service',
			'foreignKey' => 'service_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Check' => array(
			'className' => 'Check',
			'foreignKey' => 'check_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Measurement' => array(
			'className' => 'Measurement',
			'foreignKey' => 'item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'item_id',
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
