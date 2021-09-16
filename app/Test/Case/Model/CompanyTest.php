<?php
App::uses('Company', 'Model');

/**
 * Company Test Case
 */
class CompanyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.company',
		'app.type',
		'app.user',
		'app.comment',
		'app.companies_user',
		'app.task',
		'app.tasks_user',
		'app.project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Company = ClassRegistry::init('Company');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Company);

		parent::tearDown();
	}

}
