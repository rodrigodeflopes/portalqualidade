<?php
App::uses('AppUpdateStatus', 'Model');

/**
 * AppUpdateStatus Test Case
 *
 */
class AppUpdateStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.app_update_status',
		'app.app_update'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AppUpdateStatus = ClassRegistry::init('AppUpdateStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AppUpdateStatus);

		parent::tearDown();
	}

}
