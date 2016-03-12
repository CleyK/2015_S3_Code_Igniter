<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Commande_m extends CI_Model
{
/*
 * creer cmd avec tous les articles du panier o� l'id == null
 * calculer le prix total
 * changer l'id des produits de la cmd avc le dernier id ajout� (fonctions � rechercher)
 * (penser � g�rer les stocks) -->PAS FAIT
 */
    public function createCmd($newCmd){
        $this->db->insert("commande",$newCmd);
        return $this->db->insert_id();
    }

    public function getValuesForCmd(){
        $values = $this->Panier_m->getAllOrders($this->session->userdata('id_user'));



        $valuesCmd  = array(
            'id_commande' =>"NULL",
            'id_user' => $this->session->userdata('id_user'),
            'id_lieu' => 1,
            'prix' => 10,
            'date_achat' => date("y.m.d"),
            'id_etat' => 3
        );
        //
        //update $this->db->update("panier",
        return $valuesCmd;
    }

    public function getAllCmd(){
        $this->db->select('c.id_commande,u.login, c.prix, e.libelle');
        $this->db->from('commande c');
        $this->db->join('user u', 'c.id_user=u.id_user');
        $this->db->join('etat e', 'c.id_etat=e.id_etat');

        $query =$this->db->get();
        return $query->result();
    }

    public function getCmdById($id){

        $this->db->select('c.id_user, p.nom, c.id_commande, u.login, c.prix, e.libelle');
        $this->db->from('commande c');
        $this->db->join('user u', 'c.id_user=u.id_user');
        $this->db->join('etat e', 'c.id_etat = e.id_etat');
        $this->db->join('panier pan', 'c.id_commande = pan.id_commande');
        $this->db->join('produit p', 'pan.id_produit = p.id');
       $this->db->where('c.id_user',$id);
        $query = $this->db->get();
        return $query->result();
    }


//affichage pour le vendeur
    public function showCmdNonTraite(){
        $this->db->select('c.id_commande, p.nom, c.prix, e.id_etat, e.libelle');
        $this->db->from('commande c');
        $this->db->join('panier pan', 'c.id_commande=pan.id_commande');
        $this->db->join('etat e', 'c.id_etat=e.id_etat');
        $this->db->join('user u', 'c.id_user=u.id_user');
        $this->db->join('produit p', 'pan.id_produit=p.id');
        $this->db->where('e.id_etat',3);
      // $this->db->where('e.id_etat',1);

        $query =$this->db->get();
        return $query->result();

    }

 //affichage pour le client
    public function showUserCmd($id_user){
        $this->db->select('commande.id_commande');
        $this->db->from('commande');
        $this->db->where('comande.id_user', $id_user);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateCmd($id,$donnees){
        $this->db->where("id_commande", $id);
        $this->db->update("commande", $donnees);
    }

}

