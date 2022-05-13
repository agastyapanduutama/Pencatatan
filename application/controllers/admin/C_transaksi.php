<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class C_transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('admin/M_transaksi', 'transaksi');
        

    }
    

    // List all your items
    public function masuk( $offset = 0 )
    {
        $transaksi = $this->transaksi->get_transaksi_masuk();
        $satuan = $this->db->get('t_satuan')->result();
        
        $data = array(
            'satuan' => $satuan,    
            'transaksi' => $transaksi,    
            'title' => "Transaksi Barang Masuk", 
            'script' => 'transaksiMasuk',
            'konten' => "admin/transaksi/masuk",
        );

        $this->load->view('admin/templates/template', $data);
    }

    // Add a new itema
    public function insertMasuk()
    {
        $custom = [
            'id_user'           => $this->session->id_user,
            'jenis_transaksi'   => '1',
            'jam'               => date('H:i:s'),
            'tahun'             => date('Y'),
            'updated_at'        => date('Y-m-d H:i:s'),
            'nominal'           => str_replace('.', '', $this->input->post('nominal')),
            'jumlah'           => str_replace('.', '', $this->input->post('jumlah')),
        ];

        $data = $this->req->all($custom);
        if ($this->transaksi->insert($data) == true) {
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Transaksi Masuk');
            redirect('admin/transaksi/masuk', 'redirect');
        } else {
            $this->session->set_flashdata('warning', 'Terjadi Kesalahan Sistem Saat Menambahkan Data');
            redirect('admin/transaksi/masuk', 'redirect');
        }
    }

    public function getMasuk($id = null)
    {

    }

    //Update one item
    public function updateMasuk( $id = NULL )
    {

    }

    //Delete one item
    public function deleteMasuk( $id = NULL )
    {
            if ($this->transaksi->delete(['id'=>$id]) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil menghapus data !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal menghapus data !'
                );
            }
            echo json_encode($msg);
            
    }

    
    // List all your items
    public function Keluar( $offset = 0 )
    {
        $transaksi = $this->transaksi->get_transaksi_keluar();
        $satuan = $this->db->get('t_satuan')->result();
        
        $data = array(
            'satuan' => $satuan,    
            'transaksi' => $transaksi,    
            'title' => "Transaksi Barang Keluar", 
            'script' => 'transaksiKeluar',
            'konten' => "admin/transaksi/keluar",
        );

        $this->load->view('admin/templates/template', $data);
    }

    // Add a new itema
    public function insertKeluar()
    {
        $custom = [
            'id_user'           => $this->session->id_user,
            'jenis_transaksi'   => '2',
            'jam'               => date('H:i:s'),
            'tahun'             => date('Y'),
            'updated_at'        => date('Y-m-d H:i:s'),
            'nominal'           => str_replace('.', '', $this->input->post('nominal')),
            'jumlah'           => str_replace('.', '', $this->input->post('jumlah')),
        ];

        $data = $this->req->all($custom);
        if ($this->transaksi->insert($data) == true) {
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Transaksi Keluar');
            redirect('admin/transaksi/keluar', 'redirect');
        } else {
            $this->session->set_flashdata('warning', 'Terjadi Kesalahan Sistem Saat Menambahkan Data');
            redirect('admin/transaksi/keluar', 'redirect');
        }
    }

    public function getKeluar($id = null)
    {
        
    }

    //Update one item
    public function updateKeluar( $id = NULL )
    {

    }

    //Delete one item
    public function deleteKeluar( $id = NULL )
    {
            if ($this->transaksi->delete(['id'=>$id]) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil menghapus data !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal menghapus data !'
                );
            }
            echo json_encode($msg);
            
    }
}

/* End of file C_transaksi.php */

