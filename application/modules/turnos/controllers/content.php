<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * content controller
 */
class content extends Admin_Controller
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

		$this->auth->restrict('Turnos.Content.View');
		$this->load->model('turnos_model', null, true);
		$this->lang->load('turnos');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css('jquery-ui-timepicker.css');
			Assets::add_js('jquery-ui-timepicker-addon.js');
		Template::set_block('sub_nav', 'content/_sub_nav');

		Assets::add_module_js('turnos', 'turnos.js');
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
					$result = $this->turnos_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('turnos_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('turnos_delete_failure') . $this->turnos_model->error, 'error');
				}
			}
		}

		$records = $this->turnos_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Turnos');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a Turnos object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('Turnos.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_turnos())
			{
				// Log the activity
				log_activity($this->current_user->id, lang('turnos_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'turnos');

				Template::set_message(lang('turnos_create_success'), 'success');
				redirect(SITE_AREA .'/content/turnos');
			}
			else
			{
				Template::set_message(lang('turnos_create_failure') . $this->turnos_model->error, 'error');
			}
		}
		Assets::add_module_js('turnos', 'turnos.js');

		Template::set('toolbar_title', lang('turnos_create') . ' Turnos');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of Turnos data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('turnos_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/turnos');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Turnos.Content.Edit');

			if ($this->save_turnos('update', $id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('turnos_act_edit_record') .': '. $id .' : '. $this->input->ip_address(), 'turnos');

				Template::set_message(lang('turnos_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('turnos_edit_failure') . $this->turnos_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Turnos.Content.Delete');

			if ($this->turnos_model->delete($id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('turnos_act_delete_record') .': '. $id .' : '. $this->input->ip_address(), 'turnos');

				Template::set_message(lang('turnos_delete_success'), 'success');

				redirect(SITE_AREA .'/content/turnos');
			}
			else
			{
				Template::set_message(lang('turnos_delete_failure') . $this->turnos_model->error, 'error');
			}
		}
		Template::set('turnos', $this->turnos_model->find($id));
		Template::set('toolbar_title', lang('turnos_edit') .' Turnos');
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
	private function save_turnos($type='insert', $id=0)
	{
		if ($type == 'update')
		{
			$_POST['tid'] = $id;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['mid']        = $this->input->post('turnos_mid');
		$data['pid']        = $this->input->post('turnos_pid');
		$data['fecha']        = $this->input->post('turnos_fecha') ? $this->input->post('turnos_fecha') : '0000-00-00 00:00:00';

		if ($type == 'insert')
		{
			$id = $this->turnos_model->insert($data);

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
			$return = $this->turnos_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}