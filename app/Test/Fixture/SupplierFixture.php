<?php
/**
 * SupplierFixture
 *
 */
class SupplierFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contracts_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'invoices_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cnpj' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'shortName' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'CompleteName' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 400, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'contracts_id', 'invoices_id'), 'unique' => 1),
			'name_UNIQUE' => array('column' => 'shortName', 'unique' => 1),
			'fk_suppliers_invoices1_idx' => array('column' => 'invoices_id', 'unique' => 0),
			'fk_suppliers_contracts1_idx' => array('column' => 'contracts_id', 'unique' => 0)
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
			'contracts_id' => 1,
			'invoices_id' => 1,
			'cnpj' => 'Lorem ipsum dolor sit amet',
			'shortName' => 'Lorem ipsum dolor sit amet',
			'CompleteName' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-01-14',
			'modified' => '2015-01-14'
		),
	);

}
