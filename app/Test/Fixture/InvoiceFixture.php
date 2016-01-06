<?php
/**
 * InvoiceFixture
 *
 */
class InvoiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contract_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'enterprise_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'issue' => array('type' => 'date', 'null' => true, 'default' => null),
		'due' => array('type' => 'date', 'null' => true, 'default' => null),
		'payment' => array('type' => 'date', 'null' => true, 'default' => null),
		'crd' => array('type' => 'date', 'null' => true, 'default' => null),
		'admRate' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'crd_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'regNumber' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'contract_id', 'supplier_id', 'enterprise_id'), 'unique' => 1),
			'fk_invoices_business1_idx' => array('column' => 'enterprise_id', 'unique' => 0),
			'fk_invoices_contracts1_idx' => array('column' => 'contract_id', 'unique' => 0),
			'fk_invoices_suppliers1_idx' => array('column' => 'supplier_id', 'unique' => 0)
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
			'contract_id' => 1,
			'supplier_id' => 1,
			'enterprise_id' => 1,
			'number' => 'Lorem ipsum dolor sit amet',
			'issue' => '2015-01-14',
			'due' => '2015-01-14',
			'payment' => '2015-01-14',
			'crd' => '2015-01-14',
			'admRate' => 1,
			'crd_number' => 'Lorem ipsum dolor sit amet',
			'regNumber' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2015-01-14',
			'modified' => '2015-01-14'
		),
	);

}
