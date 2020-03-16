<?php
class Kampanye extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_kampanye');
        $this->load->model('model_kategori');
        $this->load->model('model_donatur');
        $this->load->model('model_pengguna');
        $this->load->model('model_bank');
        $this->load->helper('tgl_indo');
        $this->load->helper('nominal');
        $this->load->library('pdf');

    }

    function index(){
        
        $data['record'] = $this->model_kampanye->tampil_data();
        $data['kategori'] = $this->model_kampanye->tampil_kategori();
        $this->template->load('template','kampanye/lihat_data',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])){
        	$id  	 = $this->input->post('id_kampanye');
            $id_kategori    = $this->input->post('id_kategori');
            $nama_kampanye = $this->input->post('nama_kampanye');
            $tgl_mulai = $this->input->post('tgl_mulai');
            $tgl_selesai = $this->input->post('tgl_selesai');
            //$foto_kampanye = $this->input->post('foto_kampanye');
            $lokasi = $this->input->post('lokasi');
            $dana_terkumpul = $this->input->post('dana_terkumpul');
            $target_donasi = $this->input->post('target_donasi');
            $deskripsi = $this->input->post('deskripsi');
            // $config['upload_path'] = './assets/images/foto'; //path folder
	        // $config['allowed_types'] = 'jpg|png|jpeg'; //type image yang diizinkan
	        // $config['max_size']     = '2500';
	        // $config['max_width'] = '3500';
            // $config['max_height'] = '3500';
            // $this->upload->initialize($config);
            // if ($this->upload->do_upload('foto_kampanye')){
            //     $upload = $this->upload->data();
            //     $foto_kampanye = 'assets/images/foto/'.$upload['file_name']; //path file
                $data           = array('id_kampanye'=>$id,
                                    'id_kategori'=>$id_kategori,
                                    'nama_kampanye'=>$nama_kampanye,
                                    'tgl_mulai'=>$tgl_mulai,
                                    'tgl_selesai'=>$tgl_selesai,
                                    //'foto_kampanye'=>$foto_kampanye,
                                    'lokasi'=>$lokasi,
                                    'dana_terkumpul'=>$dana_terkumpul,
                                    'target_donasi'=>$target_donasi,
                                    'deskripsi'=>$deskripsi
                                        );
                $this->model_kampanye->post($data);
                redirect('Kampanye');
            // } else{
            //     $error = array('error'=>$this->upload->display_errors());
            //     echo $error['error'];
            // }
        }
        else{
                $this->load->model('model_kategori');
                $data['nama_kategori']= $this->model_kategori->tampil_data()->result();
                $this->template->load('template','kampanye/lihat_data',$data);
        }	
    }
    function edit()
    {
        if(isset($_POST['submit'])){
            $id  	 = $this->uri->segment(3);
            $id_kategori    = $this->input->post('id_kategori');
            $nama_kampanye = $this->input->post('nama_kampanye');
            $tgl_mulai = $this->input->post('tgl_mulai');
            $tgl_selesai = $this->input->post('tgl_selesai');
            //$foto_kampanye = $this->input->post('foto_kampanye');
            $lokasi = $this->input->post('lokasi');
            $dana_terkumpul = $this->input->post('dana_terkumpul');
            $target_donasi = $this->input->post('target_donasi');
            $deskripsi = $this->input->post('deskripsi');
            // $config['upload_path'] = './assets/images/foto';
            // $config['allowed_types'] = 'jpg|png|jpeg';
            // $config['max_size']     = '2500';
            // $config['max_width'] = '3500';
            // $config['max_height'] = '3500';
            // $this->upload->initialize($config);
            // if ($this->upload->do_upload('foto_kampanye')){
            //     $upload = $this->upload->data();
            //     $foto_kampanye = 'assets/images/foto/'.$upload['file_name']; //path file
                $data           = array('id_kampanye'=>$id,
                                        'id_kategori'=>$id_kategori,
                                        'nama_kampanye'=>$nama_kampanye,
                                        'tgl_mulai'=>$tgl_mulai,
                                        'tgl_selesai'=>$tgl_selesai,
                                        //'foto_kampanye'=>$foto_kampanye,
                                        'lokasi'=>$lokasi,
                                        'dana_terkumpul'=>$dana_terkumpul,
                                        'target_donasi'=>$target_donasi,
                                        'deskripsi'=>$deskripsi
                                        );
                $this->model_kampanye->edit($data,$id);
                redirect('Kampanye');
            //} else{
                // if ($this->upload->do_upload('foto_kampanye')) {
                //     $upload = $this->upload->data();
                //     $foto_kampanye = 'assets/images/foto/' . $upload['file_name'];
                    // $data = array('id_kampanye' => $id,
                    //     'id_kategori' => $id_kategori,
                    //     'nama_kampanye' => $nama_kampanye,
                    //     'tgl_mulai' => $tgl_mulai,
                    //     'tgl_selesai' => $tgl_selesai,
                    //     //'foto_kampanye' => $foto_kampanye,
                    //     'lokasi' => $lokasi,
                    //     'dana_terkumpul' => $dana_terkumpul,
                    //     'target_donasi' => $target_donasi,
                    //     'deskripsi' => $deskripsi
                    //);
                    $this->model_kampanye->edit($data, $id);
                    redirect('Kampanye');
            //     }
            //     $error = array('error'=>$this->upload->display_errors());
            //     echo $error['error'];
            // }
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_kampanye->get_one($id)->row_array();
            $data['kategori'] = $this->model_kategori->tampil_data();

            $this->template->load('template','kampanye/update_data',$data);
        }


    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_kampanye->delete($id);
        redirect('Kampanye');
    }

    function laporan()
    {
//        $pengguna = $this->model_pengguna->get_one($key->id_pengguna)->row_array();

        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image(base_url().'assets/images/foto/logolazchev.png', 25,23,35,18);$pdf->setY(20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',16);
        // mencetak string
        $pdf->setX(25);$pdf->Cell(190,10,'LAPORAN HASIL PENGGALANGAN DANA',0,1,'C');
        $pdf->SetFont('Times','B',12);
        $pdf->setX(22);$pdf->Cell(190,7,'Daftar Kampanye',0,1,'C');
        $pdf->SetFont('Times','B',10);
        $pdf->setX(22);$pdf->Cell(190,7,'LAZNas Chevron Rumbai',0,1,'C');

        $data=$this->model_kampanye->tampil_data();
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','B',10);
        $pdf->setX(25);$pdf->Cell(7,6,'No',1,0); //7 itu panjang cell, 6 itu tinggi cell
        $pdf->Cell(60,6,'Nama Kampanye',1,0); //60 itu panjang cell, 6 itu tinggi cell
        $pdf->Cell(30,6,'Tanggal Mulai',1,0); //30 itu panjang cell, 6 itu tinggi cell
        $pdf->Cell(30,6,'Tanggal Selesai',1,0);
        //$pdf->Cell(30,6,'Lokasi',1,0);
        $pdf->Cell(29,6,'Dana Terkumpul',1,1);
        $pdf->SetFont('Times','',10);
        $no = 1;
        foreach($data->result()as $row){
            $pdf->setX(25);$pdf->Cell(7,6,$no++,1,0); //7 itu panjang cell, 6 itu tinggi cell
            $pdf->Cell(60,6,$row->nama_kampanye,1,0);
            $pdf->Cell(30,6,date_indo($row->tgl_mulai),1,0);
            $pdf->Cell(30,6,date_indo($row->tgl_selesai),1,0);
            //$pdf->Cell(30,6,$row->lokasi,1,0);
            $pdf->Cell(29,6,"Rp  ".nominal($row->dana_terkumpul),1,1);
        }
//        $pdf->Ln();
//        $pdf->setX(200);$pdf->Cell(10,6,'No',0,0);
        $pdf->Output();
    }
    function laporanDonatur(){
        $id_kampanye = $this->uri->segment(3);
        $kampanye = $this->model_kampanye->get_one($id_kampanye)->row_array();
        $donatur = $this->model_donatur->listDonatur($id_kampanye);

        $pdf = new FPDF('p','mm','A4');

        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image(base_url().'assets/images/foto/logolazchev.png', 25,23,35,18);$pdf->setY(20);
        $pdf->SetFont('Times','B',16);
        // mencetak string
        $pdf->setX(25);$pdf->Cell(190,10,'LAPORAN HASIL PENGGALANGAN DANA',0,1,'C');
        $pdf->SetFont('Times','B',12);
        $pdf->setX(22);$pdf->Cell(190,7,'Daftar Donatur',0,1,'C');
        $pdf->SetFont('Times','B',12);
        $pdf->setX(22);$pdf->Cell(190,7,'"'.$kampanye['nama_kampanye'].'"',0,1,'C');
        $pdf->SetFont('Times','B',10);
        $pdf->setX(22);$pdf->Cell(190,7,'LAZNas Chevron Rumbai',0,1,'C');
        $pdf->Ln();


        $pdf->SetFont('Times','B',10);
        $pdf->setX(30);$pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(35,6,'Nama Donatur',1,0);
        $pdf->Cell(25,6,'Asal Bank',1,0);
        $pdf->Cell(25,6,'Tujuan Bank',1,0);
        $pdf->Cell(30,6,'Tanggal Transfer',1,0);
        $pdf->Cell(25,6,'Jumlah Donasi',1,1);
        $pdf->SetFont('Times','',10);
        $no = 1;
        foreach ($donatur->result() as $row){
            $pengguna = $this->model_pengguna->get_one($row->id_pengguna)->row_array();
            $bank = $this->model_bank->get_one($row->id_bank)->row_array();

            $pdf->setX(30);$pdf->Cell(10,6,$no++,1,0);

            $pdf->Cell(35,6,$pengguna['nama'],1,0);
            $pdf->Cell(25,6,$row->bank_asal,1,0);
            $pdf->Cell(25,6,$bank['nama_bank'],1,0);
            $pdf->Cell(30,6,date_indo($row->tgl_bayar),1,0);
            $pdf->Cell(25,6,"Rp ".nominal($row->jum_transfer+$row->id_donatur),1,1);
        }

        $pdf->Output();
    }

}



  ?>
