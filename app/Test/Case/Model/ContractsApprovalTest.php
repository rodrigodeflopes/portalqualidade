<?php
App::uses('ContractsApproval', 'Model');

/**
 * ContractsApproval Test Case
 *
 */
class ContractsApprovalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contracts_approval',
		'app.contract',
		'app.enterprise',
		'app.invoice',
		'app.charts_account',
		'app.chart_accounts_invoice',
		'app.invoices_operation',
		'app.invoices_status',
		'app.charts_accounts_contract'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContractsApproval = ClassRegistry::init('ContractsApproval');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContractsApproval);

		parent::tearDown();
	}

}
