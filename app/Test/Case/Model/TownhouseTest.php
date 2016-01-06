<?php
App::uses('Townhouse', 'Model');

/**
 * Townhouse Test Case
 *
 */
class TownhouseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.townhouse',
		'app.enterprise',
		'app.tower',
		'app.item',
		'app.measurement',
		'app.transfer',
		'app.device',
		'app.photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Townhouse = ClassRegistry::init('Townhouse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Townhouse);

		parent::tearDown();
	}

}
