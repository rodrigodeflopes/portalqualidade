<?php
/**
 * InvoicesChartAccountFixture
 *
 */
class InvoicesChartAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'invoices_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'invoices_operations_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'invoices_statuses_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'charts_accounts_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
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
		'indexes' => array(
			'PRIMARY' => array('column' => array('invoices_id', 'invoices_operations_id', 'invoices_statuses_id', 'charts_accounts_id'), 'unique' => 1),
			'fk_invoices_has_charts_accounts1_invoices1_idx' => array('column' => 'invoices_id', 'unique' => 0),
			'fk_invoices_charts_accounts1_invoices_operations1_idx' => array('column' => 'invoices_operations_id', 'unique' => 0),
			'fk_invoices_charts_accounts1_invoice_status1_idx' => array('column' => 'invoices_statuses_id', 'unique' => 0),
			'fk_invoices_chart_accounts_charts_accounts1_idx' => array('column' => 'charts_accounts_id', 'unique' => 0)
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
			'invoices_id' => 1,
			'invoices_operations_id' => 1,
			'invoices_statuses_id' => 1,
			'charts_accounts_id' => 1,
			'value' => 1,
			'retention' => 1,
			'advance' => 1,
			'iss' => 1,
			'inss' => 1,
			'irrf' => 1,
			'csllPisCofins' => 1,
			'rebates' => 1,
			'rate' => 1,
			'oc' => 'Lorem ipsum dolor sit amet'
		),
	);

}
