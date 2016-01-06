<?php
App::uses('Tower', 'Model');

/**
 * Tower Test Case
 *
 */
class TowerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tower',
		'app.enterprise',
		'app.item',
		'app.image',
		'app.measurement',
		'app.transfer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tower = ClassRegistry::init('Tower');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tower);

		parent::tearDown();
	}

}
