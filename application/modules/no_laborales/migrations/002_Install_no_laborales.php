<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_no_laborales extends Migration
{
	/**
	 * The name of the database table
	 *
	 * @var String
	 */
	private $table_name = 'no_laborales';

	/**
	 * The table's fields
	 *
	 * @var Array
	 */
	private $fields = array(
		'nid' => array(
			'type' => 'INT',
			'constraint' => 11,
			'auto_increment' => TRUE,
		),
		'mid' => array(
			'type' => 'INT',
			'constraint' => 4,
			'null' => FALSE,
		),
		'inicio' => array(
			'type' => 'DATE',
			'null' => FALSE,
			'default' => '0000-00-00',
		),
		'final' => array(
			'type' => 'TIME',
			'null' => FALSE,
		),
		'detalle' => array(
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => FALSE,
		),
	);

	/**
	 * Install this migration
	 *
	 * @return void
	 */
	public function up()
	{
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('nid', true);
		$this->dbforge->create_table($this->table_name);
	}

	//--------------------------------------------------------------------

	/**
	 * Uninstall this migration
	 *
	 * @return void
	 */
	public function down()
	{
		$this->dbforge->drop_table($this->table_name);
	}

	//--------------------------------------------------------------------

}