<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CompaniesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Company->recursive = 0;
		$companies = $this->Paginator->paginate(
			'Company',
			array('Company.user_id' => $this->Auth->user('id'))
		);
		$this->set('companies', $companies);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$this->Company->recursive=0;
		$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
		$this->set('company', $this->Company->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Company->create();
			$this->request->data['Company']['user_id'] = $this->Auth->user('id');
			if ($this->Company->save($this->request->data)) {
				$this->Flash->success(__('The company has been saved.'));
				return $this->redirect(array('action' => 'selection'));
			} else {
				$this->Flash->error(__('The company could not be saved. Please, try again.'));
			}
		}
		$types = $this->Company->Type->find('list');
		$this->set(compact('types'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Company->save($this->request->data)) {
				$this->Flash->success(__('The company has been saved.'));
				return $this->redirect(array('controller'=>'users', 'action' => 'dashboard',$id));
			} else {
				$this->Flash->error(__('The company could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id),
		'recursive'=>-1);
			$this->request->data = $this->Company->find('first', $options);
		}
		$types = $this->Company->Type->find('list');
		$this->set(compact('types'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Company->delete($id)) {
			$this->_deleteSession();
			$this->Flash->success(__('The company has been deleted.'));
		} else {
			$this->Flash->error(__('The company could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'selection'));
	}

	public function _deleteSession(){
		$this->Session->delete('activeCompany.id');
		$this->Session->delete('activeCompany.name');
		$this->Session->delete('activeProject.id');
		$this->Session->delete('activeProject.name');
	}

	public function selection(){
		$this->_deleteSession();
		$companies = $this->Company->myCompanies($this->Auth->user('id'));
		$assigned = $this->Company->myAssignedCompanies($this->Auth->user('id'));
		$this->set(compact('companies', 'assigned'));
	}

	public function isAuthorized($user) {
		// All registered users can add companies
		if (in_array($this->action, array('add', 'index','view','selection'))) {
			return true;
		}

		// The owner of a company can edit and delete it
		if (in_array($this->action, array('edit', 'delete',))) {
			$companyId = (int) $this->request->params['pass'][0];
			if ($this->Company->isOwnedBy($companyId, $user['id'])) {
				return true;
			}
		}
	}
}
