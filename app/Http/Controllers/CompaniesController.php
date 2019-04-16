<?php

namespace App\Http\Controllers;

use App\Company;
use App\Events\NewCompanyHasRegistered;
use Illuminate\Http\Request;


class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', [
            'companies' => $companies,
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);
        /* Upload image*/
        $fileNameToStore = $this->uploadImage($request);

        $company = new Company();
        $company->name = request('name');
        $company->email = request('email');
        $company->website = request('website');
        $company->logo = $fileNameToStore;
        event(new NewCompanyHasRegistered($company));

        $company->save();
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', [
            'company' => $company,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fileNameToStore = $this->uploadImage($request);
        request()->validate([
            'name' => 'required',
        ]);

        $company = Company::find($id);
        $company->name = request('name');
        $company->email = request('email');
        $company->website = request('website');
        $company->logo = $fileNameToStore;

        $company->save();
        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        return back();
    }

    private function uploadImage(Request $request)
    {
        if ($request->hasFile('logo')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $request->file('logo')->storeAs('public/companyLogo', $fileNameToStore);
        } else {
            $fileNameToStore = "";
        }
        return $fileNameToStore;
    }

}
