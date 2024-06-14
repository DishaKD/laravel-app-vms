<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddProductController extends ParentController
{
    public function index()
    {
        return view('pages.addProduct');
    }
}
