<?php
App::uses('RecordImage', 'Model');

/**
 * RecordImage Test Case
 *
 */
class RecordImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.record_image',
		'app.item',
		'app.enterprise',
		'app.transfer',
		'app.image',
		'app.measurement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RecordImage = ClassRegistry::init('RecordImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RecordImage);

		parent::tearDown();
	}

}
