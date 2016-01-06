<?php
App::uses('ConsultStatus', 'Model');

/**
 * ConsultStatus Test Case
 *
 */
class ConsultStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.consult_status',
		'app.consult'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ConsultStatus = ClassRegistry::init('ConsultStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ConsultStatus);

		parent::tearDown();
	}

}
