<?php
App::uses('ChartAccountsInvoice', 'Model');

/**
 * ChartAccountsInvoice Test Case
 *
 */
class ChartAccountsInvoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chart_accounts_invoice',
		'app.invoice',
		'app.invoices_operation',
		'app.invoices_status',
		'app.charts_account'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChartAccountsInvoice = ClassRegistry::init('ChartAccountsInvoice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChartAccountsInvoice);

		parent::tearDown();
	}

}
