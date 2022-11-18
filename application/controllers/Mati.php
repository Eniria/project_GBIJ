<?php

class Mati extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelMati");
		$this->load->model("ModelJemaat");
	}

	public function index()
	{
		$dataMati = $this->ModelMati->getAll('jemaat');
		$data = array(
			"matis" => $dataMati
		);

		$data['title'] = 'Data Kematian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('content/mati/v_list_mati', $data);
		$this->load->view('templates/footer');
	}
	//untuk me-load tampilan form tambah barang
	public function tambah()
	{
		$data['jemaat'] = $this->ModelJemaat->getAll();

		$data['title'] = 'Tambah Data Kematian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view("content/mati/v_add_mati", $data);
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
			//$nama_mati = $this->input->post('nama_mati', TRUE);
			$jk_mati = $this->input->post('jk_mati', TRUE);
			$id_jemaat = $this->input->post('id_jemaat', TRUE);
			$tempat_mati = $this->input->post('tempat_mati', TRUE);
			$tanggal_mati = $this->input->post('tanggal_mati', TRUE);
			$alasan_mati = $this->input->post('alasan_mati', TRUE);

			$data = array(
				// 'nama_mati' => $nama_mati,
				'jk_mati' => $jk_mati,
				'id_jemaat' => $id_jemaat,
				'tempat_mati' => $tempat_mati,
				'tanggal_mati' => $tanggal_mati,
				'alasan_mati' => $alasan_mati,
				'foto' => $foto
			);
			$id = $this->ModelMati->insertGetId($data);
			$this->session->set_flashdata('pesan', '<div
                      class="alert alert-success" role="alert">
                      Data berhasil DiTambah!
                      </div>');
			redirect('mati');
		}
	}
	public function print()
	{
		$dataMati['mati'] = $this->ModelMati->getAll('jemaat');
		$this->load->view('content/mati/print_mati', $dataMati);
	}


	public function ubah($id)
	{
		$data['title'] = 'Ubah Data';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$mati = $this->ModelMati->getByPrimaryKey($id);
		$data = array(
			"mati" => $mati,
		);
		$this->load->view('content/mati/v_update_mati', $data);
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
			//$nama_mati = $this->input->post('nama_mati', TRUE);
			$jk_mati = $this->input->post('jk_mati', TRUE);
			$tempat_mati = $this->input->post('tempat_mati', TRUE);
			$tanggal_mati = $this->input->post('tanggal_mati', TRUE);
			$alasan_mati = $this->input->post('alasan_mati', TRUE);
			$id = $this->input->post('id_mati');
			$data = array(

				'jk_mati' => $jk_mati,
				'tempat_mati' => $tempat_mati,
				'tanggal_mati' => $tanggal_mati,
				'alasan_mati' => $alasan_mati,
				'foto' => $foto
			);
			$id = $this->ModelMati->update($id, $data);
			$this->session->set_flashdata('pesan', '<div
                      class="alert alert-success" role="alert">
                      Data berhasil DiTambah!
                      </div>');
			redirect('mati');
		}
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelJemaat->update($id, $data);
		redirect('mati');
	}

	public function delete()
	{
		$id = $this->input->post('id_mati');
		$this->ModelMati->delete($id);
		redirect('mati');
	}
}
