<?php

namespace App\Controllers;
use App\Models\Firm;

class FirmController
{
    // Show how many users and posts we have
    public function index()
    {
        $firm = (new Firm)->allFirm('firm');

        return view('firm/index', ['firm' => $firm]);
    }
}
