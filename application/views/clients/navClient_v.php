

<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area"> 
      <li class="name"> 
        <h1><a href="">Espace Membre</a> </h1> 
      </li> 
      <li class="toggle-topbar menu-icon">
       <a href="#"><span>Menu</span></a></li>
    </ul> 

    <section class="top-bar-section"> 
    <ul class="left">
    <li><a href="<?php echo site_url('Produit_c/afficherProduit');?>">Passer ma commande pour cette semaine</a></li>
    <li><a href="<?php echo site_url('Commande_c/afficherCommandeATraiter');?>">Consulter mes commandes</a></li>
    <li><a href="<?php echo site_url('User_c/modifierDonnees');?>/<?= $this->session->userdata('id_user')?>">Modifier mes coordonnées</a></li>
        <li><a href="<?php echo site_url('Panier_c/afficherPanier');?>/<?= $this->session->userdata('id_user')?>">Consulter mon panier</a></li>
    </ul>
    
    <ul class="right"> 
    <li>Bonjour <?= $this->session->userdata('login')?><li>
    <li><a href="<?php echo site_url('users_c/deconnexion');?>">se deconnecter</a></li> 
    </ul> 
    </section> 
</nav>