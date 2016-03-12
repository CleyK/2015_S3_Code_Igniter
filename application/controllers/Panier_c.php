<?php

class Panier_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Produit_m','Users_m','Panier_m'));
    }

    public function afficherPanier($id){

        if($this->session->userdata('droit')!=1){
            redirect('users_c');
        }
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $produit['produit']=$this->Panier_m->getAllOrders($id);
       /* if(isset($this->session->$_GET['op'])&&  isset($this->session->$_GET['op'])){
            $produit['produit']=$this->Panier_m->updateQuantity($id);
        }*/
        $this->load->view('clients/panier_v', $produit);


        $this->load->view('foot_v');
    }

    public function supprimerDuPanier($id_user, $id_prod){
            if(is_numeric($id_user) && is_numeric($id_prod))
                $this->Panier_m->deleteFromPanier($id_user, $id_prod);
            redirect ('/Panier_c/afficherPanier/'.$this->session->userdata('id_user'));

        }

    public function modifierPanierPlus($id_panier){
        $panier = $this->Panier_m->getPanierById($id_panier);
        $produit = $this->Produit_m->getProduitById($panier['id_produit']);

        if(isset($panier['id_panier']) && $produit['stock']!=0){


            $donnees = array('quantite' => $panier['quantite'] + 1,
                'prix'=>$produit['prix']+$panier['prix']);
            $this->Panier_m->updatePanier($id_panier, $donnees);
        }
        else if($produit['stock']>=1) {

            $donnees = array('quantite' => $panier['quantite'] + 1,
                'prix'=>$produit['prix']+$panier['prix']);
            $this->Panier_m->updatePanier($id_panier, $donnees);
         /*   $donnees = array('stock'=>$produit['stock']-1);
            $this->Produit_m->updateProduit($panier['id_produit'],$donnees);*/
        }else{
            //afficher message erreur
        }

        redirect('Panier_c/afficherPanier/'.$this->session->userdata('id_user'));
    }

    public function modifierPanierMoins($id_panier){
        $panier = $this->Panier_m->getPanierById($id_panier);
        $produit = $this->Produit_m->getProduitById($panier['id_produit']);

        if($produit['stock']>=1) {
            $donnees = array('quantite' => $panier['quantite'] - 1,
                'prix'=>abs($produit['prix']-$panier['prix']));
            $this->Panier_m->updatePanier($id_panier, $donnees);
          /*  $donnees = array('stock'=>$produit['stock']+1);
            $this->Produit_m->updateProduit($panier['id_produit'],$donnees);*/
        }else{
            //afficher message erreur
        }
        redirect('Panier_c/afficherPanier/'.$this->session->userdata('id_user'));
    }

    public function ajouterAuPanier($id){
//$id = id produit
        if($this->session->userdata('droit')!=1){
            redirect('users_c');
        }
        if(is_numeric($id)){

            $donnees=$this->Produit_m->getProduitById($id);

//partie pour ajouter la quantité si existe déjà
            $getIdFromPanier = $this->Panier_m->getIdProduitById($id);

            if(isset($getIdFromPanier['id_produit'])==$id && $donnees['stock']!=0){
                $donnees = array('quantite' => $getIdFromPanier['quantite'] + 1,
                    'prix'=>$donnees['prix']+$getIdFromPanier['prix']);

               // var_dump($donnees);

                $this->Panier_m->updatePanier($getIdFromPanier['id_panier'], $donnees);
            }else {

                $this->Panier_m->addToPanier($id, $donnees);
            }
        }
        redirect('/Produit_c/afficherProduit');
    }
}