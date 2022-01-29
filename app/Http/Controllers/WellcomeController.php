<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WellcomeController extends Controller
{
    public function index()
    {
        return view('main_tpl', ['page_title' => __('global.main_name')]);
    }
}
