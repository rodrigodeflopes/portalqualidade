<?php
/**
 * ChartsAccountsInvoiceFixture
 *
 */
class ChartsAccountsInvoiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'invoice_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'invoices_operation_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'invoices_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'charts_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'value' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'retention' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'advance' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'iss' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'inss' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'irrf' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => true),
		'csllPisCofins' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'rebates' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'rate' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'oc' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('invoice_id', 'invoices_operation_id', 'invoices_status_id', 'charts_account_id'), 'unique' => 1),
			'fk_invoices_has_charts_accounts1_invoices1_idx' => array('column' => 'invoice_id', 'unique' => 0),
			'fk_invoices_charts_accounts1_invoices_operations1_idx' => array('column' => 'invoices_operation_id', 'unique' => 0),
			'fk_invoices_charts_accounts1_invoice_status1_idx' => array('column' => 'invoices_status_id', 'unique' => 0),
			'fk_invoices_chart_accounts_charts_accounts1_idx' => array('column' => 'charts_account_id', 'unique' => 0)
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
			'invoice_id' => 1,
			'invoices_operation_id' => 1,
			'invoices_status_id' => 1,
			'charts_account_id' => 1,
			'value' => 1,
			'retention' => 1,
			'advance' => 1,
			'iss' => 1,
			'inss' => 1,
			'irrf' => 1,
			'csllPisCofins' => 1,
			'rebates' => 1,
			'rate' => 1,
			'oc' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-01-12',
			'modified' => '2015-01-12'
		),
	);

}
