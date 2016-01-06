<?php
/**
 * ContractsChartsAccountFixture
 *
 */
class ContractsChartsAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'contracts_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contracts_statuses_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'charts_accounts_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contractedValue' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'estimatedStart' => array('type' => 'date', 'null' => true, 'default' => null),
		'estimatedEnd' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('contracts_id', 'contracts_statuses_id', 'charts_accounts_id'), 'unique' => 1),
			'fk_contracts_charts_accounts_contracts_status1_idx' => array('column' => 'contracts_statuses_id', 'unique' => 0),
			'fk_contracts_charts_accounts_charts_accounts1_idx' => array('column' => 'charts_accounts_id', 'unique' => 0)
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
			'contracts_id' => 1,
			'contracts_statuses_id' => 1,
			'charts_accounts_id' => 1,
			'contractedValue' => 1,
			'estimatedStart' => '2015-01-07',
			'estimatedEnd' => '2015-01-07'
		),
	);

}
