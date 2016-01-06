<?php
App::uses('Topico', 'Model');

/**
 * Topico Test Case
 *
 */
class TopicoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.topico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Topico = ClassRegistry::init('Topico');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Topico);

		parent::tearDown();
	}

}
