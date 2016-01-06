<?php
/**
 * ConsultFixture
 *
 */
class ConsultFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'patient_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'schedule_appointment_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'doctor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'agreement_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'objective_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'consult_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'date' => array('type' => 'date', 'null' => true, 'default' => null),
		'observation' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_modified' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'patient_id', 'schedule_appointment_id', 'doctor_id', 'agreement_id', 'objective_id', 'consult_status_id'), 'unique' => 1),
			'fk_consults_doctors1_idx' => array('column' => 'doctor_id', 'unique' => 0),
			'fk_consults_schedule_appointments1_idx' => array('column' => 'schedule_appointment_id', 'unique' => 0),
			'fk_consults_agreements1_idx' => array('column' => 'agreement_id', 'unique' => 0),
			'fk_consults_objectives1_idx' => array('column' => 'objective_id', 'unique' => 0),
			'fk_consults_patients1_idx' => array('column' => 'patient_id', 'unique' => 0),
			'fk_consults_consult_statuses1_idx' => array('column' => 'consult_status_id', 'unique' => 0)
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
			'patient_id' => 1,
			'schedule_appointment_id' => 1,
			'doctor_id' => 1,
			'agreement_id' => 1,
			'objective_id' => 1,
			'consult_status_id' => 1,
			'date' => '2015-06-18',
			'observation' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2015-06-18 17:32:55',
			'modified' => '2015-06-18 17:32:55',
			'user_modified' => 'Lorem ipsum dolor sit amet'
		),
	);

}
