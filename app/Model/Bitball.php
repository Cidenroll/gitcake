<?php
App::uses('AppModel', 'Model');
/**
 * Bitball Model
 *
 */
class Bitball extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ballid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ballcolor';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ballcolor' => array(
		    "unique"=>array(
                "rule"=>"isUnique"
            ),
		),
	);
}
