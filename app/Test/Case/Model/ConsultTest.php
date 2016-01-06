<?php
App::uses('Consult', 'Model');

/**
 * Consult Test Case
 *
 */
class ConsultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.consult',
		'app.patient',
		'app.partner',
		'app.schedule_appointment',
		'app.doctor',
		'app.agreement',
		'app.objective',
		'app.consult_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Consult = ClassRegistry::init('Consult');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Consult);

		parent::tearDown();
	}

}
