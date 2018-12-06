<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rawat_model extends CI_Model {

	public function data_pasien()
	{
		return $this->db->select('tb_pasien.*,tb_keluarga_pasien.nama_keluarga')
						->from('tb_pasien')
						->join('tb_keluarga_pasien','tb_pasien.no_rm=tb_keluarga_pasien.id_pasien')
						->get()
						->result();
	}

	public function data_rawat_jalan()
	{
		return $this->db->select('tb_rawat_jalan.*,tb_pasien.nama_pasien,tb_pasien.no_rm,tb_dokter.nama_dokter')
						->from('tb_rawat_jalan')
						->join('tb_pasien','tb_rawat_jalan.id_pasien=tb_pasien.no_rm')
						->join('tb_dokter','tb_rawat_jalan.id_dokter=tb_dokter.no_dokter')
						->get()
						->result();
	}

	public function data_pembayaran()
	{
		return $this->db->get('tb_pembayaran')
						->result();
	}

	public function data_dokter()
	{
		return $this->db->get('tb_dokter')
						->result();
	}

	public function get_id_pasien($no_rm)
	{
		return $this->db->select('*')
						->where('no_rm',$no_rm)
						->get('tb_pasien')
						->row();
	}

	public function get_id_rawat($no_rj)
	{
		return $this->db->select('tb_rawat_jalan.*,tb_pasien.no_rm,tb_pasien.nama_pasien,tb_pasien.tanggal_lahir,tb_dokter.nama_dokter')
						->from('tb_rawat_jalan')
						->join('tb_pasien','tb_rawat_jalan.id_pasien=tb_pasien.no_rm')
						->join('tb_dokter','tb_rawat_jalan.id_dokter=tb_dokter.no_dokter')
						->where('no_rj',$no_rj)
						->get()
						->row();
	}

	public function tambah_pasien()
	{
		$nama = $this->input->post('nama_pasien');
		$alamat = $this->input->post('alamat_pasien');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$no_hp = $this->input->post('no_hp');
		$status = $this->input->post('status');

		$data = array(
			'nama_pasien' => $nama,
			'alamat_pasien' => $alamat,
			'jenis_kelamin' => $jenis_kelamin,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'no_hp' => $no_hp,
			'status' => $status
		 );

		$this->db->insert('tb_pasien',$data);
		$id = $this->db->insert_id();

		$nama_keluarga = $this->input->post('nama_keluarga');
		$hubungan = $this->input->post('hubungan');
		$kp = array(
			'nama_keluarga' => $nama_keluarga,
			'hubungan' => $hubungan,
			'id_pasien'=> $id 
		);
		$this->db->insert('tb_keluarga_pasien',$kp);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function tambah_pasien_rawat()
	{
		$pembayaran = $this->input->post('pembayaran');
		$no_asuransi = $this->input->post('no_asuransi');
		$penanggung = $this->input->post('penanggung_jawab');
		$kadaluarsa = $this->input->post('kadaluarsa');
		$kelas = $this->input->post('kelas');
		$unit = $this->input->post('unit');
		$cara_masuk = $this->input->post('cara_masuk');
		$tarif = $this->input->post('tarif');
		$id_pasien = $this->input->post('id_pasien');
		$id_dokter = $this->input->post('id_dokter');

		$data = array(
			'pembayaran' => $pembayaran,
			'penanggung_jawab' => $penanggung,
			'kadaluarsa' => $kadaluarsa,
			'kelas' => $kelas,
			'unit' => $unit,
			'cara_masuk' => $cara_masuk,
			'tarif' => $tarif ,
			'id_pasien' => $id_pasien,
			'id_dokter' => $id_dokter
		);

		$this->db->insert('tb_rawat_jalan',$data);
		$id = $this->db->insert_id();

		$pb = array(
				'no_asuransi' => $no_asuransi, 
		);
		if($pembayaran == 'BPJS'){
			$this->db->update('tb_rawat_jalan',$pb,array('no_rj' => $id));
		}else{
			$this->db->update('tb_rawat_jalan',array('no_asuransi' => NULL),array('no_rj' => $id));
		}

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function tambah_dokter()
	{
		$data = array(
			'nama_dokter' => $this->input->post('nama_dokter'),
			'alamat_dokter' => $this->input->post('alamat_dokter') 
		);

		$this->db->insert('tb_dokter',$data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}



}

/* End of file Rawat_model.php */
/* Location: ./application/models/Rawat_model.php */