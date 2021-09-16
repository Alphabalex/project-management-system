<?php
App::uses('CompaniesUser', 'Model');

/**
 * CompaniesUser Test Case
 */
class CompaniesUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.companies_user',
		'app.company',
		'app.type',
		'app.user',
		'app.comment',
		'app.task',
		'app.project',
		'app.tasks_user',
		'app.role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompaniesUser = ClassRegistry::init('CompaniesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompaniesUser);

		parent::tearDown();
	}

}
