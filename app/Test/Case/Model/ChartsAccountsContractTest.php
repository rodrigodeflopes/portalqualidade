<?php
App::uses('ChartsAccountsContract', 'Model');

/**
 * ChartsAccountsContract Test Case
 *
 */
class ChartsAccountsContractTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.charts_accounts_contract',
		'app.contract',
		'app.contracts_status',
		'app.charts_account',
		'app.chart_accounts_invoice',
		'app.invoice',
		'app.invoices_operation',
		'app.invoices_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChartsAccountsContract = ClassRegistry::init('ChartsAccountsContract');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChartsAccountsContract);

		parent::tearDown();
	}

}
