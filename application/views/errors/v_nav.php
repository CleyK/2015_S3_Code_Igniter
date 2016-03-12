<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1> <a href="">TP web</a></h1>
        </li>
        <li class="toggle-topbar menu-icon">
            <a href="#"><span>Menu</span></a>
        </li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li class="divider"></li>
            <li class="active"><a href="#">stock</a></li>
            <li class="divider"></li>
            <li class="has-dropdown"><a href="#">produit</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url();?>index.php/Produit/creerProduit"> créer un produit </a></li>
                    <li><a class="SousMenu" href="" >afficher/editer/supprimer les produits</a></li>
                </ul>
            </li>
        </ul>
        <ul class="right">
            <li><a href="#">se deconnecter</a></li>
        </ul>
    </section>
</nav>
