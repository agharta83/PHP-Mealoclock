<?php
namespace MealOclock\Controllers;

class MainController extends CoreController {
    public function home() {

        $headTitle = 'Le super titre !';

        // Render a template
        echo $this->templates->render( 'main/home', [ 'title' => $headTitle ] );
        
    }

    public function cgu() {
        // Render a template
        echo $this->templates->render( 'main/cgu', ['title' => 'CGU'] );
        
    }

    public function mentions() {
        echo $this->templates->render( 'main/home', ['title' => 'Mentions !']);
    }
}
