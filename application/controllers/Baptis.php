<?php

class Baptis extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelBaptis");
		$this->load->model('ModelJemaat');
	}

	public function index()
	{
		$dataBaptis = $this->ModelBaptis->getAll('jemaat');
		$data = array(
			"baptiss" => $dataBaptis
		);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('content/baptis/v_list_baptis', $data);
		$this->load->view('templates/footer');
	}
	//untuk me-load tampilan form tambah baptis
	public function tambah(){
		$data['jemaat'] = $this->ModelJemaat->getAll();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view("content/baptis/v_add_baptis");
		$this->load->view('templates/footer');
	}

	public function insert()
	{

		$data = array(
			"no_surat_baptis" => $this->input->post("no_surat_baptis"),
			"id_jemaat" => $this->input->post("id_jemaat"),
			"nama_pendeta" => $this->input->post("nama_pendeta"),
			"jenis_kelamin" => $this->input->post("jenis_kelamin"),
			"tempat_baptis" => $this->input->post("tempat_baptis"),
			"tanggal_baptis" => $this->input->post("tanggal_baptis"),
		);
		$id = $this->ModelBaptis->insertGetId($data);
		redirect('baptis');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');

		$baptis = $this->ModelBaptis->getByPrimaryKey($id);
		$data = array(
			"baptis" => $baptis,
		);

		$this->load->view('content/baptis/v_update_baptis', $data);
		$this->load->view('templates/footer');
	}
	public function update()
	{
		$id = $this->input->post('id_baptis');
		$data = array(
			"no_surat_baptis" => $this->input->post("no_surat_baptis"),
			"nama_pendeta" => $this->input->post("nama_pendeta"),
			"jenis_kelamin" => $this->input->post("jenis_kelamin"),
			"tempat_baptis" => $this->input->post("tempat_baptis"),
			"tanggal_baptis" => $this->input->post("tanggal_baptis"),
		);
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelBaptis->update($id,$data);
		redirect('baptis');
	}

	public function delete()
	{
		$id = $this->input->post('id_baptis');
		$this->ModelBaptis->delete($id);
		redirect('baptis');
	}
}

