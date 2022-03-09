<?php

    namespace App\Http\Controllers;
    use App\Company;
    
    use Illuminate\Http\Request;
    
    class CompanyController extends Controller
    {
        public function index(){
            $company   = 'test';
            return view('company',compact(['data']));
        }
    }