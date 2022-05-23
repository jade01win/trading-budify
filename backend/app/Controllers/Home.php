<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('v_landpg');
    }
    public function crypto()
    {
      echo "Data Crypto";
    }
    public function stocks()
    {
      echo "Data Stocks";
    }
    public function forex()
    {
      echo "Data Forex";
    }
}
