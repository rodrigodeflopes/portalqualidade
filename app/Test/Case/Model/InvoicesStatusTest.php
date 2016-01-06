<?php
App::uses('InvoicesStatus', 'Model');

/**
 * InvoicesStatus Test Case
 *
 */
class InvoicesStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoices_status',
		'app.chart_accounts_invoice',
		'app.invoice',
		'app.contract',
		'app.enterprise',
		'app.contracts_approval',
		'app.charts_account',
		'app.charts_accounts_contract',
		'app.invoices_operation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvoicesStatus = ClassRegistry::init('InvoicesStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvoicesStatus);

		parent::tearDown();
	}

}
