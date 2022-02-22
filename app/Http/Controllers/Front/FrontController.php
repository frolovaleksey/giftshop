<?php


namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    protected $nodeObj = null;

    public function __construct()
    {
        parent::__construct();

        $this->nodeObj = $this->getNodeObj();
    }
}
