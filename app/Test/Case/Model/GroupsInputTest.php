<?php
App::uses('GroupsInput', 'Model');

/**
 * GroupsInput Test Case
 *
 */
class GroupsInputTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.groups_input',
		'app.input',
		'app.group',
		'app.composition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GroupsInput = ClassRegistry::init('GroupsInput');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GroupsInput);

		parent::tearDown();
	}

}
