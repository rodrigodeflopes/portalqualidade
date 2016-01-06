<?php
App::uses('AppUpdate', 'Model');

/**
 * AppUpdate Test Case
 *
 */
class AppUpdateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.app_update'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AppUpdate = ClassRegistry::init('AppUpdate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AppUpdate);

		parent::tearDown();
	}

}
