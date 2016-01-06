<?php
App::uses('ContractsAttachment', 'Model');

/**
 * ContractsAttachment Test Case
 *
 */
class ContractsAttachmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contracts_attachment',
		'app.contract',
		'app.enterprise',
		'app.contracts_approval',
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
		$this->ContractsAttachment = ClassRegistry::init('ContractsAttachment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContractsAttachment);

		parent::tearDown();
	}

}
