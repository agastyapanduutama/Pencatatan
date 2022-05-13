<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Request extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->uploadTypes = array(
            'doc'    => ['allowed_types' => 'pdf|docx|doc'],
            'img'    => ['allowed_types' => 'jpg|jpeg|png'],
            'html'   => ['allowed_types' => 'html'],
            'custom' => ['allowed_types' => 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png|ppt|pptx']
        );
    }

    function id($id)
    {
        return array('md5(id)' => $id);
    }

    function encKey($key)
    {
        return "md5($key)";
    }

    function acak($text)
    {
        return md5($text);
    }

    function cekPerubahan()
    {
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    function print($array, $clear = true, $stop = true)
    {
        if ($clear == true) {
            ob_clean();
            echo "<pre>";
            echo print_r($array);
            echo "</pre>";
            exit(0);
        } else {
            echo "<pre>";
            echo print_r($array);
            echo "</pre>";
            if ($stop == true) {
                exit(0);
            }
        }
    }

    function session()
    {
        $this->print($_SESSION);
    }

    function json($array)
    {
        echo "<pre>";
        echo json_encode($array);
        echo "</pre>";
    }

    function query()
    {
        echo $this->db->last_query();
    }

    function input($input)
    {
        return htmlspecialchars(ltrim(rtrim($_POST[$input])));
    }

    function all($guarded = null)
    {
        $request = $_POST;
        foreach ($request as $key => $value) {
            $result[$key] = $this->input($key);
        }
        if ($guarded != null) {
            foreach ($guarded as $guard_ => $value) {
                if ($value == false) {
                    unset($request[$guard_]);
                } else {
                    unset($request[$guard_]);
                    $request[$guard_] = $value;
                }
            }
        }
        return $request;
    }


    function upload($data)
    {
        $maxSize = isset($data['max_size']) ? $data['max_size'] : 3000;
        $config = array(
            'upload_path' => $data['path'],
            'encrypt_name' => $data['encrypt'],
            'max_size' => $maxSize
        );
        $config = array_merge($config, $this->uploadTypes[$data['type']]);
        $this->load->library('upload', $config);
        $uploading = $this->upload->do_upload($data['file']) ? true : false;
        if (!$uploading) {
            return array(
                'message' => 'error',
                'data' => $this->upload->display_errors()
            );
        } else {
            return array(
                'message' => 'success',
                'data' => $this->upload->data()
            );
        }
    }

    function upload_form($data)
    {
    
        $encrypt = (isset($data['encrypt']) == true) ? true : false;
        $fileName = (isset($data['fileName']) != '') ? $data['fileName'] : null;
        $customInput = (isset($data['customInput']) != '') ? $data['customInput'] : null;
        $maxSize = isset($data['max_size']) ? $data['max_size'] : 3500;
        
        if ($fileName) {
            $config = array(
                'upload_path' => $data['path'],
                'file_name' => $data['fileName'],
                'max_size' => $maxSize
            );
        } else {
            $config = array(
                'upload_path' =>  $data['path'],
                'encrypt_name' => $encrypt,
                'max_size' => $maxSize
            );
        }

        $config = array_merge($config, $this->uploadTypes[$data['type']]);
        $this->load->library('upload', $config);
        $uploading = $this->upload->do_upload($data['file']) ? true : false;
        if (!$uploading) {
            return $data_ = $this->all($customInput);
        } else {
            $data_ = $this->all($customInput);
            $upload_data = $this->upload->data();
            $result = array_merge($data_, [$data['file'] => $upload_data['file_name']]);
            // print_r($result);
            return $result;
        }
    }

    function upload_form_multi($data)
    {
        $fileName = [];
        // $this->print($data);
        $countfiles = count($_FILES[$data['file']]['name']);
        $maxSize = isset($data['max_size']) ? $data['max_size'] : 3500;
        $success = 0;

        if ($data['encrypt'] == true) {
            $config_ = array(
                'upload_path' => './uploads/' . $data['path'],
                'encrypt_name' => true,
                'max_size' => $maxSize
            );
        } else {
            $config_ = array(
                'upload_path' => './uploads/' . $data['path'],
                'encrypt_name' => false,
                'max_size' => $maxSize
            );
        }

        // echo $fileNameNa;

        $config = array_merge($config_, $this->uploadTypes[$data['type']]);

        $this->load->library('upload', $config);

        for ($i = 0; $i < $countfiles; $i++) {
            if (!empty($_FILES[$data['file']]['name'][$i])) {
                // echo $_FILES[$data['file']]['name'][$i];
                $fileNameNa = str_replace(["'", "`", ";", "^"], "", $_FILES[$data['file']]['name'][$i]);

                $_FILES['file']['name'] = $fileNameNa;
                $_FILES['file']['type'] = $_FILES[$data['file']]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$data['file']]['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES[$data['file']]['error'][$i];
                $_FILES['file']['size'] = $_FILES[$data['file']]['size'][$i];

                $config['file_name'] = time() . "-" . $fileNameNa;

                $this->upload->initialize($config);

                // File upload
                $uploading = $this->upload->do_upload('file') ? true : false;

                if ($uploading) {
                    // Get data about the file
                    $success++;
                    $uploadData = $this->upload->data();
                    $fileName[] = $uploadData['file_name'];
                    $oriFile[] = $fileNameNa;
                } else {
                    return $this->upload->display_errors();
                }
            }
        }

        $fileNaGan = "";
        foreach ($fileName as $key) {
            $fileNaGan .= "$key,";
        }

        $fileOriNaGan = "";
        foreach ($oriFile as $key) {
            $fileOriNaGan .= "$key,";
        }

        $fileNaGan = substr($fileNaGan, 0, strlen($fileNaGan) - 1);
        $fileOriNaGan = substr($fileOriNaGan, 0, strlen($fileOriNaGan) - 1);
        // print_r($fileName);
        $custom = isset($data['customInput']) ? $data['customInput'] : null;
        return [
            'total' => $countfiles,
            'success' => $success,
            'data' => $this->all($custom),
            'file' => [
                'lampiran' => $fileNaGan,
                'oriFile'  => $fileOriNaGan
            ]
        ];
    }


    function sendMail($dataNa)
    {

        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';

        // PHPMailer object
        $response   = false;
        $mail       = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'suksesdianglobaltech@gmail.com'; // user email
        $mail->Password = 'suksespasti123'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        $mail->setFrom('suksesdianglobaltech@gmail.com', ''); // user email
        // $mail->addReplyTo('xxx@hostdomain.com', ''); //user email

        // Add a recipient
        // $mail->addAddress('agastypandu@gmail.com'); //email tujuan pengiriman email
        if ($dataNa['email'] != '') {
            foreach ($dataNa['email'] as $key) {
                $mail->addAddress($key); //email tujuan pengiriman email
            }
        }



        // Email subject
        $mail->Subject = $dataNa['subjek']; //subject email
        // Set email format to HTML
        $mail->isHTML(true);
        // Email body content
        $mailContent = $this->load->view('email', $dataNa, TRUE);
        $mail->Body = $mailContent;

        // Send email
        return $mail;
    }

    function dateIndo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    function getBulanRomawi()
    {
        $bul = date('n');

        switch ($bul) {
            case 1:
                $bulan = "I";
                break;
            case 2:
                $bulan = "II";
                break;
            case 3:
                $bulan = "III";
                break;
            case 4:
                $bulan = "IV";
                break;
            case 5:
                $bulan = "V";
                break;
            case 6:
                $bulan = "VI";
                break;
            case 7:
                $bulan = "VII";
                break;
            case 8:
                $bulan = "VIII";
                break;
            case 9:
                $bulan = "IX";
                break;
            case 10:
                $bulan = "X";
                break;
            case 11:
                $bulan = "XI";
                break;
            case 12:
                $bulan = "XII";
                break;
        }
        return $bulan;
    }

    function getBulan($bul)
    {
        // $bul = date('n');

        switch ($bul) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Febuari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
        }
        return $bulan;
    }

    function userip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function url()
    {
        return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

}
