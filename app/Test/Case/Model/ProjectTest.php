<?php
App::uses('Project', 'Model');

/**
 * Project Test Case
 */
class ProjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.project',
		'app.company',
		'app.type',
		'app.user',
		'app.comment',
		'app.companies_user',
		'app.task',
		'app.tasks_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Project = ClassRegistry::init('Project');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Project);

		parent::tearDown();
	}

}
