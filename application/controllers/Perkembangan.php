<?php
class Perkembangan extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_perkembangan');
        $this->load->model('model_kampanye');
        $this->load->helper('tgl_indo');
    }

    function index(){
        
        $data['record'] = $this->model_perkembangan->tampil_data();
        $data['kampanye'] = $this->model_perkembangan->tampil_kampanye();
        $this->template->load('template','perkembangan/lihat_data',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])){
            $id  	 = $this->input->post('id_perkembangan');
            $id_kampanye    = $this->input->post('id_kampanye');
            $judul = $this->input->post('judul');
            //$foto_perk = $this->input->post('foto_perk');
            $isi = $this->input->post('isi');
            $date = date('Y-m-d');//get tanggal terkini
            $time = 5 + date('H');//get jam terkini
            $sec = date('i:s');//get detik dan menit terkini
            $jam = $time . ":" . $sec;//jumlahkan untuk time indonesia
            // $config['upload_path'] = './assets/images/foto';
            // $config['allowed_types'] = 'jpg|png|jpeg';
            // $config['max_size']     = '2500';
            // $config['max_width'] = '3500';
            // $config['max_height'] = '3500';
            // $this->upload->initialize($config);
            // if ($this->upload->do_upload('foto_perk')){
            //     $upload = $this->upload->data();
            //     $foto_perk = 'assets/images/foto/'.$upload['file_name'];
                $data           = array('id_perkembangan'=>$id,
                    'id_kampanye'=>$id_kampanye,
                    'judul'=>$judul,
                    'foto_perk'=>$foto_perk,
                    'isi'=>$isi,
                    'tgl_posting'=>$date
                                        );
                $this->model_perkembangan->post($data);
                redirect('perkembangan');
            // }else{
            //     $error = array('error'=>$this->upload->display_errors());
            //     //$this->load->view('lihat_data', $error);
            //     echo $error['error'];
            // }

        }
        else{
            $this->load->model('model_kampanye');
            $data['nama_kampanye']= $this->model_kampanye->tampil_data()->result();
            $this->template->load('template','perkembangan/lihat_data',$data);
        }
    }
    function edit()
    {
        if(isset($_POST['submit'])){
            $id  	 = $this->uri->segment(3);
            $id_kampanye    = $this->input->post('id_kampanye');
            $judul = $this->input->post('judul');
            //$foto_perk = $this->input->post('foto_perk');
            $isi = $this->input->post('isi');
            $date = date('Y-m-d');//get tanggal terkini
            // $config['upload_path'] = './assets/images/foto'; //path folder
            // $config['allowed_types'] = 'jpg|png|jpeg'; //type image yang diizinkan
            // $config['max_size']     = '2500';
            // $config['max_width'] = '3500';
            // $config['max_height'] = '3500';
            // $this->upload->initialize($config);
            // if ($this->upload->do_upload('foto_perk')){
            //     $upload = $this->upload->data();
            //     $foto_perk = 'assets/images/foto/'.$upload['file_name'];
                $data           = array('id_perkembangan'=>$id,
                                        'id_kampanye'=>$id_kampanye,
                                        'judul'=>$judul,
                                        'foto_perk'=>$foto_perk,
                                        'isi'=>$isi
                                        );
                $this->model_perkembangan->edit($data,$id);
                redirect('perkembangan');
            // } else{
            //     if ($this->upload->do_upload('foto_perk')) {
            //         $data = array('id_perkembangan' => $id,
            //             'id_kampanye' => $id_kampanye,
            //             'judul' => $judul,
            //             'foto_perk' => $foto_perk,
            //             'isi' => $isi
            //         );
                    $this->model_perkembangan->edit($data, $id);
                    redirect('perkembangan');
            //     }
            //     $error = array('error'=>$this->upload->display_errors());
            //     echo $error['error'];
            // }
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_perkembangan->get_one($id)->row_array();
            $data['kampanye'] = $this->model_kampanye->tampil_data();

            $this->template->load('template','perkembangan/update_data',$data);
        }


    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_perkembangan->delete($id);
        redirect('Perkembangan');
    }
}
   


  ?>
