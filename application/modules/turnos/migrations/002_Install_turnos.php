<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_turnos extends Migration
{
	/**
	 * The name of the database table
	 *
	 * @var String
	 */
	private $table_name = 'turnos';

	/**
	 * The table's fields
	 *
	 * @var Array
	 */
	private $fields = array(
		'tid' => array(
			'type' => 'INT',
			'constraint' => 11,
			'auto_increment' => TRUE,
		),
		'mid' => array(
			'type' => 'INT',
			'constraint' => 5,
			'null' => FALSE,
		),
		'pid' => array(
			'type' => 'INT',
			'constraint' => 5,
			'null' => FALSE,
		),
		'fecha' => array(
			'type' => 'DATETIME',
			'null' => FALSE,
			'default' => '0000-00-00 00:00:00',
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
		$this->dbforge->add_key('tid', true);
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