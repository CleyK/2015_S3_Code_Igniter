<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="row">
    <table>
        <caption>Liste des commandes à traiter</caption>
        <thead>
        <tr><th>id commande</th><th>produit</th><th>prix</th><th>etat de la commande</th><th>operation</th>
        </tr>
        </thead>
        <tbody>
        <?php  // print_r($commande);?>

        <?php if($commande != NULL): ?>
            <?php foreach ($commande as $value): ?>
                <tr><td>
                        <?= $value->id_commande; ?>
                    </td>

                    <td>
                        <?= $value->nom; ?>
                    </td><td>
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
                    </td><td>
                        <a href="<?php echo base_url();?>index.php/Admin_c/prepareCmd/<?=$value->id_commande?> "> Preparer la commande </a> <br>
                        <a href="<?php echo base_url();?>index.php/Admin_c/valideCmd/<?=$value->id_commande?> ">Valider la commande </a>
                       </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tbody>
    </table>
</div>
