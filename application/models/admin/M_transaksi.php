<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        
        $this->table = "t_transaksi";
    }
    

    function cekPerubahan()
    {
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->cekPerubahan();
    }

    function get($id)
    {
        return $this->db->get_where($this->table, $this->req->id($id))->row();
    }

    function update($data, $where)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
        return $this->cekPerubahan();
    }

    function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->table);
        return $this->cekPerubahan();
        
    }

    public function get_transaksi_masuk()
    {
        $this->db->select('t_transaksi.*, t_satuan.singkatan');
        $this->db->from($this->table);
        $this->db->join('t_satuan', 't_satuan.id = t_transaksi.id_satuan', 'left');
        $this->db->where('t_transaksi.jenis_transaksi', 1);
        return $this->db->get()->result();
    }
    
    public function get_transaksi_keluar()
    {
        $this->db->select('t_transaksi.*, t_satuan.singkatan');
        $this->db->from($this->table);
        $this->db->join('t_satuan', 't_satuan.id = t_transaksi.id_satuan', 'left');
        $this->db->where('t_transaksi.jenis_transaksi', 2);
        return $this->db->get()->result();
    }

    public function get_last_transaction()
    {
        $this->db->select('t_transaksi.*, t_satuan.singkatan');
        $this->db->from($this->table);
        $this->db->join('t_satuan', 't_satuan.id = t_transaksi.id_satuan', 'left');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    public function masukTransaksi()
    {
        $first = date("Y"). "-01-01";
        $lasty = date("Y"). "-12-31";
        return $this->db->query("
        SELECT sum(jumlah) AS 'jumlah', MONTH(tanggal) AS bulan
        from t_transaksi
        WHERE jenis_transaksi = 1 AND (tanggal) BETWEEN '$first' AND '$lasty'
        GROUP BY YEAR(tanggal), MONTH(tanggal)
        ")->result();
    }
    

    public function keluarTransaksi()
    {
        $first = date("Y"). "-01-01";
        $lasty = date("Y"). "-12-31";
        return $this->db->query("
        SELECT sum(jumlah) AS 'jumlah', MONTH(tanggal) AS bulan
        from t_transaksi
        WHERE jenis_transaksi = 2 AND (tanggal) BETWEEN '$first' AND '$lasty'
        GROUP BY YEAR(tanggal), MONTH(tanggal)
        ")->result();
    }

    public function masukuangTransaksi()
    {
        $first = date("Y"). "-01-01";
        $lasty = date("Y"). "-12-31";
        return $this->db->query("
        SELECT sum(nominal) AS 'jumlah', MONTH(tanggal) AS bulan
        from t_transaksi
        WHERE jenis_transaksi = 2 AND (tanggal) BETWEEN '$first' AND '$lasty'
        GROUP BY YEAR(tanggal), MONTH(tanggal)
        ")->result();
    }
    

    public function keluaruangTransaksi()
    {
        $first = date("Y"). "-01-01";
        $lasty = date("Y"). "-12-31";
        return $this->db->query("
        SELECT sum(nominal) AS 'jumlah', MONTH(tanggal) AS bulan
        from t_transaksi
        WHERE jenis_transaksi = 1 AND (tanggal) BETWEEN '$first' AND '$lasty'
        GROUP BY YEAR(tanggal), MONTH(tanggal)
        ")->result();
    }
    

    public function akumulasiBarangMasuk()
    {
        $tahun = date("Y");
        return $this->db->query("
        SELECT sum(jumlah) AS 'jumlah' from t_transaksi
        WHERE tahun = $tahun AND jenis_transaksi = 1
        GROUP BY tahun;
        ")->row();
    }

    public function akumulasiBarangKeluar()
    {
        $tahun = date("Y");
        return $this->db->query("
        SELECT sum(jumlah) AS 'jumlah' from t_transaksi
        WHERE tahun = $tahun AND jenis_transaksi = 2
        GROUP BY tahun;
        ")->row();
    }

    public function akumulasiUangMasuk()
    {
        $tahun = date("Y");
        return $this->db->query("
        SELECT sum(nominal) AS 'jumlah' from t_transaksi
        WHERE tahun = $tahun AND jenis_transaksi = 2
        GROUP BY tahun;
        ")->row();
    }

    public function akumulasiUangKeluar()
    {
        $tahun = date("Y");
        return $this->db->query("
        SELECT sum(nominal) AS 'jumlah' from t_transaksi
        WHERE tahun = $tahun AND jenis_transaksi = 1
        GROUP BY tahun;
        ")->row();
    }
    
    

}

/* End of file M_transaksi.php */
