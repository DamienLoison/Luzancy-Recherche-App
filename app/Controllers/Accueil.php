<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Accueil extends BaseController {

    protected $session;

    public function index() {
        echo view('Accueil');
    }

    public function note_patch() {
        echo view('Patch/NotePatch');
    }

    public function architecture_site() {
        echo view('pages/Architecture');
    }

    public function aide() {
        echo view('Aide');
    }

    public function me_contacter() {
        echo view('template/header');
        echo view('Reste/Contacter');
        echo view('template/footer');
    }

}
