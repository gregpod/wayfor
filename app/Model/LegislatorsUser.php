<?php
App::uses('AppModel', 'Model');
/**
 * LegislatorsUser Model
 *
 * @property Legislator $Legislator
 * @property User $User
 */
class LegislatorsUser extends AppModel {


//The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Legislator' => array(
			'className' => 'Legislator',
			'foreignKey' => 'legislator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
