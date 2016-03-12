<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="row">
    <table>
        <caption>Liste des produits</caption>
        <thead>
        <tr><th>id</th><th>type</th><th>nom</th><th>prix</th><th>photo</th><th>stock</th>

            <th>opération</th>
        </tr>
        </thead>
        <tbody>
        <?php  // print_r($produit);?>
        <?php if( $produit != NULL): ?>
            <?php foreach ($produit as $value): ?>
                <tr><td>
                        <?php echo $value->id; ?>
                    </td><td>
                        <?= $value->libelle; ?>
                    </td><td>
                        <?= $value->nom; ?>
                    </td><td>
                        <?= $value->prix; ?>
                    </td><td>
                        <!--<?= $value->photo; ?>-->
                        <img style="width:60px;height:60px" src="<?php echo base_url();?>/assets/img/<?= $value->photo; ?>" alt="image de <?= $value->libelle; ?>" >
                    </td><td>
                        <?= $value->stock; ?>
                    </td>
                    <?php //if(isset($_SESSION['droit']) and $_SESSION['droit']=='DROITadmin'): ?>
                    <td>
                        <a href="<?php echo site_url('Panier_c/ajouterAuPanier');?>/<?= $value->id ?>">Ajouter au panier</a>

                    </td>
                    <?php //endif;?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tbody>
    </table>
</div>


<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
