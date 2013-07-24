<?php
App::uses('AppController', 'Controller');
/**
 * Legislators Controller
 *
 * @property Legislator $Legislator
 */
class LegislatorsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Legislator->recursive = 0;
		$this->set('legislators', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Legislator->exists($id)) {
			throw new NotFoundException(__('Invalid legislator'));
		}
		$options = array('conditions' => array('Legislator.' . $this->Legislator->primaryKey => $id));
		$this->set('legislator', $this->Legislator->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Legislator->create();
			if ($this->Legislator->save($this->request->data)) {
				$this->Session->setFlash(__('The legislator has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The legislator could not be saved. Please, try again.'));
			}
		}
		$bioguides = $this->Legislator->Bioguide->find('list');
		$votesmarts = $this->Legislator->Votesmart->find('list');
		$fecs = $this->Legislator->Fec->find('list');
		$govtracks = $this->Legislator->Govtrack->find('list');
		$crps = $this->Legislator->Crp->find('list');
		$twitters = $this->Legislator->Twitter->find('list');
		$facebooks = $this->Legislator->Facebook->find('list');
		$users = $this->Legislator->User->find('list');
		$this->set(compact('bioguides', 'votesmarts', 'fecs', 'govtracks', 'crps', 'twitters', 'facebooks', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Legislator->exists($id)) {
			throw new NotFoundException(__('Invalid legislator'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Legislator->save($this->request->data)) {
				$this->Session->setFlash(__('The legislator has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The legislator could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Legislator.' . $this->Legislator->primaryKey => $id));
			$this->request->data = $this->Legislator->find('first', $options);
		}
		$bioguides = $this->Legislator->Bioguide->find('list');
		$votesmarts = $this->Legislator->Votesmart->find('list');
		$fecs = $this->Legislator->Fec->find('list');
		$govtracks = $this->Legislator->Govtrack->find('list');
		$crps = $this->Legislator->Crp->find('list');
		$twitters = $this->Legislator->Twitter->find('list');
		$facebooks = $this->Legislator->Facebook->find('list');
		$users = $this->Legislator->User->find('list');
		$this->set(compact('bioguides', 'votesmarts', 'fecs', 'govtracks', 'crps', 'twitters', 'facebooks', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Legislator->id = $id;
		if (!$this->Legislator->exists()) {
			throw new NotFoundException(__('Invalid legislator'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Legislator->delete()) {
			$this->Session->setFlash(__('Legislator deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Legislator was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
