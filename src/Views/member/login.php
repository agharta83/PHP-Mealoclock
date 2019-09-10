<?php $this->layout('layout') ?>

<div class="container">
    <div class="row mb-5">
        <div class="col-12 col-md-8 m-auto area">
            <h2 class="text-center">Connexion</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="" placeholder="jon@snow.com">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" value="" placeholder="azerty">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>