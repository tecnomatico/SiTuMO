<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * developer controller
 */
class developer extends Admin_Controller
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

		$this->auth->restrict('Franjas.Developer.View');
		$this->load->model('franjas_model', null, true);
		$this->lang->load('franjas');
		
		Template::set_block('sub_nav', 'developer/_sub_nav');

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

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->franjas_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('franjas_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('franjas_delete_failure') . $this->franjas_model->error, 'error');
				}
			}
		}

		$records = $this->franjas_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Franjas');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a Franjas object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('Franjas.Developer.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_franjas())
			{
				// Log the activity
				log_activity($this->current_user->id, lang('franjas_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'franjas');

				Template::set_message(lang('franjas_create_success'), 'success');
				redirect(SITE_AREA .'/developer/franjas');
			}
			else
			{
				Template::set_message(lang('franjas_create_failure') . $this->franjas_model->error, 'error');
			}
		}
		Assets::add_module_js('franjas', 'franjas.js');

		Template::set('toolbar_title', lang('franjas_create') . ' Franjas');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of Franjas data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('franjas_invalid_id'), 'error');
			redirect(SITE_AREA .'/developer/franjas');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Franjas.Developer.Edit');

			if ($this->save_franjas('update', $id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('franjas_act_edit_record') .': '. $id .' : '. $this->input->ip_address(), 'franjas');

				Template::set_message(lang('franjas_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('franjas_edit_failure') . $this->franjas_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Franjas.Developer.Delete');

			if ($this->franjas_model->delete($id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('franjas_act_delete_record') .': '. $id .' : '. $this->input->ip_address(), 'franjas');

				Template::set_message(lang('franjas_delete_success'), 'success');

				redirect(SITE_AREA .'/developer/franjas');
			}
			else
			{
				Template::set_message(lang('franjas_delete_failure') . $this->franjas_model->error, 'error');
			}
		}
		Template::set('franjas', $this->franjas_model->find($id));
		Template::set('toolbar_title', lang('franjas_edit') .' Franjas');
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
	private function save_franjas($type='insert', $id=0)
	{
		if ($type == 'update')
		{
			$_POST['fid'] = $id;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['mid']        = $this->input->post('franjas_mid');
		$data['horaim']        = $this->input->post('franjas_horaim');
		$data['horafm']        = $this->input->post('franjas_horafm');
		$data['horait']        = $this->input->post('franjas_horait');
		$data['horaft']        = $this->input->post('franjas_horaft');
		$data['horain']        = $this->input->post('franjas_horain');
		$data['horafn']        = $this->input->post('franjas_horafn');
		$data['dia']        = $this->input->post('franjas_dia');
		$data['mnt']        = $this->input->post('franjas_mnt');

		if ($type == 'insert')
		{
			$id = $this->franjas_model->insert($data);

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
			$return = $this->franjas_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}