<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
{
    // List with all internships
    public function index()
    {
            
    }

    // Show detail page of a company
    public function details() 
    {

    }

    // Company register
    public function register()
    {
        return view('/company/register');
    }

    public function handleRegister(Request $request)
    {
        $company = new \App\Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->sector = $request->input('sector');
        $company->city = $request->input('city');
        $company->password = \Hash::make($request->input('password'));
        $company->save();
        
        $this->handleLogin($request);
        
        return redirect('/');
    }

    // Company login
    public function login()
    {
        return view('/company/login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (\Auth::guard('company')->attempt($credentials)){
            return redirect('/');
        }

        /*$result = \Auth::guard('company')->attempt($credentials);
        dd($result);*/

        else {
            return view('company/login');
        }
    }

    // Company profile
    public function profile()
    {
        if (Auth::guard('company')->check() || Auth::guard('student')->check()) {
            $company['companyInfo'] = Auth::guard('company')->user();
            return view('company/profile', $company);
        }

        else {
            return redirect('/bedrijf/login');
        }
    }

    // Edit company profile
    public function settings()
    {
        
    }

    // Save edited company profile
    public function change()
    {
        
    }

    // Company internships
    public function internships($company)
    {
        $data['company'] = \App\Company::where('id', $company)->with('internships')->first();
        return view('company/internships', $data);
    }

    public function reviews() {
        $data['reviews'] = \DB::table('reviews')->get();
        return view('review/index', $data);
    }

    public function makeReview() {
        return view('review/create');
    }

    public function handleMakeReview(Request $request) {

        $validation = $request->validate([
            'stars' => 'required',
            'description' => 'required',
        ]);

        $request->flash();

        $review = new \App\Review();
        $review->company_id = "1";
        $review->student_id = "1";
        $review->stars = $request->input('stars');
        $review->description = $request->input('description');
        $review->save();

        $request->session()->flash('message', 'Review geplaatst');

        return redirect('/bedrijfsReviews');
    }

}
