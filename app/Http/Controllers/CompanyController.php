<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Spatie\Flash\Flash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(1);
        return view('companies.index',compact('companies'));
    }

    // All Companies Api
    public function getCompanies(){
        $companies = Company::get()->toJson(JSON_PRETTY_PRINT);
        return response($companies, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if($request->logo){
            $picture = $request->logo;
            $picturename = $picture->getClientOriginalName();
            $picturename = explode('.', $picturename);
            $picturenameexe = end($picturename);
            $picturename = uniqid() . '.' . $picturenameexe;
            $company->logo = $picturename;
            $picture->storeAs('public/logos', $picturename);
        }
        $done = $company->save();


        flash('company Add Success.')->success();
        return redirect()->route('companies.index');
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
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        // if logo upload
        if($request->logo){
            $picture = $request->logo;
            $picturename = $picture->getClientOriginalName();
            $picturename = explode('.', $picturename);
            $picturenameexe = end($picturename);
            $picturename = uniqid() . '.' . $picturenameexe;
            $company->logo = $picturename;
            $picture->storeAs('public/logos', $picturename);
        }
        $done = $company->save();


        flash('Company Update Success.')->success();
        return redirect()->route('companies.index');
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
        flash('Company Removed.')->error();
        return redirect()->route('companies.index');
    }
}
