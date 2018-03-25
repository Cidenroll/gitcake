<?php
App::uses('AppModel', 'Model');
/**
 * Log Model
 *
 */
class Log extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'log';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'logid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'logid';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'logid' => array(
			'userDefined' => array(
				'rule' => array('userDefined'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
