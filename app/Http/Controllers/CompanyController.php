<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email'=>'required',
            'website'=>'required',
            'logo'=>'required|max:100|file'
        ]);
        $company = new Company;
        $imageName = null;
        $imageurl = null;
        if (request()->hasFile('logo')) {
            $file = request()->file('logo');
            $imageName =time() . "." . $file->getClientOriginalExtension();
            $imageurl =url('/uploads/images/'.time() . "." . $file->getClientOriginalExtension());
            $file->move('./uploads/images/', $imageName);
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $imageurl;

        $company->save();

        if($company->save()){
            return redirect('/company');
        }else{
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validate($request,[
            'name' => 'required',
            'email'=>'required',
            'website'=>'required',
        ]);

        $imageName = null;
        $imageurl = null;
        if (request()->hasFile('logo')) {
            $file = request()->file('logo');
            $imageName =time() . "." . $file->getClientOriginalExtension();
            $imageurl =url('/uploads/images/'.time() . "." . $file->getClientOriginalExtension());
            $file->move('./uploads/images/', $imageName);
            $company->logo = $imageurl;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        if($company->save()){
            return redirect('/company');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back();
    }
}
