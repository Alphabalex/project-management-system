<?php
App::uses('CompaniesUsersController', 'Controller');

/**
 * CompaniesUsersController Test Case
 */
class CompaniesUsersControllerTest extends ControllerTestCase {

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

}
