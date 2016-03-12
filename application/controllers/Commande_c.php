<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commande_c extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Produit_m','Users_m','Panier_m','Commande_m'));
    }

    public function creerCommande(){

        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');

        $newCmd = $this->Commande_m->getValuesForCmd();
      //  $newPrix = $this->Panier_m->multiplyForSum();
       //$newCmd['prix'] = $newPrix['totalLigne'];
       // var_dump($newCmd['prix']);
        $newCmd['prix']=35;
        $idCmd=$this->Commande_m->createCmd($newCmd);
        var_dump($idCmd);
        $this->modifierIdCommande($idCmd);
       // $this->Panier_m->deletePanier($idCmd);
        redirect('Commande_c/afficherCommandeATraiter');
    }

    /*public function creerCommande(){
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');

        $newCmd = $this->Commande_m->getValuesForCmd();
        var_dump($newCmd);
        $cmd['id_commande']=$this->Commande_m->createCmd($newCmd);

        $this->load->view('admin/produit/form_create_produit_v',$cmd);
        $this->load->view('foot_v');
    }*/
    public function modifierIdCommande($id=''){
        $getPanier=$this->Panier_m->getAllOrders($this->session->userdata('id_user'));
        $donnees= array(
            'id_commande' => $id
        );

        foreach($getPanier as $value){
            $this->Panier_m->updatePanier($value->id_panier, $donnees);
        }
    }

   public function afficherCommande(){
       $this->load->view('head_v');
       $this->load->view('admin/navAdmin_v');

       if($this->session->userdata('droit')<3){
           $commande['commande']= $this->Commande_m->getAllCmd();
           $newPrix['newPrix'] = $this->Panier_m->multiplyForSum();
       }else {
          var_dump("wait");
           //$etatCmd= $this->Commande_m->getEtatCmdDropdown();
       }
      //  var_dump($etatCmd);
       $this->load->view('admin/commande/commande_v',$commande);
       $this->load->view('foot_v');
   }
//vendeur
    public function afficherCommandeATraiter(){
        $this->load->view('head_v');
      //  $this->load->view('admin/navAdmin_v');
      //  $commande['commande']= $this->Commande_m->showCmdNonTraite();
        //  var_dump($etatCmd);

        //si user == client
        if($this->session->userdata('droit')<2){

            $this->load->view('clients/navClient_v');
            $commande['commande']= $this->Commande_m->getCmdById($this->session->userdata('id_user'));
           // var_dump($commande);
            $this->load->view('clients/commande/afficherCmd_v',$commande);
        }//si user == admin ou vendeur
        else {
            $this->load->view('admin/navAdmin_v');
            $commande['commande']= $this->Commande_m->showCmdNonTraite();
            $this->load->view('admin/commande/commande_aTraiter_v', $commande);
        }
        $this->load->view('foot_v');
    }


}