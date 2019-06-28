<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('queries');
		$posts = $this->queries->getPosts();
		$this->load->view('welcome_message', ['posts'=>$posts]);
	}

	public function create(){
		$this->load->view('create');
	}

	public function save() {
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if ($this->form_validation->run())
		{
				$data = $this->input->post();
					$today = date('Y-m-d');
					$data['date_created'] = $today;
					unset($data['submit']);
					$this->load->model('queries');
					if($this->queries->addPost($data)){
					$this->session->set_flashdata('msg', 'Post Saved Successfully');
				}
				else {
					$this->session->set_flashdata('msg', 'Post Saved Successfullies');
				}
				return redirect('welcome');
		}
		else
		{
			$this->load->view('create');
		}
	}

	public function update($id) {
		$this->load->model('queries');
		$post = $this->queries->getSinglePost($id);
		$this->load->view('update', ['post'=>$post]);
	}

	public function change($id){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if ($this->form_validation->run())
		{
				$data = $this->input->post();
					$today = date('Y-m-d');
					$data['date_created'] = $today;
					unset($data['submit']);
					$this->load->model('queries');
					if($this->queries->updatePost($data, $id)){
					$this->session->set_flashdata('msg', 'Post Updated Successfully');
				}
				else {
					$this->session->set_flashdata('msg', 'Post Update Failed');
				}
				return redirect('welcome');
		}
		else
		{
			$this->load->view('create');
		}

	}

	public function view($id){
		$this->load->model('queries');
		$post = $this->queries->getSinglePost($id);
		$this->load->view('view', ['post'=>$post]);
	}

	public function delete($id) {
		$this->load->model('queries');
		if($post = $this->queries->deletePost($id)){
			$this->session->set_flashdata('msg', 'Post Deleted Successfully');
		}
		else {
			$this->session->set_flashdata('msg', 'Post Delete Failed');
		}
		return redirect('welcome');
	}
}
