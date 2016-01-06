<?php
App::uses('ChartsAccountsInvoice', 'Model');

/**
 * ChartsAccountsInvoice Test Case
 *
 */
class ChartsAccountsInvoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.charts_accounts_invoice',
		'app.invoice',
		'app.contract',
		'app.enterprise',
		'app.contracts_approval',
		'app.charts_account',
		'app.chart_accounts_invoice',
		'app.charts_accounts_contract',
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
		$this->ChartsAccountsInvoice = ClassRegistry::init('ChartsAccountsInvoice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChartsAccountsInvoice);

		parent::tearDown();
	}

}
