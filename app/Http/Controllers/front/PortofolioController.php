<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\portofolio;

class PortofolioController extends Controller
{

    public function index()
    {
        $data = [
            'portofolio' => portofolio::paginate(9)
        ];

        return view('front.portofolio.index',$data);
    }
}
