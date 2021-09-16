<?php
App::uses('AppModel', 'Model');
/**
 * Company Model
 *
 * @property Type $Type
 * @property User $User
 * @property Project $Project
 * @property User $User
 */
class Company extends AppModel {

	public function isOwnedBy($company, $user) {
		return $this->field('id', array('id' => $company, 'user_id' => $user)) !== false;
	}

	public function myCompanies($user)
	{
		return $this->find('all',[
			'conditions'=>['Company.user_id'=>$user],
			'fields'=>['Company.id','Company.name'],
			'recursive'=>0,
			'order'=>['Company.name']
		]);
	}
	public function myAssignedCompanies($user){
		return $this->find('all', [
			'conditions' => ['CompaniesUser.user_id' => $user],
			'fields' => ['Company.id', 'Company.name'],
			'recursive' => 0,
			'order' => ['Company.name'],
			'joins'=>[
				array(
					'table' => 'companies_users',
					'alias' => 'CompaniesUser',
					'type' => 'INNER',
					'conditions' => array(
						'CompaniesUser.company_id = Company.id'
					)
				),
				array(
					'table' => 'users',
					'alias' => 'User',
					'type' => 'INNER',
					'conditions' => array(
						'CompaniesUser.user_id = User.id'
					)
				)
			]
		]);
	}
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Owner' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'company_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Worker' => array(
			'className' => 'User',
			'joinTable' => 'companies_users',
			'foreignKey' => 'company_id',
			'associationForeignKey' =>'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
