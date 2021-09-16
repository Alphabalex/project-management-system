<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CommentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($model=null,$id=null) {
		$this->Comment->recursive = 0;
		$comments = $this->Paginator->paginate(
			'Comment',
			array('Comment.model' => $model, 'Comment.model_id'=>$id)
		);
		$this->set('comments', $comments);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.id' => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$model= $this->request->params['pass'][0];
		$modelID= $this->request->params['pass'][1];
		$user=$this->Auth->user('id');
		if ($this->request->is('post')) {
			$this->Comment->create();
			$this->request->data['Comment']['user_id'] = $user;
			$this->request->data['Comment']['model_id'] = $modelID;
			$this->request->data['Comment']['model'] = $model;
			if ($this->Comment->save($this->request->data)) {
				$this->Flash->success(__('The comment has been saved.'));
				return $this->redirect(array('controller'=>'comments', 'action' => 'index', $model, $modelID));
			} else {
				$this->Flash->error(__('The comment could not be saved. Please, try again.'));
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
	public function edit($model=null,$modelID=null,$id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Flash->success(__('The comment has been saved.'));
				return $this->redirect(array('controller' => 'comments', 'action' => 'index', $model,$modelID));
			} else {
				$this->Flash->error(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
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
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete($id)) {
			$this->Flash->success(__('The comment has been deleted.'));
		} else {
			$this->Flash->error(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}
}
