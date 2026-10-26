<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bugs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bug_model');
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $data['q'] = trim((string) $this->input->get('q', TRUE));
        $data['bugs'] = $this->Bug_model->search($data['q']);
        $this->load->view('bugs/index', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[180]');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('priority', 'Priority', 'required|in_list[Low,Medium,High]');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $this->Bug_model->create(array(
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('description', TRUE),
                'priority' => $this->input->post('priority', TRUE),
                'status' => 'Open'
            ));
            $this->session->set_flashdata('success', 'Bug ticket created.');
        }
        redirect('bugs');
    }

    public function update_status($id)
    {
        $id = (int) $id;
        $status = $this->input->post('status', TRUE);
        if ($id > 0 && in_array($status, array('Open', 'In Progress', 'Resolved'), TRUE)) {
            $this->Bug_model->update_status($id, $status);
        }
        redirect('bugs');
    }
}
