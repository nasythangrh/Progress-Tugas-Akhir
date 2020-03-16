<?php

class Donatur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_donatur');
        $this->load->model('model_kampanye');
        $this->load->model('model_kategori');
        $this->load->model('model_bank');
        $this->load->model('model_pengguna');
    }

    function index()
    {

        error_reporting(0);
        $data['record'] = $this->model_donatur->tampil_data();
        $data['record_bank'] = $this->model_bank->tampil_data();
        $data['record_pengguna'] = $this->model_pengguna->tampil_data();
        $data['record_kampanye'] = $this->model_kampanye->tampil_data();
        $this->template->load('template', 'donatur/lihat_data', $data);
    }

    function post()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id_donatur');
            $id_kampanye = $this->input->post('id_kampanye');
            $id_pengguna = $this->input->post('id_pengguna');
            $id_bank = $this->input->post('id_bank');
            $tgl_donasi = $this->input->post('tgl_donasi');
            $jam = $this->input->post('jam');
            $jum_transfer = $this->input->post('jum_transfer');
            $bank_asal = $this->input->post('bank_asal');
            $no_rek_asal = $this->input->post('no_rek_asal');
            $bukti_transfer = $this->input->post('bukti_transfer');
            $status_donasi = $this->input->post('status_donasi');
            $keterangan = $this->input->post('keterangan');

            $config['upload_path'] = './assets/images/foto';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2500';
            $config['max_width'] = '3500';
            $config['max_height'] = '3500';
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bukti_transfer')) {
                $upload = $this->upload->data();
                $bukti_transfer = 'assets/images/foto/' . $upload['file_name'];
                $data = array('id_donatur' => $id,
                    'id_kampanye' => $id_kampanye,
                    'id_pengguna' => $id_pengguna,
                    'id_bank' => $id_bank,
                    'tgl_donasi' => $tgl_donasi,
                    'jam' => $jam,
                    'jum_transfer' => $jum_transfer,
                    'bank_asal' => $bank_asal,
                    'no_rek_asal' => $no_rek_asal,
                    'bukti_transfer' => $bukti_transfer,
                    'status_donasi' => $status_donasi,
                    'keterangan' => $keterangan

                );
                $this->model_donatur->post($data);
                redirect('donatur');
            } else {
                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
            }

        } else {
            $this->load->model('model_kampanye');
            $data['nama_kampanye'] = $this->model_kampanye->tampil_data()->result();
            $this->load->model('model_kampanye');
            $data['nama_pengguna'] = $this->model_pengguna->tampil_data()->result();
            $this->load->model('model_kampanye');
            $data['nama_bank'] = $this->model_bank->tampil_data()->result();
            $this->template->load('template', 'donatur/lihat_data', $data);
        }
    }

    function edit()
    {
        if (isset($_POST['submit'])) {
            $id = $this->uri->segment(3);
            $id_kampanye = $this->input->post('id_kampanye');
            $id_pengguna = $this->input->post('id_pengguna');
            $id_bank = $this->input->post('id_bank');
            $tgl_donasi = $this->input->post('tgl_donasi');
            $jam = $this->input->post('jam');
            $jum_transfer = $this->input->post('jum_transfer');
            $bank_asal = $this->input->post('bank_asal');
            $no_rek_asal = $this->input->post('no_rek_asal');
            $bukti_transfer = $this->input->post('bukti_transfer');
            $status_donasi = $this->input->post('status_donasi');
            $keterangan = $this->input->post('keterangan');

            $config['upload_path'] = './assets/images/foto';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2500';
            $config['max_width'] = '3500';
            $config['max_height'] = '3500';
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bukti_transfer')) {
                $upload = $this->upload->data();
                $bukti_transfer = 'assets/images/foto/' . $upload['file_name'];
                $data = array('id_donatur' => $id,
                    'id_kampanye' => $id_kampanye,
                    'id_pengguna' => $id_pengguna,
                    'id_bank' => $id_bank,
                    'tgl_donasi' => $tgl_donasi,
                    'jam' => $jam,
                    'jum_transfer' => $jum_transfer,
                    'bank_asal' => $bank_asal,
                    'no_rek_asal' => $no_rek_asal,
                    'bukti_transfer' => $bukti_transfer,
                    'status_donasi' => $status_donasi,
                    'keterangan' => $keterangan
                );
                $this->model_donatur->edit($data, $id);
                redirect('donatur');
            } else {
                if ($this->upload->do_upload('bukti_transfer') == null) {
                    $data = array('id_donatur' => $id,
                        'id_kampanye' => $id_kampanye,
                        'id_pengguna' => $id_pengguna,
                        'id_bank' => $id_bank,
                        'tgl_donasi' => $tgl_donasi,
                        'jam' => $jam,
                        'jum_transfer' => $jum_transfer,
                        'bank_asal' => $bank_asal,
                        'no_rek_asal' => $no_rek_asal,
                        'status_donasi' => $status_donasi,
                        'keterangan' => $keterangan
                    );
                    $this->model_donatur->edit($data, $id);
                    redirect('donatur');
                }
                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
            }
        } else {
            $id = $this->uri->segment(3);
            $data['record'] = $this->model_donatur->get_one($id)->row_array();
            $data['record_kampanye'] = $this->model_kampanye->tampil_data();
            $data['pengguna'] = $this->model_pengguna->tampil_data();
            $data['bank'] = $this->model_bank->tampil_data();

            $this->template->load('template', 'donatur/update_data', $data);
        }

    }

    function delete()
    {
        $id = $this->uri->segment(3);
        $this->model_donatur->delete($id);
        redirect('Donatur');
    }

    function donatur()
    {
        $id_kampanye = $this->uri->segment(3);
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_bank = $this->input->post('id_bank');
        $jum_transfer = $this->input->post('jum_transfer');

        $foto = "belum";
        $status = "Menunggu";
//        $tgl_donasi = $this->input->post('tgl_donasi');
        $date = date('Y-m-d');//get tanggal terkini
        $time = 5 + date('H');//get jam terkini
        $sec = date('i:s');//get detik dan menit terkini
        $jam = $time . ":" . $sec;//jumlahkan untuk time indonesia
        $keterangan = "belum";
        $sembunyi = $this->input->post("sembunyi");
        $tampil = null;
        if ($sembunyi == "Y") {
            $tampil = "N";
        } else {
            $tampil = "Y";
        }
        $data = array('id_kampanye' => $id_kampanye,
            'id_pengguna' => $id_pengguna,
            'id_bank' => $id_bank,
            'tgl_donasi' => $date,
//            'tgl_donasi' => $tgl_donasi,
            'jam' => $jam,
            'jum_transfer' => $jum_transfer,
            'bukti_transfer' => $foto,
            'status_donasi' => $status,
            'tampil_nama' => $tampil,
            'keterangan' => $keterangan
        );
        $kampanye = $this->model_kampanye->get_one($id_kampanye)->row_array();
        $this->model_donatur->post($data);
        $bank = $this->model_bank->get_one($id_bank)->row_array();
        $donasi = $this->model_donatur->getByTgl($id_kampanye, $jam, $id_pengguna)->row_array(); //getByTgl($id_kampanye, $jam, $id_pengguna)->row_array()
        $kode = $jum_transfer + $donasi['id_donatur'];
//        $total = $kampanye['dana_terkumpul'] + $kode;
//        $kampanye = array(
//            'dana_terkumpul'=>$total
//        );
        $this->model_kampanye->edit($kampanye, $id_kampanye);
        echo $this->session->set_flashdata('msg', "Info Donasi Anda<br>Berhasil mengisi donasi anda! Rp. $jum_transfer ditambah 3 kode unik dibelakang " . $donasi['id_donatur'] . "<br>
Total yang harus harus Anda donasikan adalah <br><br><b>Rp. " . $kode . "</b><br><br>
Segera transfer ke rekening atas nama:<br><br>
<b>" . $bank['nama_rek'] . "</b><br>
<b>" . $bank['nama_bank'] . "<b/><br>
<b>" . $bank['no_rek'] . "</b><br><br>
*WAJIB unggah foto bukti transfer anda di Menu <b>BUKTI TRANSFER<b/>*<br>");
        $data['kategori'] = $this->model_kategori->tampil_data();
        redirect(site_url("welcome/detail/" . $id_kampanye));
    }

    public function pembayaran()
    {
        $id = $this->uri->segment(3);
        $config['upload_path'] = './assets/images/foto';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2500';
        $config['max_width'] = '3500';
        $config['max_height'] = '3500';
        $this->upload->initialize($config);
        if ($this->upload->do_upload('bukti_transfer')) {
            $upload = $this->upload->data();
            $bukti_transfer = 'assets/images/foto/' . $upload['file_name'];
            $tgl_bayar = $this->input->post('tgl_bayar');
            $bank_asal = $this->input->post('bank_asal');
            $no_rek_asal = $this->input->post('no_rek_asal');
            $data = array(
                'bukti_transfer' => $bukti_transfer,
                'keterangan' => "upload",
                'tgl_bayar' => $tgl_bayar,
                'bank_asal' => $bank_asal,
                'no_rek_asal' => $no_rek_asal
            );
            $this->model_donatur->edit($data, $id);
            echo $this->session->set_flashdata('msg', "Berhasil Mengunggah Bukti Transfer");
            redirect('konfirmasi');
        } else {
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];
        }
    }

    public function disposisi()
    {
        $id = $this->uri->segment(3);
        $tgl_bayar = date("20y-m-d");
        $donatur = $this->model_donatur->get_one($id)->row_array();

        //!masih sedikit eror.
        /*jika hanya line $this->model_donatur->disposisi($data, $id); aja, maka admin bisa klik ceklis
        setujui donasi tanpa bukti, tapi eror nampilin print laporan donatur yang ada donasi tanpa bukti.
        hanya bisa tampil jika semua donatur di suatu kampanye sudah unggah bukti.*/
        /*tp line kondisi ifelse yg dikomen dibawah kecuali $this->model_donatur->disposisi..., admin ttp bisa klik cklis
        ceklis setujui tanpa bukti tapi malah hrs klik dua kali ceklis baru bisa nambah ke dana terkumpul. tapi bisa nampilkan
        print lap donatur*/
        /*Jadi wajib unggah bukti supaya tidak ada masalah disposisi*/
        if($donatur['bukti_transfer'] == "belum"){ //jika donatur sudah donasi via atm tapi tidak upload bukt transfer
            $data = array(
                'bukti_transfer' => "assets/images/foto/XBuktiTransfer.jpg", //default foto, jangan dihapus di db
                'keterangan' => "upload",
                'tgl_bayar' => $tgl_bayar,
                'bank_asal' => 1, //default id bank. jangan dihapus di db
                'no_rek_asal' => 1 //default no rek asal id bank 1, jangan dihapus di db
            );
            $this->model_donatur->edit($data, $id);
        }
        else{
            $data = array('status_donasi' => "Diterima",);
            $this->model_donatur->disposisi($data, $id);
        }
        //!

        $kampanye = $this->model_kampanye->get_one($donatur['id_kampanye'])->row_array();
        $total = $donatur['jum_transfer'] + $kampanye['dana_terkumpul'] + $donatur['id_donatur'];
        $data = array('dana_terkumpul' => $total);
        $this->model_kampanye->edit($data, $donatur['id_kampanye']);
        redirect('Donatur');
    }
}


?>
