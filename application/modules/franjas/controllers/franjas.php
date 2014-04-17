<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * franjas controller
 */
class franjas extends Front_Controller
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

		$this->load->library('form_validation');
		$this->load->model('franjas_model', null, true);
		$this->lang->load('franjas');
		

		Assets::add_module_js('franjas', 'franjas.js');
	}

	//--------------------------------------------------------------------


	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index()
	{

		$records = $this->franjas_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------



}