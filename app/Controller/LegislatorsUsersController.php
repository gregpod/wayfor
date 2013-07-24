<?php
App::uses('AppController', 'Controller');
/**
 * LegislatorsUsers Controller
 *
 * @property LegislatorsUser $LegislatorsUser
 */
class LegislatorsUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LegislatorsUser->recursive = 0;
		$this->set('legislatorsUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LegislatorsUser->exists($id)) {
			throw new NotFoundException(__('Invalid legislators user'));
		}
		$options = array('conditions' => array('LegislatorsUser.' . $this->LegislatorsUser->primaryKey => $id));
		$this->set('legislatorsUser', $this->LegislatorsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LegislatorsUser->create();
			if ($this->LegislatorsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The legislators user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The legislators user could not be saved. Please, try again.'));
			}
		}
		$legislators = $this->LegislatorsUser->Legislator->find('list');
		$users = $this->LegislatorsUser->User->find('list');
		$this->set(compact('legislators', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LegislatorsUser->exists($id)) {
			throw new NotFoundException(__('Invalid legislators user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LegislatorsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The legislators user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The legislators user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LegislatorsUser.' . $this->LegislatorsUser->primaryKey => $id));
			$this->request->data = $this->LegislatorsUser->find('first', $options);
		}
		$legislators = $this->LegislatorsUser->Legislator->find('list');
		$users = $this->LegislatorsUser->User->find('list');
		$this->set(compact('legislators', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LegislatorsUser->id = $id;
		if (!$this->LegislatorsUser->exists()) {
			throw new NotFoundException(__('Invalid legislators user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LegislatorsUser->delete()) {
			$this->Session->setFlash(__('Legislators user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Legislators user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
