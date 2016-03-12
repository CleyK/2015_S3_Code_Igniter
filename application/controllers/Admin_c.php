<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model('Commande_m');
        $this->load->model('Users_m');
    }
    public function index()
    {
        if($this->session->userdata('droit')!=2){
            redirect('Users_c');
        }
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');  
        $donnees['titre']="gestion des clients et des commandes";
        $this->load->view('admin/admin_index',$donnees);
        $this->load->view('foot_v');
    }

    function check_droit(){
        if( $this->session->userdata('droit')!=2){
            redirect('Users_c');
        }
    }

    public function afficheUsers()
    {   $this->check_droit();
        if($this->session->userdata('droit')>2){
            redirect('Users_c');
        }
        $this->load->view('head_v');
        $this->load->view('admin/navAdmin_v');
       // $donnees['titre']="gestion des clients et des commandes";
        $users['users'] = $this->Users_m->getAllUsers();
        //var_dump($users['users']);
        $this->load->view('admin/comptesUsers_v',$users);
        $this->load->view('foot_v');
    }

    public function valideCmd($id=''){
        $this->check_droit();
        $donnees=array(
            'id_etat'=>2
        );
        $this->Commande_m->updateCmd($id,$donnees);
        redirect('Commande_c/afficherCommandeATraiter');
    }

    public function prepareCmd($id=''){
        $this->check_droit();
        $donnees=array(
            'id_etat'=>1
        );
        $this->Commande_m->updateCmd($id,$donnees);
        redirect('Commande_c/afficherCommandeATraiter');
    }


}