<?php

class Keluarga extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelKeluarga");
	}

	public function index()
	{
		$dataKeluarga = $this->ModelKeluarga->getAll();
		$data = array(
			"keluargas" => $dataKeluarga
		);
		$data['title'] = 'Data Keluarga';
		$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('content/keluarga/v_list_keluarga', $data);
		$this->load->view('templates/footer');
	}
	//untuk me-load tampilan form tambah Keluarga
	public function tambah()
	{
		$data['title'] = 'Tambah Data Keluarga';
		$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view("content/keluarga/v_add_keluarga");
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$data = array(
			"nomorKK" => $this->input->post("nomorKK"),
			"namaKK" => $this->input->post("namaKK"),
		);
		$id = $this->ModelKeluarga->insertGetId($data);
		redirect('keluarga');
	}

	public function print()
	{
		$dataKeluarga['keluarga'] = $this->ModelKeluarga->getAll();
		$this->load->view('content/keluarga/print_keluarga', $dataKeluarga);
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Keluarga';
		$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$keluarga = $this->ModelKeluarga->getByPrimaryKey($id);
		$data = array(
			"keluarga" => $keluarga,
		);
		$this->load->view('content/keluarga/v_update_keluarga', $data);
		$this->load->view('templates/footer');
	}
	public function update()
	{
		$id = $this->input->post('id_keluarga');
		$data = array(
			"nomorKK" => $this->input->post("nomorKK"),
			"namaKK" => $this->input->post("namaKK"),
		);
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelKeluarga->update($id, $data);
		redirect('keluarga');
	}

	public function delete()
	{
		$id = $this->input->post('id_keluarga');
		$this->ModelKeluarga->delete($id);
		redirect('keluarga');
	}
}
