<?php
App::uses('Objective', 'Model');

/**
 * Objective Test Case
 *
 */
class ObjectiveTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.objective',
		'app.consult',
		'app.patient',
		'app.partner',
		'app.schedule_appointment',
		'app.doctor',
		'app.agreement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Objective = ClassRegistry::init('Objective');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Objective);

		parent::tearDown();
	}

}
