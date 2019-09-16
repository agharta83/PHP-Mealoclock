<?php $this->layout('layout') ?>

<div class="container">
    <div class="row mb-5">
        <div class="col-12 col-md-8 m-auto area">
            <h2 class="text-center">Connexion</h2>

            <div class="errors">
                <?php foreach($errors as $error): ?>
                    <div class="alert alert-danger">
                        <?=$error?>
                    </div>
                <?php endforeach; ?>
            </div>

            <form action="<?=$router->generate('login')?>" method="post" id="login">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" value="<?=($fields['email'] ?? '')?>" placeholder="jon@snow.com">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password" value="" placeholder="azerty">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>