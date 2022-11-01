<?php

class Cerai extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}
		$this->load->model("ModelCerai");
	}

	public function index()
	{
		$dataCerai = $this->ModelCerai->getAll();
		$data = array(
			"cerais" => $dataCerai
		);

		$data['title'] = 'Data Cerai';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('content/cerai/v_list_cerai', $data);
		$this->load->view('templates/footer', $data);
	}
	//untuk me-load tampilan form tambah barang
	public function tambah()
	{
		$dataCerai = $this->ModelCerai->getAll();
		$data = array(
			"cerais" => $dataCerai
		);

		$data['title'] = 'Tambah Data Cerai';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view("content/cerai/v_add_cerai", $data);
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
			$no_surat_cerai = $this->input->post('no_surat_cerai', TRUE);
			$nama_pria = $this->input->post('nama_pria', TRUE);
			$nama_wanita = $this->input->post('nama_wanita', TRUE);
			$tanggal_cerai = $this->input->post('tanggal_cerai', TRUE);
			$alasan_cerai = $this->input->post('alasan_cerai', TRUE);

			$data = array(
				'no_surat_cerai' => $no_surat_cerai,
				'nama_pria' => $nama_pria,
				'nama_wanita' => $nama_wanita,
				'tanggal_cerai' => $tanggal_cerai,
				'alasan_cerai' => $alasan_cerai,
				'foto' => $foto
			);
			$id = $this->ModelCerai->insertGetId($data);
			$this->session->set_flashdata('pesan', '<div
                      class="alert alert-success" role="alert">
                      Data berhasil DiTambah!
                      </div>');
			redirect('cerai');
		}
	}
	public function print()
	{
		$dataCerai['cerai'] = $this->ModelCerai->getAll();
		$this->load->view('content/cerai/print_cerai', $dataCerai);
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');

		$dataCerai['Cerai'] = $this->ModelCerai->get_data('cerai');
		$this->load->view('content/cerai/pdf_cerai', $dataCerai);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporancerai.pdf', array('Attachment' => 0));
	}



	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Cerai';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$cerai = $this->ModelCerai->getByPrimaryKey($id);
		$data = array(
			"cerai" => $cerai,
		);
		$this->load->view('content/cerai/v_update_cerai', $data);
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
			$no_surat_cerai = $this->input->post('no_surat_cerai', TRUE);
			$nama_pria = $this->input->post('nama_pria', TRUE);
			$nama_wanita = $this->input->post('nama_wanita', TRUE);
			$tanggal_cerai = $this->input->post('tanggal_cerai', TRUE);
			$alasan_cerai = $this->input->post('alasan_cerai', TRUE);
			$id = $this->input->post('id_cerai');

			$data = array(
				'no_surat_cerai' => $no_surat_cerai,
				'nama_pria' => $nama_pria,
				'nama_wanita' => $nama_wanita,
				'tanggal_cerai' => $tanggal_cerai,
				'alasan_cerai' => $alasan_cerai,
				'foto' => $foto
			);
			$id = $this->ModelCerai->update($id, $data);
			$this->session->set_flashdata('pesan', '<div
                      class="alert alert-success" role="alert">
                      Data berhasil DiTambah!
                      </div>');
			redirect('cerai');
		}
		echo var_dump($data);
		echo var_dump($id);
		$this->ModelJemaat->update($id, $data);
		redirect('cerai');
	}

	public function delete()
	{
		$id = $this->input->post('id_cerai');
		$this->ModelCerai->delete($id);
		redirect('cerai');
	}
}
