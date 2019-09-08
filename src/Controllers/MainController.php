<?php
namespace MealOclock\Controllers;

class MainController extends CoreController {
    public function home() {
        // Render a template
        echo $this->templates->render( 'main/home' );
    }

    public function cgu() {
        // Render a template
        echo $this->templates->render( 'main/cgu' );
    }
}
