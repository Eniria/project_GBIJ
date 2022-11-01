<?php

class Pindahjemaat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}
		$this->load->model("ModelPindahJemaat");
	}

	public function index()
	{
		$dataPindah_Jemaat = $this->ModelPindahJemaat->getAll();
		$data = array(
			"Pindah_Jemaat" => $dataPindah_Jemaat
		);
		$data['title'] = 'Data Pindah Jemaat';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('content/pindah_jemaat/v_list_pindah', $data);
		$this->load->view('templates/footer');
	}

	// untuk me-load tampilan form tambah barang
	public function tambah(){

		$dataPindah_Jemaat = $this->ModelPindahJemaat->getAll();
		$data = array(
			"Pindah_Jemaat" => $dataPindah_Jemaat
		);
		$data['title'] = 'Tambah Data Pindah Jemaat';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view("content/pindah_jemaat/v_add_pindah", $data);
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$data = array(
			"Nama_Jemaat" => $this->input->post("Nama_Jemaat"),
			"Gereja_Asal" => $this->input->post("Gereja_Asal"),
			"Gereja_Tujuan" => $this->input->post("Gereja_Tujuan"),
			"Alasan_Pindah" => $this->input->post("Alasan_Pindah"),
		);
		$id = $this->ModelPindahJemaat->insertGetId($data);
		redirect('Pindahjemaat');
	}
	public function print()
	{
		$dataPindah_Jemaat ['PindahJemaat']= $this->ModelPindahJemaat->getAll();
		$this->load->view('content/pindah_jemaat/print_PindahJemaat', $dataPindah_Jemaat);
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$Pindah_Jemaat = $this->ModelPindahJemaat->getByPrimaryKey($id);
		$data = array(
			"Pindah_Jemaat" => $Pindah_Jemaat,
		);
		$this->load->view('content/pindah_jemaat/v_update_pindah',$data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id = $this->input->post('Id_Pindah');
		$data = array(
			"Nama_Jemaat" => $this->input->post("Nama_Jemaat"),
			"Gereja_Asal" => $this->input->post("Gereja_Asal"),
			"Gereja_Tujuan" => $this->input->post("Gereja_Tujuan"),
			"Alasan_Pindah" => $this->input->post("Alasan_Pindah"),
		);
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelPindahJemaat->update($id, $data);
		redirect('Pindahjemaat');
	}

	public function delete()
	{
		$id = $this->input->post('Id_Pindah');
		$this->ModelPindahJemaat->delete($id);
		redirect('Pindahjemaat');
	}
}
