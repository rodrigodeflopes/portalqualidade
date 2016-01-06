<?php
App::uses('Profession', 'Model');

/**
 * Profession Test Case
 *
 */
class ProfessionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.profession',
		'app.patient',
		'app.partner',
		'app.consult',
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
		$this->Profession = ClassRegistry::init('Profession');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Profession);

		parent::tearDown();
	}

}
