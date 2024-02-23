<?php

namespace App\Http\Controllers;

use App\Traits\FetchCompanyData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use FetchCompanyData;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companyInfo    = $this->getCompanyData();

        return view('home',compact('companyInfo'));
    }
}
