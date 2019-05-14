<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($lang)
    {
        App::setlocale($lang);
        $countCompanies = count(Company::all());
        $countEmployees = count(Employee::all());
        return view('home',[
            'countCompanies' => $countCompanies,
            'countEmployees' => $countEmployees,
        ]);
    }
}
