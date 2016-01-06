<?php
App::uses('Measurement', 'Model');

/**
 * Measurement Test Case
 *
 */
class MeasurementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.measurement',
		'app.item',
		'app.enterprise',
		'app.transfer',
		'app.enterprises',
		'app.image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Measurement = ClassRegistry::init('Measurement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Measurement);

		parent::tearDown();
	}

}
