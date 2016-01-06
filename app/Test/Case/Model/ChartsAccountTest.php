<?php
App::uses('ChartsAccount', 'Model');

/**
 * ChartsAccount Test Case
 *
 */
class ChartsAccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.charts_account',
		'app.chart_accounts_invoice',
		'app.invoice',
		'app.invoices_operation',
		'app.invoices_status',
		'app.contract',
		'app.charts_accounts_contract'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChartsAccount = ClassRegistry::init('ChartsAccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChartsAccount);

		parent::tearDown();
	}

}
