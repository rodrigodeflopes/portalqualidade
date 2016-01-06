<?php
App::uses('Arquivo', 'Model');

/**
 * Arquivo Test Case
 *
 */
class ArquivoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arquivo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Arquivo = ClassRegistry::init('Arquivo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Arquivo);

		parent::tearDown();
	}

}
