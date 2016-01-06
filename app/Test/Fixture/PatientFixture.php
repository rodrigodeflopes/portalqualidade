<?php
/**
 * PatientFixture
 *
 */
class PatientFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'partner_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'profession_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'birth_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'sex' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'marital_status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cep' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 9, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'district' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nationality' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'profession' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'business' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone_business' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone_residential' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone_cellular' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone_another' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mail' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'observation' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indicated' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_first_consult' => array('type' => 'date', 'null' => true, 'default' => null),
		'date_retouch' => array('type' => 'date', 'null' => true, 'default' => null),
		'date_operated' => array('type' => 'date', 'null' => true, 'default' => null),
		'image_path' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_modified' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'partner_id', 'profession_id'), 'unique' => 1),
			'name_UNIQUE' => array('column' => 'name', 'unique' => 1),
			'fk_partients_partners1_idx' => array('column' => 'partner_id', 'unique' => 0),
			'fk_patients_professions1_idx' => array('column' => 'profession_id', 'unique' => 0)
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
			'id' => 1,
			'partner_id' => 1,
			'profession_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'birth_date' => '2015-06-18',
			'sex' => '',
			'marital_status' => 'Lorem ipsum d',
			'cep' => 'Lorem i',
			'address' => 'Lorem ipsum dolor sit amet',
			'district' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'nationality' => 'Lorem ipsum dolor sit amet',
			'profession' => 'Lorem ipsum dolor sit amet',
			'business' => 'Lorem ipsum dolor sit amet',
			'phone_business' => 'Lorem ipsum ',
			'phone_residential' => 'Lorem ipsum ',
			'phone_cellular' => 'Lorem ipsum ',
			'phone_another' => 'Lorem ipsum ',
			'mail' => 'Lorem ipsum dolor sit amet',
			'observation' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'indicated' => 'Lorem ipsum dolor sit amet',
			'date_first_consult' => '2015-06-18',
			'date_retouch' => '2015-06-18',
			'date_operated' => '2015-06-18',
			'image_path' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-06-18 19:33:07',
			'modified' => '2015-06-18 19:33:07',
			'user_modified' => 'Lorem ipsum dolor sit amet'
		),
	);

}
