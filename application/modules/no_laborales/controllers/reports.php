<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * reports controller
 */
class reports extends Admin_Controller
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

		$this->auth->restrict('No_Laborales.Reports.View');
		$this->load->model('no_laborales_model', null, true);
		$this->lang->load('no_laborales');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
		Template::set_block('sub_nav', 'reports/_sub_nav');

		Assets::add_module_js('no_laborales', 'no_laborales.js');
	}

	//--------------------------------------------------------------------


	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->no_laborales_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('no_laborales_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('no_laborales_delete_failure') . $this->no_laborales_model->error, 'error');
				}
			}
		}

		$records = $this->no_laborales_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage No Laborales');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a No Laborales object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('No_Laborales.Reports.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_no_laborales())
			{
				// Log the activity
				log_activity($this->current_user->id, lang('no_laborales_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'no_laborales');

				Template::set_message(lang('no_laborales_create_success'), 'success');
				redirect(SITE_AREA .'/reports/no_laborales');
			}
			else
			{
				Template::set_message(lang('no_laborales_create_failure') . $this->no_laborales_model->error, 'error');
			}
		}
		Assets::add_module_js('no_laborales', 'no_laborales.js');

		Template::set('toolbar_title', lang('no_laborales_create') . ' No Laborales');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of No Laborales data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('no_laborales_invalid_id'), 'error');
			redirect(SITE_AREA .'/reports/no_laborales');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('No_Laborales.Reports.Edit');

			if ($this->save_no_laborales('update', $id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('no_laborales_act_edit_record') .': '. $id .' : '. $this->input->ip_address(), 'no_laborales');

				Template::set_message(lang('no_laborales_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('no_laborales_edit_failure') . $this->no_laborales_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('No_Laborales.Reports.Delete');

			if ($this->no_laborales_model->delete($id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('no_laborales_act_delete_record') .': '. $id .' : '. $this->input->ip_address(), 'no_laborales');

				Template::set_message(lang('no_laborales_delete_success'), 'success');

				redirect(SITE_AREA .'/reports/no_laborales');
			}
			else
			{
				Template::set_message(lang('no_laborales_delete_failure') . $this->no_laborales_model->error, 'error');
			}
		}
		Template::set('no_laborales', $this->no_laborales_model->find($id));
		Template::set('toolbar_title', lang('no_laborales_edit') .' No Laborales');
		Template::render();
	}

	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/**
	 * Summary
	 *
	 * @param String $type Either "insert" or "update"
	 * @param Int	 $id	The ID of the record to update, ignored on inserts
	 *
	 * @return Mixed    An INT id for successful inserts, TRUE for successful updates, else FALSE
	 */
	private function save_no_laborales($type='insert', $id=0)
	{
		if ($type == 'update')
		{
			$_POST['nid'] = $id;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['mid']        = $this->input->post('no_laborales_mid');
		$data['inicio']        = $this->input->post('no_laborales_inicio') ? $this->input->post('no_laborales_inicio') : '0000-00-00';
		$data['final']        = $this->input->post('no_laborales_final');
		$data['detalle']        = $this->input->post('no_laborales_detalle');

		if ($type == 'insert')
		{
			$id = $this->no_laborales_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			}
			else
			{
				$return = FALSE;
			}
		}
		elseif ($type == 'update')
		{
			$return = $this->no_laborales_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}