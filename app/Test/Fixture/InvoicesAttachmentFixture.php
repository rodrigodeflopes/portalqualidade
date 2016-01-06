<?php
/**
 * InvoicesAttachmentFixture
 *
 */
class InvoicesAttachmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'invoice_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'imagePath' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'invoice_id'), 'unique' => 1),
			'name_UNIQUE' => array('column' => 'name', 'unique' => 1),
			'fk_invoices_attachments_invoices1_idx' => array('column' => 'invoice_id', 'unique' => 0)
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
			'invoice_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'imagePath' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-01-12',
			'modified' => '2015-01-12'
		),
	);

}
