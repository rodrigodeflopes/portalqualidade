<?php
App::uses('Agreement', 'Model');

/**
 * Agreement Test Case
 *
 */
class AgreementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agreement',
		'app.consult'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Agreement = ClassRegistry::init('Agreement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Agreement);

		parent::tearDown();
	}

}
