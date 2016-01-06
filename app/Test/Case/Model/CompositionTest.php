<?php
App::uses('Composition', 'Model');

/**
 * Composition Test Case
 *
 */
class CompositionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.composition',
		'app.groups_input'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Composition = ClassRegistry::init('Composition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Composition);

		parent::tearDown();
	}

}
