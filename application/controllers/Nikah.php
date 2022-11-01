<?php

class Nikah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}
		$this->load->model("ModelNikah");
	}

	public function index()
	{
		$dataNikah = $this->ModelNikah->getAll();
		$data = array(
			"nikahs" => $dataNikah
		);
		$data['title'] = 'Data Nikah';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('content/nikah/v_list_nikah', $data);
		$this->load->view('templates/footer');
	}
	//untuk me-load tampilan form tambah nikah
	public function tambah()
	{
		$dataNikah = $this->ModelNikah->getAll();
		$data = array(
			"nikahs" => $dataNikah
		);
		$data['title'] = 'Tambah Data Nikah';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view("content/nikah/v_add_nikah", $data);
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$data = array(
			"no_nikah" => $this->input->post("no_nikah"),
			"nama_pria" => $this->input->post("nama_pria"),
			"nama_wanita" => $this->input->post("nama_wanita"),
			"nama_pendeta" => $this->input->post("nama_pendeta"),
			"saksi_nikah" => $this->input->post("saksi_nikah"),
			"tempat_nikah" => $this->input->post("tempat_nikah"),
			"tanggal_nikah" => $this->input->post("tanggal_nikah"),
		);
		$id = $this->ModelNikah->insertGetId($data);
		redirect('nikah');
	}

	public function print()
	{
		$dataNikah['nikah'] = $this->ModelNikah->getAll();
		$this->load->view('content/nikah/print_nikah', $dataNikah);
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Nikah';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$nikah = $this->ModelNikah->getByPrimaryKey($id);
		$data = array(
			"nikah" => $nikah,
		);
		$this->load->view('content/nikah/v_update_nikah', $data);
		$this->load->view('templates/footer');
	}
	public function update()
	{
		$id = $this->input->post('id_nikah');
		$data = array(
			"no_nikah" => $this->input->post("no_nikah"),
			"nama_pria" => $this->input->post("nama_pria"),
			"nama_wanita" => $this->input->post("nama_wanita"),
			"nama_pendeta" => $this->input->post("nama_pendeta"),
			"saksi_nikah" => $this->input->post("saksi_nikah"),
			"tempat_nikah" => $this->input->post("tempat_nikah"),
			"tanggal_nikah" => $this->input->post("tanggal_nikah"),
		);
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelNikah->update($id, $data);
		redirect('nikah');
	}

	public function delete()
	{
		$id = $this->input->post('id_nikah');
		$this->ModelNikah->delete($id);
		redirect('nikah');
	}
}
