<?php
App::uses('Contract', 'Model');

/**
 * Contract Test Case
 *
 */
class ContractTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contract',
		'app.supplier',
		'app.invoice',
		'app.enterprise',
		'app.charts_account',
		'app.charts_accounts_contract',
		'app.charts_accounts_invoice',
		'app.contracts_approval',
		'app.contracts_type',
		'app.contracts_nature'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Contract = ClassRegistry::init('Contract');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contract);

		parent::tearDown();
	}

}
