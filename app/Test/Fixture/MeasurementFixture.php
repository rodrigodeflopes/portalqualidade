<?php
/**
 * MeasurementFixture
 *
 */
class MeasurementFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'percentage' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_modified' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'item_id'), 'unique' => 1),
			'name_UNIQUE' => array('column' => 'percentage', 'unique' => 1),
			'fk_measurement_items1_idx' => array('column' => 'item_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'item_id' => 1,
			'percentage' => 1,
			'created' => '2015-09-14 17:55:17',
			'modified' => '2015-09-14 17:55:17',
			'user_modified' => 'Lorem ipsum dolor sit amet'
		),
	);

}
