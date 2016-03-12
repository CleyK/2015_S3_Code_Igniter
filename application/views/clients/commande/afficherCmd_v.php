<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="row">
    <table>
        <caption>Liste de vos commandes</caption>
        <thead>
        <tr><th>id commande</th><th>produit</th><th>prix</th><th>etat de la commande</th>
        </tr>
        </thead>
        <tbody>
        <?php  // print_r($commande);?>

        <?php if($commande != NULL): ?>
            <?php foreach ($commande as $value): ?>
                <tr><td>
                        <?= $value->id_commande; ?>
                    </td><td>
                        <?= $value->nom; ?>
                    </td><td>
                        <!--prix*quantite-->
                        <?= $value->prix; ?>
                    </td><td><?= $value->libelle; ?>
                        <!--dropdown  -->
                        <?php//var_dump($etatCmd); ?>

                        <!-- <select name="id_etat">
                            <?php foreach($etatCmd  as $key=>$value) : ?>
                                <option value="<?php echo $key; ?>"
                                    <?php if(isset($etatCmd['id_etat'])  and $etatCmd['id_etat']==$key): ?> selected="selected" <?php endif; ?> >
                                    <?php echo $value; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('id_etat');?> <!--id_type-->

                        <?php //endif;?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tbody>
    </table>
</div>
