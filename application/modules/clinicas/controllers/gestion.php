<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * gestion controller
 */
class gestion extends Admin_Controller
{

	//--------------------------------------------------------------------


	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Clinicas.Gestion.View');
		$this->lang->load('clinicas');
		
		Template::set_block('sub_nav', 'gestion/_sub_nav');

		Assets::add_module_js('clinicas', 'clinicas.js');
	}

	//--------------------------------------------------------------------


	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index()
	{

		Template::set('toolbar_title', 'Manage Clinicas');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a Clinicas object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('Clinicas.Gestion.Create');

		Assets::add_module_js('clinicas', 'clinicas.js');

		Template::set('toolbar_title', lang('clinicas_create') . ' Clinicas');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of Clinicas data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('clinicas_invalid_id'), 'error');
			redirect(SITE_AREA .'/gestion/clinicas');
		}

		Template::set('toolbar_title', lang('clinicas_edit') .' Clinicas');
		Template::render();
	}

	//--------------------------------------------------------------------



}