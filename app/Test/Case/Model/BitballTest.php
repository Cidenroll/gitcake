<?php
App::uses('Bitball', 'Model');

/**
 * Bitball Test Case
 */
class BitballTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bitball'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bitball = ClassRegistry::init('Bitball');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bitball);

		parent::tearDown();
	}

}
