<?php
App::uses('ContractsNature', 'Model');

/**
 * ContractsNature Test Case
 *
 */
class ContractsNatureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contracts_nature',
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
		$this->ContractsNature = ClassRegistry::init('ContractsNature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContractsNature);

		parent::tearDown();
	}

}
