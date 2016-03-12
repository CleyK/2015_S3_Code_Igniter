<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Panier_m extends CI_Model
{
    public function getAllOrders($id){
        $this->db->select('pan.id_produit, pan.id_panier, p.nom, pan.quantite, pan.prix,p.photo, pan.dateAjoutPanier');
        $this->db->from('produit p');
        $this->db->join('panier pan', 'p.id=pan.id_produit');
        $this->db->where('pan.id_user',$id);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * @param $idpanier
     * @return the basket of the current client
     */
    public function getPanierById($idpanier){
        return $this->db->get_where('panier', array('id_panier' => $idpanier),1,0)->row_array();
    }


    /**
     * @param $idProduit
     * @return line indicated with id_product for a specific client
     */
    public function getIdProduitById($idProduit){
        return $this->db->get_where('panier', array('id_produit' => $idProduit, 'id_user' => $this->session->userdata('id_user')),1,0)->row_array();
    }

    public function deleteFromPanier($id_user, $id_prod){
        $valuesToDelete = array(
            "id_produit" => $id_prod,
            "id_user" => $id_user
        );
        $this->db->delete("panier", $valuesToDelete);
    }

    public function addToPanier($id_prod, $donnees){

            $nouvellesDonnees = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_produit' => $donnees['id'],
            'quantite' => 1,
            'prix' => $donnees['prix'],
            'id_commande' => null,
            'dateAjoutPanier' => 'CURDATE()'
        );
        return $this->db->insert("panier",$nouvellesDonnees);
    }

    //ATT: CA EFFACE AUSSI LA CMD DANS L'AFFICHAGE
    // ==> A cause de la clé étrangère entre panier et commande
    public function deletePanier($idCmd){
        return $this->db->delete("panier",array('id_commande'=>$idCmd));
    }
    function updatePanier($id, $donnees) {
        $this->db->where("id_panier", $id);
        $this->db->update("panier", $donnees);
    }


    //NON FONCTIONNEL
    public function multiplyForSum($idCmd){
        //INDIVUDUELLEMENT: OK
        $this->db->select('p.id_commande, p.quantite, p.prix, p.quantite*p.prix as totalLigne');
        $this->db->from('panier p');
        $this->db->join('user u', 'u.id_user=p.id_user');
        $this->db->join('produit prod','prod.id=p.id_produit' );
        $this->db->where('p.id_commande', $idCmd);
       /* $select = "select p.id_commande, p.quantite, p.prix, p.quantite* p.prix as totalLigne FROM panier p join user u on u.id_user=p.id_user join produit pr on pr.id=p.id_produit WHERE p.id_commande='.$idCmd.'";*/

        //$query = $this->db->query($select);
        $query = $this->db->get();
        return $query->result();
    }
    public function sumPanier($idCmd){
              $donnees = $this->getAllOrders($this->session->userdata('id_user'));
       var_dump($donnees);
        $sum = 0;
        foreach($donnees as $facteur){
            $sum = $sum + $facteur['quantite'] * $facteur['prix'];
        }
        var_dump($sum);
        return $sum;
    }
}
