<?php
App::uses('AppController', 'Controller');
/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TasksController extends AppController {
/**
 * index method
 *
 * @return void
 */
	public function index($id=null) {
		$this->Task->recursive = 0;
		$tasks = $this->Paginator->paginate(
			'Task',
			array('Task.project_id' => $id)
		);
		$this->set('tasks', $tasks);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('Comment');
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
		$task=$this->Task->find('first',$options);
		$comments = $this->Comment->find(
			'all',
			array(
				'conditions' => ['Comment.model' => 'tasks', 'Comment.model_id' => $id],

			)
		);
		$this->set(compact('task','comments'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($projectID=null) {
		if ($this->request->is('post')) {
			$this->Task->create();
			$this->request->data['Task']['project_id']=$projectID;
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success(__('The task has been saved.'));
				return $this->redirect(array('controller'=>'projects', 'action' => 'view', $projectID));
			} else {
				$this->Flash->error(__('The task could not be saved. Please, try again.'));
			}
		}

		$userOptions['conditions'] = array(
			'Company.user_id' => $this->Auth->user('id')
		);

		$userOptions['joins'] = array(
			array(
				'table' => 'companies_users',
				'alias' => 'CompaniesUser',
				'type' => 'INNER',
				'conditions' => array(
					'CompaniesUser.user_id = User.id'
				)
				),
				array(
				'table' => 'companies',
				'alias' => 'Company',
				'type' => 'INNER',
				'conditions' => array(
					'CompaniesUser.company_id = Company.id'
				)
				)
		);
		$users = $this->Task->User->find('list',$userOptions);
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$pid = $this->Session->read('activeProject.id');
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success(__('The task has been saved.'));
				return $this->redirect(array('controller'=>'projects', 'action' => 'view', $pid));
			} else {
				$this->Flash->error(__('The task could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
			$this->request->data = $this->Task->find('first', $options);
		}
		$users = $this->Task->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Task->delete($id)) {
			$this->Flash->success(__('The task has been deleted.'));
		} else {
			$this->Flash->error(__('The task could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
