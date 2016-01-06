<?php
App::uses('Transfer', 'Model');

/**
 * Transfer Test Case
 *
 */
class TransferTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transfer',
		'app.enterprises'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transfer = ClassRegistry::init('Transfer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transfer);

		parent::tearDown();
	}

}
