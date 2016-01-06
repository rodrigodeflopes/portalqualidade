<?php
/**
 * ChartsAccountsContractFixture
 *
 */
class ChartsAccountsContractFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'contract_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contracts_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'charts_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'contractedValue' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'estimatedStart' => array('type' => 'date', 'null' => true, 'default' => null),
		'estimatedEnd' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('contract_id', 'contracts_status_id', 'charts_account_id'), 'unique' => 1),
			'fk_contracts_charts_accounts_contracts_status1_idx' => array('column' => 'contracts_status_id', 'unique' => 0),
			'fk_contracts_charts_accounts_charts_accounts1_idx' => array('column' => 'charts_account_id', 'unique' => 0)
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
			'contract_id' => 1,
			'contracts_status_id' => 1,
			'charts_account_id' => 1,
			'contractedValue' => 1,
			'estimatedStart' => '2015-01-12',
			'estimatedEnd' => '2015-01-12',
			'created' => '2015-01-12',
			'modified' => '2015-01-12'
		),
	);

}
