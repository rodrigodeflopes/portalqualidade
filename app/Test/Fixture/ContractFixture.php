<?php
/**
 * ContractFixture
 *
 */
class ContractFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'enterprise_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contracts_approval_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contracts_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contracts_nature_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'serviceDescription' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mapNumber' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mapReception' => array('type' => 'date', 'null' => false, 'default' => null),
		'mapApproval' => array('type' => 'date', 'null' => false, 'default' => null),
		'oc' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'imagePath' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'supplier_id', 'enterprise_id', 'contracts_approval_id', 'contracts_type_id', 'contracts_nature_id'), 'unique' => 1),
			'fk_contracts_business1_idx' => array('column' => 'enterprise_id', 'unique' => 0),
			'fk_contracts_contracts_approvals1_idx' => array('column' => 'contracts_approval_id', 'unique' => 0),
			'fk_contracts_suppliers1_idx' => array('column' => 'supplier_id', 'unique' => 0),
			'fk_contracts_contracts_types1_idx' => array('column' => 'contracts_type_id', 'unique' => 0),
			'fk_contracts_contracts_natures1_idx' => array('column' => 'contracts_nature_id', 'unique' => 0)
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
			'supplier_id' => 1,
			'enterprise_id' => 1,
			'contracts_approval_id' => 1,
			'contracts_type_id' => 1,
			'contracts_nature_id' => 1,
			'serviceDescription' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'mapNumber' => 'Lorem ipsum dolor sit amet',
			'mapReception' => '2015-01-14',
			'mapApproval' => '2015-01-14',
			'oc' => 'Lorem ipsum dolor sit amet',
			'imagePath' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-01-14',
			'modified' => '2015-01-14'
		),
	);

}
