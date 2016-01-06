<?php
App::uses('ContractsType', 'Model');

/**
 * ContractsType Test Case
 *
 */
class ContractsTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contracts_type',
		'app.contract',
		'app.supplier',
		'app.invoice',
		'app.enterprise',
		'app.charts_account',
		'app.charts_accounts_contract',
		'app.charts_accounts_invoice',
		'app.contracts_approval'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContractsType = ClassRegistry::init('ContractsType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContractsType);

		parent::tearDown();
	}

}
