 <?php
    defined('BASEPATH') or exit('No direct script access allowed');


    class Akses extends CI_Controller
    {
        private $cek_akses_user;
        public function __construct()
        {
            parent::__construct();
            cek_aktif_login();
            $this->cek_akses_user = cek_akses_user();
            $this->load->model('Akses_m','Data_model')
        }

        public function index()
        {

            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();

            $this->load->view('templates/header-top');
            //css for this page only

            //======== end
            $this->load->view('templates/header-bottom');
            $this->load->view('templates/header-notif');
            $this->load->view('templates/main-navigation', $data);

            $data['list_level_user'] = $this->Data_model->list_data();
            $this->load->view('akses_v', $data);

            $this->load->view('templates/footer-top');
            // js for this page only

            //========= end
            $this->load->view('templates/footer-bottom');
        }
        public function tambah()
        {
            if ($this->cek_akses_user['tambah'] != '1') {
                redirect(base_url('unauthorized'));
            }
        }
    }
