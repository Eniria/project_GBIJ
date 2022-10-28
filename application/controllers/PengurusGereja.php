<?php

class PengurusGereja extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelPengurusGereja");
	}

	public function index()
	{
		$dataPengurusGereja = $this->ModelPengurusGereja->getAll();
		$data = array(
			"PengurusGerejas" => $dataPengurusGereja
		);
		$data['title'] = 'Data Pengurus Gereja';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('content/PengurusGereja/v_list_pengurusGereja', $data);
		$this->load->view('templates/footer');
	}
	//untuk me-load tampilan form tambah barang
	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view("content/PengurusGereja/v_add_pengurusGereja");
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
			$no_kk = $this->input->post('no_kk', TRUE);
			$nik = $this->input->post('nik', TRUE);
			$nama = $this->input->post('nama', TRUE);
			$jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
			$tempat_lahir = $this->input->post('tempat_lahir', TRUE);
			$tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
			$pendidikan = $this->input->post('pendidikan', TRUE);
			$jabatan = $this->input->post('jabatan', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$status_pernikahan = $this->input->post('status_pernikahan', TRUE);

			$data = array(
				'no_kk' => $no_kk,
				'nik' => $nik,
				'nama' => $nama,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'pendidikan' => $pendidikan,
				'jabatan' => $jabatan,
				'alamat' => $alamat,
				'status_pernikahan' => $status_pernikahan,
				'foto' => $foto
			);
			$id = $this->ModelPengurusGereja->insertGetId($data);
			$this->session->set_flashdata('pesan', '<div
                      class="alert alert-success" role="alert">
                      Data berhasil DiTambah!
                      </div>');
			redirect('PengurusGereja');
		}
	}
	public function print()
	{
		$dataPengurusGereja ['PengurusGereja']= $this->ModelPengurusGereja->getAll();
		$this->load->view('content/PengurusGereja/print_pengurus', $dataPengurusGereja);
	}



	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$PengurusGereja = $this->ModelPengurusGereja->getByPrimaryKey($id);
		$data = array(
			"PengurusGereja" => $PengurusGereja,
		);
		$this->load->view('content/PengurusGereja/v_update_pengurusGereja', $data);
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
			$no_kk = $this->input->post('no_kk', TRUE);
			$nik = $this->input->post('nik', TRUE);
			$nama = $this->input->post('nama', TRUE);
			$jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
			$tempat_lahir = $this->input->post('tempat_lahir', TRUE);
			$tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
			$pendidikan = $this->input->post('pendidikan', TRUE);
			$jabatan = $this->input->post('jabatan', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$status_pernikahan = $this->input->post('status_pernikahan', TRUE);
			$id = $this->input->post('id_pengurusGereja');

			$data = array(
				'no_kk' => $no_kk,
				'nik' => $nik,
				'nama' => $nama,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'pendidikan' => $pendidikan,
				'jabatan' => $jabatan,
				'alamat' => $alamat,
				'status_pernikahan' => $status_pernikahan,
				'foto' => $foto
			);
			$id = $this->ModelPengurusGereja->update($id, $data);
			$this->session->set_flashdata('pesan', '<div
                      class="alert alert-success" role="alert">
                      Data berhasil DiTambah!
                      </div>');
			redirect('PengurusGereja');
		}
	}

	public function delete()
	{
		$id = $this->input->post('id_pengurusGereja');
		$this->ModelPengurusGereja->delete($id);
		redirect('PengurusGereja');
	}
}
