<?php

namespace App\Controllers;

class ISObjectivesController extends BaseController
{
    public function index()
    {
        echo view('layout/header');
        echo view('Planning/ISObjective');
    }

}
