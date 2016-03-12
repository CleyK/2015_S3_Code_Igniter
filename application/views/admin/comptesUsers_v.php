<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="row">
     <table>
        <caption>Liste des utilisateurs</caption>
        <thead>
        <tr><th>id</th><th>email</th><th>login</th><th>password</th>
            <th>nom</th><th>code postal</th><th>ville</th><th>adresse</th><th>etat</th>

            <th>opération</th>
        </tr>
        </thead>
        <tbody>
        <?php  // print_r($produit);?>
        <?php if($users != NULL): ?>
            <?php foreach ($users as $value): ?>
                <tr><td>
                        <?php echo $value->id_user; ?>
                    </td><td>
                        <?= $value->email; ?>
                    </td><td>
                        <?= $value->login; ?>
                    </td><td>
                        <?= $value->password; ?>
                        </td><td>
                        <?= $value->nom; ?>
                    </td><td>
                        <?= $value->code_postal; ?>
                    </td><td>
                        <?= $value->ville; ?>
                    </td>
                    <td>
                        <?= $value->adresse; ?>
                    </td>
                 <!--   <td>
                        <?= $value->etat; ?>
                    </td>-->
                    <?php //if(isset($_SESSION['droit']) and $_SESSION['droit']=='DROITadmin'): ?>
                    <td>
                   <!--     <a href="<?php echo base_url();?>index.php/Produit_c/modifierProduit/<?= $value->id; ?>">modifier</a>-
                        <a href="<?php echo site_url("Produit_c/supprimerProduit")."/".$value->id; ?>">supprimer</a>-->
                    </td>
                    <?php //endif;?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tbody>
    </table>
</div>


<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
