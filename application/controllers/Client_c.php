<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_c extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model('Users_m');
        $this->load->model('Produit_m');
        $this->load->model('Panier_m');

    }
    public function index()
    {
        if($this->session->userdata('droit')!=1){
            redirect('Users_c');
        }
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $donnees['titre']="affichage des produits";
        $this->load->view('clients/client_index', $donnees);
        $this->load->view('foot_v');
    }

  /*  public function afficherPanier($id=''){

    }*/
}