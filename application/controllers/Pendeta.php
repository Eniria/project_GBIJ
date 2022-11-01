<?php

class Pendeta extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}
		$this->load->model("ModelPendeta");
	}

	public function index()
	{
		$dataPendeta = $this->ModelPendeta->getAll();
		$data = array(
			"pendetas" => $dataPendeta
		);
		$data['title'] = 'Data Pendeta';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('content/pendeta/v_list_pendeta', $data);
		$this->load->view('templates/footer');
	}
	//untuk me-load tampilan form tambah barang

	public function tambah(){
		$dataPendeta = $this->ModelPendeta->getAll();
		$data = array(
			"pendetas" => $dataPendeta
		);
		$data['title'] = 'tambah Data Pendeta';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view("content/pendeta/v_add_pendeta", $data);
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

		} else
		{
			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$no_sk = $this->input->post('no_sk', TRUE);
			$nik = $this->input->post('nik', TRUE);
			$nama = $this->input->post('nama', TRUE);
			$jk = $this->input->post('jk', TRUE);
			$tempat_lahir = $this->input->post('tempat_lahir', TRUE);
			$tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
			$asal = $this->input->post('asal', TRUE);
			$pendidikan = $this->input->post('pendidikan', TRUE);
			$tanggal_mulai = $this->input->post('tanggal_mulai', TRUE);
			$tanggal_selesai = $this->input->post('tanggal_selesai', TRUE);
			$status = $this->input->post('status', TRUE);

			$data = array(
				'no_sk' => $no_sk,
				'nik' => $nik,
				'nama' => $nama,
				'jk' => $jk,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'asal' => $asal,
				'pendidikan' => $pendidikan,
				'tanggal_mulai' => $tanggal_mulai,
				'tanggal_selesai' => $tanggal_selesai,
				'status' => $status,
				'foto' => $foto

			);
			$id = $this->ModelPendeta->insertGetId($data);
			$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data berhasil DiTambah!
                        </div>');
			redirect('pendeta');
		}
	}
	public function print()
	{
		$dataPendeta['pendeta'] = $this->ModelPendeta->getAll();
		$this->load->view('content/pendeta/print_pendeta', $dataPendeta);
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data pendeta';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$pendeta = $this->ModelPendeta->getByPrimaryKey($id);
		$data = array(
			"pendeta" => $pendeta,
		);
		$this->load->view('content/pendeta/v_update_pendeta', $data);
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
			$no_sk = $this->input->post('no_sk', TRUE);
			$nik = $this->input->post('nik', TRUE);
			$nama = $this->input->post('nama', TRUE);
			$jk = $this->input->post('jk', TRUE);
			$tempat_lahir = $this->input->post('tempat_lahir', TRUE);
			$tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
			$asal = $this->input->post('asal', TRUE);
			$pendidikan = $this->input->post('pendidikan', TRUE);
			$tanggal_mulai = $this->input->post('tanggal_mulai', TRUE);
			$tanggal_selesai = $this->input->post('tanggal_selesai', TRUE);
			$status = $this->input->post('status', TRUE);
			$id = $this->input->post('id_pendeta');

			$data = array(
				'no_sk' => $no_sk,
				'nik' => $nik,
				'nama' => $nama,
				'jk' => $jk,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'asal' => $asal,
				'pendidikan' => $pendidikan,
				'tanggal_mulai' => $tanggal_mulai,
				'tanggal_selesai' => $tanggal_selesai,
				'status' => $status,
				'foto' => $foto
			);
			$id = $this->ModelPendeta->update($id,$data);
			$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data berhasil DiTambah!
                        </div>');
			redirect('pendeta');
		}
	}
	public function delete()
	{
		$id = $this->input->post('id_pendeta');
		$this->ModelPendeta->delete($id);
		redirect('pendeta');
	}
}
