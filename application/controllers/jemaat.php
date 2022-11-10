<?php

class Jemaat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}			
		$this->load->model("ModelJemaat");
	}

	public function index()
	{

		$dataJemaat = $this->ModelJemaat->getAll();
		$data = array(
			"jemats" => $dataJemaat
		);
		$data['title'] = 'Data Jemaat';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);

		$this->load->view('content/jemaat/v_list_jemaat', $data);
		$this->load->view('templates/footer');
	}
	//untuk me-load tampilan form tambah barang
	public function tambah()
	{
		$dataJemaat = $this->ModelJemaat->getAll();
		$data = array(
			"jemats" => $dataJemaat
		);
		$data['title'] = 'Tambah Data Jemaat';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view("content/jemaat/v_add_jemaat", $data);
		$this->load->view('templates/footer');
	}


	public function insert()
	{
		$config['upload_path'] = './foto/';
		$config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
		$config['max_size'] = 10000;
		$config['max_width'] = 10000;
		$config['max_height'] = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {

			echo "gagal di tambah";
		} else {
			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			// $no_kk = $this->input->post('no_kk', TRUE);
			$nik_jemaat = $this->input->post('nik_jemaat', TRUE);
			$nama_jemaat = $this->input->post('nama_jemaat', TRUE);
			$jk_jemaat = $this->input->post('jk_jemaat', TRUE);
			$tempat_lahir = $this->input->post('tempat_lahir', TRUE);
			$tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
			$tanggal_dibaptis = $this->input->post('tanggal_dibaptis', TRUE);
			$tanggal_kematian = $this->input->post('tanggal_kematian', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$pekerjaan = $this->input->post('pekerjaan', TRUE);
			$status_aktif = $this->input->post('status_aktif', TRUE);
			$status_perkawinan = $this->input->post('status_perkawinan', TRUE);

			$data = array(
				// 'no_kk' => $no_kk,
				'nik_jemaat' => $nik_jemaat,
				'nama_jemaat' => $nama_jemaat,
				'jk_jemaat' => $jk_jemaat,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'tanggal_dibaptis' => $tanggal_dibaptis,
				'tanggal_kematian' => $tanggal_kematian,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'status_aktif' => $status_aktif,
				'status_perkawinan' => $status_perkawinan,
				'foto' => $foto
			);
			$id = $this->ModelJemaat->insertGetId($data);
			$this->session->set_flashdata('pesan', '<div
                      class="alert alert-success" role="alert">
                      Data berhasil DiTambah!
                      </div>');
			redirect('jemaat');
		}
	}

	public function print()
	{
		$dataJemaat['jemaat'] = $this->ModelJemaat->getAll();
		$this->load->view('content/jemaat/print_jemaat', $dataJemaat);
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Jemaat';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$jemaat = $this->ModelJemaat->getByPrimaryKey($id);
		$data = array(
			"jemaat" => $jemaat,
		);
		
		$this->load->view('content/jemaat/v_update_jemaat', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{

		$config['upload_path'] = './foto/';
		$config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
		$config['max_size'] = 10000;
		$config['max_width'] = 10000;
		$config['max_height'] = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {

			echo "gagal di tambah";
		} else {
			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			// $no_kk = $this->input->post('no_kk', TRUE);
			$nik_jemaat = $this->input->post('nik_jemaat', TRUE);
			$nama_jemaat = $this->input->post('nama_jemaat', TRUE);
			$jk_jemaat = $this->input->post('jk_jemaat', TRUE);
			$tempat_lahir = $this->input->post('tempat_lahir', TRUE);
			$tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
			$tanggal_dibaptis = $this->input->post('tanggal_dibaptis', TRUE);
			$tanggal_kematian = $this->input->post('tanggal_kematian', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$pekerjaan = $this->input->post('pekerjaan', TRUE);
			$status_aktif = $this->input->post('status_aktif', TRUE);
			$status_perkawinan = $this->input->post('status_perkawinan', TRUE);
			$id = $this->input->post('id_jemaat');
			$data = array(
				// 'no_kk' => $no_kk,
				'nik_jemaat' => $nik_jemaat,
				'nama_jemaat' => $nama_jemaat,
				'jk_jemaat' => $jk_jemaat,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'tanggal_dibaptis' => $tanggal_dibaptis,
				'tanggal_kematian' => $tanggal_kematian,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'status_aktif' => $status_aktif,
				'status_perkawinan' => $status_perkawinan,
				'foto' => $foto
			);
			$id = $this->ModelJemaat->update($id, $data);
			$this->session->set_flashdata('pesan', '<div
                      class="alert alert-success" role="alert">
                      Data berhasil DiTambah!
                      </div>');
			redirect('jemaat');
		}
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelJemaat->update($id, $data);
		redirect('jemaat');
	}

	public function delete()
	{
		$id = $this->input->post('id_jemaat');
		$this->ModelJemaat->delete($id);
		redirect('jemaat');
	}
}
