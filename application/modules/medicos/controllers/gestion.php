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

		$this->auth->restrict('Medicos.Gestion.View');
		$this->lang->load('medicos');
		
		Template::set_block('sub_nav', 'gestion/_sub_nav');

		Assets::add_module_js('medicos', 'medicos.js');
	}

	//--------------------------------------------------------------------


	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index()
	{

		Template::set('toolbar_title', 'Manage Medicos');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a Medicos object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('Medicos.Gestion.Create');

		Assets::add_module_js('medicos', 'medicos.js');

		Template::set('toolbar_title', lang('medicos_create') . ' Medicos');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of Medicos data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('medicos_invalid_id'), 'error');
			redirect(SITE_AREA .'/gestion/medicos');
		}

		Template::set('toolbar_title', lang('medicos_edit') .' Medicos');
		Template::render();
	}

	//--------------------------------------------------------------------



}