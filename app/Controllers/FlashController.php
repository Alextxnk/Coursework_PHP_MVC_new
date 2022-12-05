<?php

namespace App\Controllers;

class FlashController
{
    // Show how many users and posts we have
    public function index()
    {
        return view('flash/index');
    }
}
