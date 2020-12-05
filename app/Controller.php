<?php 

namespace App;
use Selvi\Controller as SelviController;
use Selvi\Firebase\Pengguna;

class Controller extends SelviController{

    function validateToken() {
        Pengguna::validateToken();
    }

    function validatePengguna() {
        Pengguna::validatePengguna();
    }

}