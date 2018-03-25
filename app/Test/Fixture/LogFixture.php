<?php
/**
 * Log Fixture
 */
class LogFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'log';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'logid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'groups' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'total' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'logid', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'logid' => 1,
			'groups' => 'Lorem ipsum dolor sit amet',
			'total' => 1
		),
	);

}
