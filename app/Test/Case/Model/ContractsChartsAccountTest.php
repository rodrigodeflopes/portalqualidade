<?php
App::uses('ContractsChartsAccount', 'Model');

/**
 * ContractsChartsAccount Test Case
 *
 */
class ContractsChartsAccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contracts_charts_account',
		'app.contracts',
		'app.contracts_statuses',
		'app.charts_accounts'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContractsChartsAccount = ClassRegistry::init('ContractsChartsAccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContractsChartsAccount);

		parent::tearDown();
	}

}
