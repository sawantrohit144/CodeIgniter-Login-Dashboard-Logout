<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    public function index()
    {
        // Your dashboard logic here
        return view('dash');
    }
}
