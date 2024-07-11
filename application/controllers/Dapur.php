<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Dapur extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('DapurModel');
	}

	public function index()
	{
		$data['data'] = $this->DapurModel->getdata()->result();
		// var_dump($data);exit;

		$this->load->view('t_admin/header');
		$this->load->view('t_admin/nav');
		$this->load->view('dapur', $data);
		$this->load->view('t_admin/footer', $data);
	}
	public function peta()
	{
		$data['data'] = $this->DapurModel->getdata()->result();
		// var_dump($data);exit;

		$this->load->view('t_admin/header');
		$this->load->view('t_admin/nav');
		$this->load->view('peta', $data);
		$this->load->view('t_admin/footer', $data);
	}

	public function tambah()
	{

		$this->load->view('t_admin/header');
		$this->load->view('t_admin/nav');
		$this->load->view('tambah_dapur');
		$this->load->view('t_admin/footer');
	}

	public function proses_tambah_data()
	{
		$id_dapur = $this->input->post('id_dapur');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$keterangan = $this->input->post('keterangan');
		$lat = $this->input->post('lat');
		$long = $this->input->post('long');



		$data = array(
			'id_dapur' => $id_dapur,
			'nama_pemilik' => $nama_pemilik,
			'keterangan' => $keterangan,
			'lat' => $lat,
			'long' => $long
		);

		$this->DapurModel->tambah($data);
		redirect('dapur');
	}

	public function edit($id_dapur)
	{
		$data['data'] = $this->DapurModel->getdataid($id_dapur)->row();

		$this->load->view('t_admin/header');
		$this->load->view('t_admin/nav');
		$this->load->view('edit_dapur', $data);
		$this->load->view('t_admin/footer');
	}

	public function proses_edit_data()
	{
		$id_dapur = $this->input->post('id_dapur');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$keterangan = $this->input->post('keterangan');
		$lat = $this->input->post('lat');
		$long = $this->input->post('long');

		$data = array(
			'nama_pemilik' => $nama_pemilik,
			'keterangan' => $keterangan,
			'lat' => $lat,
			'long' => $long
		);

		if (!empty($_FILES['foto']['name'])) {
			$nama_file = $_FILES['foto']['name'];
			$tmp_file = $_FILES['foto']['tmp_name'];
			$path = "./file/" . $nama_file;
			move_uploaded_file($tmp_file, $path);
			$data['foto'] = $nama_file;
		}

		$this->DapurModel->edit($data, $id_dapur);
		redirect('dapur');
	}

	public function hapus($id)
	{
		$this->DapurModel->hapus($id);
		redirect('dapur');
	}
}
