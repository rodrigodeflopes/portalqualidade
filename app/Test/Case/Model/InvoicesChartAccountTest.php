<?php
App::uses('InvoicesChartAccount', 'Model');

/**
 * InvoicesChartAccount Test Case
 *
 */
class InvoicesChartAccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoices_chart_account',
		'app.invoices',
		'app.invoices_operations',
		'app.invoices_statuses',
		'app.charts_accounts'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvoicesChartAccount = ClassRegistry::init('InvoicesChartAccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvoicesChartAccount);

		parent::tearDown();
	}

}
