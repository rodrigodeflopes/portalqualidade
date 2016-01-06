<?php
App::uses('Check', 'Model');

/**
 * Check Test Case
 *
 */
class CheckTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.check',
		'app.service',
		'app.enterprise',
		'app.townhouse',
		'app.tower',
		'app.item',
		'app.measurement',
		'app.transfer',
		'app.device',
		'app.photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Check = ClassRegistry::init('Check');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Check);

		parent::tearDown();
	}

}
