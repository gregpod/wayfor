<?php
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	var $name = 'Users';
	var $components = array('Email','Auth', 'Session');
	var $helpers = array('Html', 'Form');
	
	public function beforeFilter() {
		    parent::beforeFilter(); 
		    $this->Email->delivery = 'debug'; /* used to debug email message */
		    $this->Auth->autoRedirect = false; /* this allows us to run further checks on login() action.*/
		    $this->Auth->allow('register','recover', 'verify', 'logout', 'activate'); 
		    $this->Auth->userScope = array('User.is_banned' => 0); /* admin can ban a user by updating `is_banned` field of users table to '1' */
	
	}
	
	function recover(){
	        if ($this->Auth->user()) {
	            $this->redirect(array('controller' => 'users', 'action' => 'account'));
	        }
	         
	        if (!empty($this->data['User']['email'])) {
	            $Token = ClassRegistry::init('Token');
	            $user = $this->User->findByEmail($this->data['User']['email']);
	             
	            if ($user === false) {
	                $this->Session->setFlash('No matching user found');
	                return false;
	            }
	             
	            $token = $Token->generate(array('User' => $user['User']));
	            $this->Session->setFlash('An email has been sent to your account, please follow the instructions in this email.');
	            $this->Email->to = $user['User']['email']; 
	            $this->Email->subject = 'Password Recovery'; 
	            $this->Email->from = 'Support <support@example.com>';
	            $this->Email->template = 'recover';
	            $this->set('user', $user);
	            $this->set('token', $token);
	            $this->Email->send();
	        }
	}
	
	function verify($token_str = null){
	        if ($this->Auth->user()) {
	            $this->redirect(array('controller' => 'users', 'action' => 'account'));
	        }
	 
	        $Token = ClassRegistry::init('Token');
	         
	        $res = $Token->get($token_str);
	        if ($res) {
	            // Update the users password
	            $password = $this->User->generatePassword();
	            $this->User->id = $res['User']['id'];
	            $this->User->saveField('password', $this->Auth->password($password));
	            $this->set('success', true);
	 
	            // Send email with new password
	            $this->Email->to = $res['User']['email'];
	            $this->Email->subject = 'Password Changed';
	            $this->Email->from = 'Support <support@example.com>';
	            $this->Email->template = 'verify';
	            $this->set('user', $res);
	            $this->set('password', $password);
	            $this->Email->send();
	        }
	}
	
	function register() {
		if ($this->request->is('post')){ 
			$this->User->create();	
			if ($this->User->save($this->request->data)){
				//$this->__sendActivationEmail($this->User->getLastInsertID());
				//pr($this->Session->read('Message.email')); /*Uncomment this code to view the content of email FOR DEBUG */
				$activate_url = 'http://' . env('SERVER_NAME') . '/users/activate/' . $this->User->id . '/' . $this->User->getActivationHash();
				$message = 'Hi, Fucker';
				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail('gmail');
				$email->from('gpodunovich@gmail.com');
				$email->to('gpodunovich@gmail.com');
				$email->subject('Mail Confirmation');
				$email->send($message . " " . $activate_url);
				$this->request->data['User']['password'] = null;
				$this->Session->setFlash('An Email has been sent...');
	
				// this view is not show / listed – use your imagination and inform
				// users that an activation email has been sent out to them.
				//$this->redirect('/users/thanks');
			}
			// Failed, clear password field
			else {
				$this->request->data['User']['password'] = null;
				$this->Session->setFlash('No go.');
			}
		}
	}
	
	public function login() {
	    if ($this->request->is('post')) {
	    	//print_r()
	    	$params = array(
	    	    'conditions' => array('User.username' => $this->request->data['User']['username']), //array of conditions
	    	    'limit' => 1
	    	);
	    	
	    	if($user = $this->User->find('first', $params)){	
				if($user['User']['active'] == 0){
					$this->Session->setFlash('Your account has not been activated yet.');		
				}else{
			        if ($this->Auth->login($this->request->data)) {
			        	$this->Session->write('User', $user['User']);
			        	if(empty($user['Profile']['state'])){
			        		$this->redirect('../profiles/edit/'.$user['Profile']['id']);	
			        	}
			        	//print_r($user['District']);
			        	if(empty($user['District'])){
			        		$this->redirect('../districts/add/'.$user['Profile']['id']);
			        	}
			        } else {
			            $this->Session->setFlash('Your username or password was incorrect.');
			        }
				}
			}else{
				$this->Session->setFlash('Your username or password was incorrect.', 'default', array('class' => 'alert alert-error'));
			}
	    }
	}
	
	public function logout() {
	    $this->Session->setFlash('Good-Bye');
	    $this->redirect($this->Auth->logout());
	}
	
	function activate($user_id = null, $in_hash = null) {
		$this->autoRender = false;
		$this->User->id = $user_id;
		
		if ($this->User->exists() && ($in_hash == $this->User->getActivationHash())) {
			if (empty($this->data)) {
		
				$this->data = $this->User->read(null, $user_id);
				 //Update the active flag in the database
				$this->User->set('active', 1);
				
				if($this->User->save()){
					$this->loadModel('Profile');
					$this->Profile->create();
					$this->Profile->set('user_id', $this->User->id);		
					if($this->Profile->save()){
						$this->Session->setFlash('Your account has been activated, please log in below.');
						$this->redirect('login');
					}
					
				}	
			}
		}	
		// Activation failed, render '/views/user/activate.ctp' which should tell the user.
	}
	
	function account(){
	        // Set User's ID in model which is needed for validation
	        $this->User->id = $this->Auth->user('id');
	         
	        // Load the user (avoid populating $this->data)
	        $current_user = $this->User->findById($this->User->id);
	        $this->set('current_user', $current_user);
	 
	        $this->User->useValidationRules('ChangePassword');
	        $this->User->validate['password_confirm']['compare']['rule'] =
	            array('password_match', 'password', false);
	 
	        $this->User->set($this->data);
	        if (!empty($this->data) && $this->User->validates()) {
	            $password = $this->Auth->password($this->data['User']['password']);
	            $this->User->saveField('password', $password);
	 
	            $this->Session->setFlash('Your password has been updated');
	            $this->redirect(array('action' => 'account'));
	        }        
	 }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
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
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$userProfiles = $this->User->UserProfile->find('list');
		$this->set(compact('userProfiles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$userProfiles = $this->User->UserProfile->find('list');
		$this->set(compact('userProfiles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
