<div class="title text-center p-3 col-12">
            <a href="<?=$router->generate('home')?>">
                <img src="<?=$basePath?>/public/images/title.svg" alt="Mealoclock">
            </a>
        </div>
        <!-- Menu -->
        <nav class="menu navbar-expand-md navbar-light bg-light p-1">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex jus" id="navbarToggler">

                <div class="search-form form-inline p-2 mr-auto">
                    <input type="text" placeholder="Search" class="search-input form-control" id="search">
                    <button class="search-submit btn" type="Search"><i class="fas fa-search"></i></button>
                </div>

                <!-- Liste de résultats -->
                <div class="search-results">
                    <ul class="list-group">
                        <!--<li class="list-group-item">Event 1</li>
                        <li class="list-group-item">Event 2</li>
                        <li class="list-group-item">Event 3</li>-->
                    </ul>
                </div>


                <ul class="navbar-nav justify-content-between">
                    <li class="nav-item px-5"><a href="<?=$router->generate('home')?>">Communautés</a></li>
                    <li class="nav-item px-5"><a href="<?=$router->generate('event_list')?>">Evènements</a></li>
                    <li class="nav-item px-5"><a href="<?=$router->generate('member_list')?>">Membres</a></li>
                    <li class="nav-item px-5"><a href="#">Lorem</a></li>
                </ul>

                <ul  class="navbar-nav ml-auto">
                    <?php if($user): ?>
                        <!-- Je suis connecté -->
                        <li class="login nav-item">
                            <a href="<?=$router->generate('profile')?>" class="nav-link">
                                
                                Mon profil
                            </a>
                        </li>
                        <li class="login nav-item">
                            <a href="<?=$router->generate('logout')?>" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i>
                                Déconnexion
                            </a>
                        </li>
                    <?php else: ?>
                        <!-- Je suis déconnecté -->
                        <li class="login nav-item">
                            <a href="<?=$router->generate('login')?>" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i>
                                Connexion
                            </a>
                        </li>
                        <li class="signup nav-item">
                            <a href="<?=$router->generate('signup')?>" class="nav-link">
                                <i class="fas fa-edit"></i>
                                Inscription
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                        
            </div>
        </nav>