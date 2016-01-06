<?php
/**
 * TransferFixture
 *
 */
class TransferFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'enterprises_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'code_access' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'folder_path' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_modified' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'enterprises_id'), 'unique' => 1),
			'name_UNIQUE' => array('column' => 'type', 'unique' => 1),
			'fk_transfers_enterprises1_idx' => array('column' => 'enterprises_id', 'unique' => 0)
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
			'enterprises_id' => 1,
			'type' => 'Lorem ipsum dolor sit amet',
			'code_access' => 'Lorem ipsum dolor sit amet',
			'folder_path' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-09-14 17:52:15',
			'modified' => '2015-09-14 17:52:15',
			'user_modified' => 'Lorem ipsum dolor sit amet'
		),
	);

}
