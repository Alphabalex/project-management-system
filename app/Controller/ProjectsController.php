<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 */
class ProjectsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$active = $this->Session->read('activeCompany.id');
		$this->Project->recursive = 0;
		$projects = $this->Paginator->paginate(
			'Project',
			array('Project.company_id' => $active)
		);
		$this->set('projects', $projects);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$project= $this->Project->find('first', $options);
		$this->Session->write('activeProject.name', $project['Project']['name']);
		$this->Session->write('activeProject.id', $project['Project']['id']);
		$this->set(compact('project'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($companyID=null) {
		if ($this->request->is('post')) {
			$this->Project->create();
			$this->request->data['Project']['company_id'] = $companyID;
			if ($this->Project->save($this->request->data)) {
				$this->Flash->success(__('The project has been saved.'));
				return $this->redirect(array('controller'=>'users','action' => 'dashboard', $companyID));
			} else {
				$this->Flash->error(__('The project could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($companyID=null,$id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Project->save($this->request->data)) {
				$this->Flash->success(__('The project has been saved.'));
				return $this->redirect(array('controller'=>'companies','action' => 'view', $companyID));
			} else {
				$this->Flash->error(__('The project could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Project->delete($id)) {
			$this->Flash->success(__('The project has been deleted.'));
		} else {
			$this->Flash->error(__('The project could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function isAuthorized($user)
	{
		$this->loadModel('Company');
		// All registered users can add companies
		if (in_array($this->action, array('index', 'view'))) {
			return true;
		}

		// The owner of a company can edit and delete it
		if (in_array($this->action, array('edit', 'delete','add'))) {
			$companyId = (int) $this->request->params['pass'][0];
			if ($this->Company->isOwnedBy($companyId, $user['id'])) {
				return true;
			}
		}
	}
}
