<?php
App::uses('ScheduleAppointment', 'Model');

/**
 * ScheduleAppointment Test Case
 *
 */
class ScheduleAppointmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.schedule_appointment',
		'app.consult',
		'app.patient',
		'app.partner',
		'app.doctor',
		'app.agreement',
		'app.objective'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ScheduleAppointment = ClassRegistry::init('ScheduleAppointment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ScheduleAppointment);

		parent::tearDown();
	}

}
