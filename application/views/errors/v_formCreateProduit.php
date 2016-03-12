<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><form method="post" action="">
    <div class="row">
        <fieldset>
            <legend>Ajouter un produit</legend>
            <label>Nom
                <input name="nom"  type="text"  size="18"  value=""/>
            </label>
            <label>Prix
                <input name="prix"  type="text"  size="18"  value=""/>
            </label>
            <label>type
                <input name="id_type"  type="text"  size="18"  value=""/>

            </label>
            <label>Photo
                <input name="photo"  type="text"  size="18"  value=""/>
            </label>
            <input type="submit" name="ajouterProduit" value="Creer" />

        </fieldset>
    </div>
</form>