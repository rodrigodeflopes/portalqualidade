<?php
App::uses('ContractsStatus', 'Model');

/**
 * ContractsStatus Test Case
 *
 */
class ContractsStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contracts_status',
		'app.charts_accounts_contract',
		'app.contract',
		'app.enterprise',
		'app.contracts_approval',
		'app.invoice',
		'app.charts_account',
		'app.chart_accounts_invoice',
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
		$this->ContractsStatus = ClassRegistry::init('ContractsStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContractsStatus);

		parent::tearDown();
	}

}
