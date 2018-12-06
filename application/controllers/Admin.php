<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Rawat_model'));
	}

	public function index()
	{
		$data['main_view'] = 'dashboard';
		$this->load->view('template',$data);
	}

	public function data_pasien()
	{
		$data['main_view'] = 'data_pasien';
		$data['pasien'] = $this->Rawat_model->data_pasien();

		$this->load->view('template', $data);
	}

	public function data_rawat_jalan()
	{
		$data['main_view'] = 'data_rawat_jalan';
		$data['rawat'] = $this->Rawat_model->data_rawat_jalan();

		$this->load->view('template', $data);
	}

	public function data_pembayaran()
	{
		$data['main_view'] = 'data_pembayaran';
		$data['bayar'] = $this->Rawat_model->data_pembayaran();

		$this->load->view('template', $data);
	}

	public function pendaftaran_pasien()
	{
		$data['main_view'] = 'pendaftaran_pasien';

		$this->load->view('template', $data);
	}

	public function pendaftaran_pasien_rawat($value='')
	{
		$data['main_view'] = 'pendaftaran_pasien_rawat';

		$this->load->view('template', $data);
	}

	public function tambah_pasien()
	{
		if($this->Rawat_model->tambah_pasien() == TRUE){
			$this->session->set_flashdata('berhasil', 'Tambah Pasien berhasil');
			redirect('admin/data_pasien','refresh');
		}else{
			$this->session->set_flashdata('gagal', 'Tambah Pasien gagal');
			redirect('admin/pendaftaran_pasien','refresh');
		}
	}

	public function tambah_pasien_rawat()
	{
		if($this->Rawat_model->tambah_pasien_rawat() == TRUE){
			$this->session->set_flashdata('berhasil', 'Rawat Jalan berhasil disimpan');
			redirect('admin/data_rawat_jalan','refresh');
		}else{
			$this->session->set_flashdata('gagal', 'Rawat Jalan gagal disimpan');
			redirect('admin/data_rawat_jalan','refresh');
		}
	}

	public function cetak_id($no_rm)
	{
		$data['pasien'] = $this->Rawat_model->get_id_pasien($no_rm);
		$this->load->view('cetak_id_pasien', $data);
		$html = $this->output->get_output();
		$this->load->library('pdf');
		$customPaper= array(0,0,360,300);
		$this->dompdf->setPaper($customPaper,'portrait');
		$this->dompdf->set_option('isHtml5ParserEnabled', true);
		$this->dompdf->loadHtml($html);
		$this->dompdf->render();
		$this->dompdf->stream('Cetak.pdf',array('Attachment'=>0));
	}

	public function cetak_nota($no_rj)
	{
		$data['rawat'] = $this->Rawat_model->get_id_rawat($no_rj);
		$this->load->view('cetak_nota_rawat_jalan', $data);
		$html = $this->output->get_output();
		$this->load->library('pdf');
		$customPaper= array(0,0,360,600);
		$this->dompdf->setPaper($customPaper,'portrait');
		$this->dompdf->set_option('isHtml5ParserEnabled', true);
		$this->dompdf->loadHtml($html);
		$this->dompdf->render();
		$this->dompdf->stream('CetakNota.pdf',array('Attachment'=>0));
	}

	public function data_dokter()
	{
		$data['main_view'] = 'data_dokter';
		$data['dokter'] = $this->Rawat_model->data_dokter();

		$this->load->view('template', $data);
	}

	public function tambah_dokter()
	{
		if($this->Rawat_model->tambah_dokter() == TRUE){
			$this->session->set_flashdata('berhasil', 'Dokter berhasil disimpan');
			redirect('admin/data_dokter','refresh');
		}else{
			$this->session->set_flashdata('gagal', 'Dokter gagal disimpan');
			redirect('admin/data_dokter','refresh');
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */