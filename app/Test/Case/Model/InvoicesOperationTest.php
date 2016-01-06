<?php
App::uses('InvoicesOperation', 'Model');

/**
 * InvoicesOperation Test Case
 *
 */
class InvoicesOperationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoices_operation',
		'app.chart_accounts_invoice',
		'app.invoice',
		'app.contract',
		'app.enterprise',
		'app.contracts_approval',
		'app.charts_account',
		'app.charts_accounts_contract',
		'app.invoices_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvoicesOperation = ClassRegistry::init('InvoicesOperation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvoicesOperation);

		parent::tearDown();
	}

}
