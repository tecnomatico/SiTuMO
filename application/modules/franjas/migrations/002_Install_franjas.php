<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_franjas extends Migration
{
	/**
	 * The name of the database table
	 *
	 * @var String
	 */
	private $table_name = 'franjas';

	/**
	 * The table's fields
	 *
	 * @var Array
	 */
	private $fields = array(
		'fid' => array(
			'type' => 'INT',
			'constraint' => 11,
			'auto_increment' => TRUE,
		),
		'mid' => array(
			'type' => 'INT',
			'constraint' => 4,
			'null' => FALSE,
		),
		'horaim' => array(
			'type' => 'TIME',
			'null' => FALSE,
		),
		'horafm' => array(
			'type' => 'TIME',
			'null' => FALSE,
		),
		'horait' => array(
			'type' => 'TIME',
			'null' => FALSE,
		),
		'horaft' => array(
			'type' => 'TIME',
			'null' => FALSE,
		),
		'horain' => array(
			'type' => 'TIME',
			'null' => FALSE,
		),
		'horafn' => array(
			'type' => 'TIME',
			'null' => FALSE,
		),
		'dia' => array(
			'type' => 'TINYINT',
			'constraint' => 1,
			'null' => FALSE,
		),
		'mnt' => array(
			'type' => 'TINYINT',
			'constraint' => 1,
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
		$this->dbforge->add_key('fid', true);
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