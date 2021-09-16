<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete($id)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

	public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been updated'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

	public function register(){
		if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
				$id = $this->User->id;
				$this->request->data['User'] = array_merge(
					$this->request->data['User'],
					array('id' => $id)
				);
				unset($this->request->data['User']['password']);
				$this->Auth->login($this->request->data['User']);
				return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(
                __('Account could not be created. Please, try again.')
            );
        }
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if ($this->Session->check('activeCompany.id')) {
					$cid = $this->Session->read('activeCompany.id');
					return $this->redirect(array('controller' => 'users', 'action' => 'dashboard', $cid));
				}
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function dashboard($id=null)
	{
		$this->loadModel('Company');
		$this->loadModel('Project');
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$options = array(
		'conditions' => array('Company.' . $this->Company->primaryKey => $id),
		'recursive'=>-1,
		'fields'=>['Company.id','Company.name']
		);
		$company= $this->Company->find('first', $options);
		$this->Session->write('activeCompany.name', $company['Company']['name']);
		$this->Session->write('activeCompany.id', $company['Company']['id']);
		$this->Project->recursive = 0;
		$projects = $this->Paginator->paginate(
			'Project',
			array('Project.company_id' => $id)
		);
		$this->set(compact('projects'));
	}

}
