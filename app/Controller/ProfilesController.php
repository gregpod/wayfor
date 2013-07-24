<?php
App::uses('AppController', 'Controller');
/**
 * Profiles Controller
 *
 * @property Profile $Profile
 */
class ProfilesController extends AppController {
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$this->set('profile', $this->Profile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		}
		$users = $this->Profile->User->find('list');
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
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->request->data = $this->Profile->find('first', $options);
		}
		$users = $this->Profile->User->find('list');
		$this->set(compact('users'));
		if(empty($this->Profile->state)){
			$states = array(
							'Alabama'=>"AL",
							'Alaska'=>"AK",
							'American Samoa'=>"AS",
							'Arizona'=>"AZ",
							'Arkansas'=>"AR",
							'California'=>"CA",
							'Colorado'=>"CO",
							'Connecticut'=>"CT",
							'Delaware'=>"DE",
							'District of Columbia'=>"DC",
							"Federated States of Micronesia"=>"FM",
							'Florida'=>"FL",
							'Georgia'=>"GA",
							'Guam' => "GU",
							'Hawaii'=>"HI",
							'Idaho'=>"ID",
							'Illinois'=>"IL",
							'Indiana'=>"IN",
							'Iowa'=>"IA",
							'Kansas'=>"KS",
							'Kentucky'=>"KY",
							'Louisiana'=>"LA",
							'Maine'=>"ME",
							'Marshall Islands'=>"MH",
							'Maryland'=>"MD",
							'Massachusetts'=>"MA",
							'Michigan'=>"MI",
							'Minnesota'=>"MN",
							'Mississippi'=>"MS",
							'Missouri'=>"MO",
							'Montana'=>"MT",
							'Nebraska'=>"NE",
							'Nevada'=>"NV",
							'New Hampshire'=>"NH",
							'New Jersey'=>"NJ",
							'New Mexico'=>"NM",
							'New York'=>"NY",
							'North Carolina'=>"NC",
							'North Dakota'=>"ND",
							"Northern Mariana Islands"=>"MP",
							'Ohio'=>"OH",
							'Oklahoma'=>"OK",
							'Oregon'=>"OR",
							"Palau"=>"PW",
							'Pennsylvania'=>"PA",
							'Rhode Island'=>"RI",
							'South Carolina'=>"SC",
							'South Dakota'=>"SD",
							'Tennessee'=>"TN",
							'Texas'=>"TX",
							'Utah'=>"UT",
							'Vermont'=>"VT",
							'Virgin Islands' => "VI",
							'Virginia'=>"VA",
							'Washington'=>"WA",
							'West Virginia'=>"WV",
							'Wisconsin'=>"WI",
							'Wyoming'=>"WY"
							);
			$this->set('states', array_flip($states));
		
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
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Profile->delete()) {
			$this->Session->setFlash(__('Profile deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Profile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}					
}
