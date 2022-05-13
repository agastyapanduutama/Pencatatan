<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_transaksi', 'transaksi');
        
    }
    

    public function index()
    {
        $total = $this->db->get('t_transaksi')->num_rows();
        $totalMasuk = $this->db->get_where('t_transaksi', ['jenis_transaksi' => '1'])->num_rows();
        $totalkeluar = $this->db->get_where('t_transaksi', ['jenis_transaksi' => '2'])->num_rows();
        $lastTransaction = $this->transaksi->get_last_transaction();

        
        $grafikmasuk = $this->transaksi->masukTransaksi();
        $grafikkeluar = $this->transaksi->keluarTransaksi();
        $grafikuangmasuk = $this->transaksi->masukuangTransaksi();
        $grafikuangkeluar = $this->transaksi->keluaruangTransaksi();

        $akumulasiBarangMasuk = $this->transaksi->akumulasiBarangMasuk();
        $akumulasiBarangKeluar = $this->transaksi->akumulasiBarangKeluar();
        $akumulasiUangMasuk = $this->transaksi->akumulasiUangMasuk(); 
        $akumulasiUangKeluar = $this->transaksi->akumulasiUangKeluar(); 


        $data = array(
            'akumulasiBarangMasuk'       => $akumulasiBarangMasuk,
            'akumulasiBarangKeluar'       => $akumulasiBarangKeluar,
            'akumulasiUangMasuk'       => $akumulasiUangMasuk,
            'akumulasiUangKeluar'       => $akumulasiUangKeluar,
            'masukbarang'       => $grafikmasuk,
            'keluarbarang'      => $grafikkeluar,
            'masukuangbarang'       => $grafikuangmasuk,
            'keluaruangbarang'      => $grafikuangkeluar,
            'total'             => $total,
            'lastTransaction'   => $lastTransaction,
            'totalMasuk'        => $totalMasuk,
            'totalkeluar'       => $totalkeluar,
            'title'             => "Dashboard Pencatatan Gula" ,
            'konten'            => 'admin/dashboard' 
        );  

        $this->load->view('admin/templates/template', $data, FALSE);
        
    }

     public function profil()
    {
        $profil = $this->db->get_where('t_user', ['id'=> $_SESSION['id_user']])->row();

        $data = array(
            'title' => "Ganti Password",
            'profil' => $profil,
            'konten' => 'admin/pengaturan/profile'
        );

        $this->load->view('admin/templates/template', $data, FALSE);
    }

    public function updatePass()
    {
        $custom = [
            'password_lama' => false,
            'password' => $this->req->acak($_POST['password'])
        ];
        $data = $this->req->all($custom);

        $cekPass = $this->db->get_where('t_user', ['id'=> $_SESSION['id_user'], 'password' => $this->req->acak($_POST['password_lama'])])->row();

        
        if ($cekPass != '') {
            $this->db->where('id', $_SESSION['id_user']);
            $this->db->update('t_user', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Berhasil memperbarui Password");
                redirect('admin/profil', 'refresh');
            } else {
                $this->session->set_flashdata('warning', "Gagal memperbarui Password");
                redirect('admin/profil', 'refresh');
            }
        }else{
            $this->session->set_flashdata('warning', "Password tidak sesuai dengan yang lama");
            redirect('admin/profil', 'refresh');
        }
        
    }

}

/* End of file C_home.php */
