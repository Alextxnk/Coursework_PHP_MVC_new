<?php

namespace App\Controllers;
use App\Models\Lens;
use App\Core\Request;

class LensController
{
    public function index()
    {
        $lens = (new Lens)->allLenses('lens');

        return view('lens/index', ['lens' => $lens]);
    }

    // Show single lens/card
    public function show()
    {
        $lens = ((new Lens)->showLens(Request::values()['id']));

        return view('lens/card/index', ['lens' => $lens]);
    }
}
