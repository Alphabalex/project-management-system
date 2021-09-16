<?php
App::uses('AppController', 'Controller');
/**
 * CompaniesUsers Controller
 *
 * @property CompaniesUser $CompaniesUser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CompaniesUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$active = $this->Session->read('activeCompany.id');
		$this->CompaniesUser->recursive = 0;
		$companiesuser = $this->Paginator->paginate(
			'CompaniesUser',
			array('CompaniesUser.company_id'=>$active)
		);
		$this->set('companiesUsers', $companiesuser);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CompaniesUser->exists($id)) {
			throw new NotFoundException(__('Invalid companies user'));
		}
		$options = array('conditions' => array('CompaniesUser.' . $this->CompaniesUser->primaryKey => $id));
		$this->set('companiesUser', $this->CompaniesUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($companyID=null) {
		if ($this->request->is('post')) {
			$this->CompaniesUser->create();
			$this->request->data['CompaniesUser']['company_id']=$companyID;
			if ($this->CompaniesUser->save($this->request->data)) {
				$this->Flash->success(__('The companies user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The companies user could not be saved. Please, try again.'));
			}
		}
		$users = $this->CompaniesUser->User->find('list');
		$roles = $this->CompaniesUser->Role->find('list');
		$this->set(compact('users', 'roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CompaniesUser->exists($id)) {
			throw new NotFoundException(__('Invalid companies user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CompaniesUser->save($this->request->data)) {
				$this->Flash->success(__('The companies user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The companies user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CompaniesUser.' . $this->CompaniesUser->primaryKey => $id));
			$this->request->data = $this->CompaniesUser->find('first', $options);
		}
		$users = $this->CompaniesUser->User->find('list');
		$roles = $this->CompaniesUser->Role->find('list');
		$this->set(compact('users', 'roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->CompaniesUser->exists($id)) {
			throw new NotFoundException(__('Invalid companies user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CompaniesUser->delete($id)) {
			$this->Flash->success(__('The companies user has been deleted.'));
		} else {
			$this->Flash->error(__('The companies user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	// public function isAuthorized($user) {
	// 	if (in_array($this->action, array('add', 'index'))) {
	// 		return true;
	// 	}

	// 	// The owner of a company can edit and delete it
	// 	if (in_array($this->action, array('edit', 'delete','view'))) {
	// 		if ($this->CompaniesUser->Company->user_id==$user['id']) {
	// 			return true;
	// 		}
	// 	}
	// }

}
