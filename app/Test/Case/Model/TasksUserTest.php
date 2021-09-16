<?php
App::uses('TasksUser', 'Model');

/**
 * TasksUser Test Case
 */
class TasksUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tasks_user',
		'app.user',
		'app.comment',
		'app.company',
		'app.type',
		'app.companies_user',
		'app.project',
		'app.task'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TasksUser = ClassRegistry::init('TasksUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TasksUser);

		parent::tearDown();
	}

}
