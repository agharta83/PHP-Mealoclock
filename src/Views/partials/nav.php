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

                <form action="" class="search-form form-inline p-2 mr-auto">
                    <input type="search" placeholder="Search" class="search-input form-control ">
                    <button class="search-submit btn" type="Search"><i class="fas fa-search"></i></button>
                </form>

                <ul class="navbar-nav justify-content-between">
                    <li class="nav-item px-5"><a href="<?=$router->generate('home')?>">Communautés</a></li>
                    <li class="nav-item px-5"><a href="<?=$router->generate('event_list')?>">Evènements</a></li>
                    <li class="nav-item px-5"><a href="#">Lorem</a></li>
                    <li class="nav-item px-5"><a href="#">Lorem</a></li>
                </ul>
                    
                <ul  class="navbar-nav ml-auto">
                    <li class="login nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-sign-in-alt"></i>
                            Connexion
                        </a>
                    </li>
                    <li class="signup nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-edit"></i>
                            Inscription
                        </a>
                    </li>
                </ul>
                        
            </div>
        </nav>