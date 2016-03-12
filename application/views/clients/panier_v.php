<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="row">
    <table>
        <caption>Contenu du panier</caption>
        <thead>
        <tr><th>nom du produit</th> <th>-</th> <th>quantité</th> <th>+</th> <th>prix</th> <th>photo</th> <th>date d'ajout</th>

            <th>opération</th>
        </tr>
        </thead>
        <tbody>
        <!-- <?php   print_r($produit);?> -->
        <?php if( $produit != NULL): ?>
            <?php foreach ($produit as $value): ?>
                <tr><td>
                        <?= $value->nom; ?>
                    </td><td>
                        <a href="<?php echo site_url('Panier_c/modifierPanierMoins/');?>/<?=$value->id_panier;?>"> - </a>
                    </td><td>
                        <?= $value->quantite; ?>

                    </td><td>
                        <a href="<?php echo site_url('Panier_c/modifierPanierPlus/');?>/<?=$value->id_panier;?>"> + </a>
                    </td><td>
                        <?= $value->prix; ?>
                    </td><td>
                        <!--<?= $value->photo; ?>-->
                        <img style="width:60px;height:60px" src="<?php echo base_url();?>/assets/img/<?= $value->photo; ?>" alt="image de <?= $value->nom; ?>" >
                    </td><td>
                        <?= $value->dateAjoutPanier ; ?>

                    </td>
                    <?php //if(isset($_SESSION['droit']) and $_SESSION['droit']=='DROITadmin'): ?>
                    <td>

                        <a href="<?php echo site_url('Panier_c/supprimerDuPanier');?>/<?= $this->session->userdata('id_user')?>/<?= $value->id_produit ?>" onclick="return confirm('Supprimer ce produit du panier ?')" >Supprimer</a>
                    </td>
                    <?php //endif;?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <a href="<?php echo site_url('Commande_c/creerCommande');?>/<?= $this->session->userdata('user_data')?>" onclick=" return confirm('Confirmer la commande ?')" > Confirmer</a>

        <tbody>
    </table>
</div>


<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
