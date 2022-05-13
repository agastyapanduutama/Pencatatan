  <?php defined('BASEPATH') or exit('No direct script access allowed');

    class C_satuan extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();

            $this->load->model('admin/M_satuan', 'satuan');
        }

        public function list()
        {
            $data = array(
                'title'  => 'Data satuan',
                'menu'   => 'satuan',
                'script' => 'satuan',
                'konten' => 'admin/satuan/list'
            );

            $this->load->view('admin/templates/template', $data, FALSE);
        }


        function getsatuan()
        {
            echo json_encode($this->satuan->data_satuan());
        }


        function data()
        {
            error_reporting(0);
            $list = $this->satuan->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $idNa = $this->req->acak($field->id);
                // $idNa = $field->id;

                $url = base_url("admin/satuan/detail/") . $idNa;

                $button = "
                <button class='btn btn-danger btn-sm' id='delete' data-id='$idNa' title='Hapus Data'><i class='fas fa-trash-alt'></i></button>
                <button class='btn btn-warning btn-sm' id='edit' data-id='$idNa' title='Edit Data'><i class='fas fa-pencil-alt'></i></button>";

                $status = ($field->status) == '1' ? "<button class='btn btn-success btn-sm' id='on' data-id='$idNa' title='User Aktif'><i class='fas fa-toggle-on'></i> ON</button>" : "<button class='btn btn-danger btn-sm' id='off' data-id='$idNa' title='User Tidak aktif'><i class='fas fa-toggle-off'></i> OFF</button>";

                $jk = ($field->jk == 1) ? 'Laki-Laki' : 'Perempuan';

                $level = ($field->level == 2) ? 'Pengurus' : 'satuan';

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->singkatan;
                $row[] = $field->nama_satuan;
                $row[] = $field->keterangan;
                $row[] = $button;
                $row[] = $status;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->satuan->count_all(),
                "recordsFiltered" => $this->satuan->count_filtered(),
                "data" => $data,
            );
            echo json_encode($output);
        }

        function get($id)
        {
            $data = $this->satuan->get($id);
            foreach ($data as $key => $value) {
                if (strtolower($key) == 'id') {
                    $data->$key = $this->req->acak($value);
                }
            }
            echo json_encode($data);
        }

        function insert()
        {
            
            // Cek data username apakah sudah ada atau belum
            
            $data = $this->req->all();

            if ($this->satuan->insert($data) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil menambahkan data !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal menambahkan data !'
                );
            }
        

            
            echo json_encode($msg);
        }

        function set($id, $action)
        {
            if ($action == 'on') {
                if ($this->satuan->update(['status' => '1'], $this->req->id($id)) == true) {
                    $msg = array(
                        'status' => 'ok',
                        'msg' => 'Berhasil Mengaktifkan Akun !'
                    );
                } else {
                    $msg = array(
                        'status' => 'fail',
                        'msg' => 'Gagal menambahkan data !'
                    );
                }
                echo json_encode($msg);
            } elseif ($action == 'off') {
                if ($this->satuan->update(['status' => '0'], $this->req->id($id)) == true) {
                    $msg = array(
                        'status' => 'ok',
                        'msg' => 'Berhasil Me-nonaktifkan Akun !'
                    );
                } else {
                    $msg = array(
                        'status' => 'fail',
                        'msg' => 'Gagal Me-nonaktifkan data !'
                    );
                }
                echo json_encode($msg);
            } elseif ($action == 'reset') {
                if ($this->satuan->update(['password' => $this->req->acak('123')], $this->req->id($id)) == true) {
                    $msg = array(
                        'status' => 'ok',
                        'msg' => 'Berhasil Me-reset Akun !'
                    );
                } else {
                    $msg = array(
                        'status' => 'fail',
                        'msg' => 'Gagal Me-reset data !'
                    );
                }
                echo json_encode($msg);
            }
        }


        function update()
        {

            // $this->req->print($_POST);
            $custom = [
                'id' => false,
            ];

            $id = $this->input->post('id');
            $data = $this->req->all($custom);
            if ($this->satuan->update($data, $this->req->id($id)) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil mengubah data !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal mengubah data !'
                );
            }
            // echo $this->db->last_query();
            echo json_encode($msg);
        }

        function delete($id)
        {
            if ($this->satuan->delete($this->req->id($id)) == true) {
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

        public function detail($id)
        {
            $satuan = $this->satuan->get($id);
            
            $data = array(
                'title' => "Detail satuan " . $satuan->judul,
                'data' => $satuan,
                'konten' => 'admin/satuan/detail', 
            );

            $this->load->view('admin/templates/template', $data, FALSE);
            
        }

        
    }
