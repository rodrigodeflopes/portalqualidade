<?php
App::uses('Enterprise', 'Model');

/**
 * Enterprise Test Case
 *
 */
class EnterpriseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.enterprise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enterprise = ClassRegistry::init('Enterprise');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enterprise);

		parent::tearDown();
	}

}
