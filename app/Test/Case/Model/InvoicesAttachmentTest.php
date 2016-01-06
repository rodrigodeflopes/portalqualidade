<?php
App::uses('InvoicesAttachment', 'Model');

/**
 * InvoicesAttachment Test Case
 *
 */
class InvoicesAttachmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoices_attachment',
		'app.invoice',
		'app.contract',
		'app.enterprise',
		'app.contracts_approval',
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
		$this->InvoicesAttachment = ClassRegistry::init('InvoicesAttachment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvoicesAttachment);

		parent::tearDown();
	}

}
