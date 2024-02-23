<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Traits\FetchCompanyData;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view companies')->only(['index', 'show']);
        $this->middleware('permission:create companies')->only(['create', 'store']);
        $this->middleware('permission:update companies')->only(['edit', 'update']);
        $this->middleware('permission:delete companies')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $companies = Companies::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        // Return view for creating a new company
        return view('companies.create');
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'company_info' => 'nullable|string',
            'url' => 'nullable|string|max:255',
        ]);

        // Create new company
        Companies::create($request->all());

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show($id)
    {
        // Fetch the company by ID
        $company = Companies::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        // Fetch the company by ID
        $company = Companies::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'company_info' => 'nullable|string',
            'url' => 'nullable|string|max:255',
        ]);

        // Update the company
        $company = Companies::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the company by ID
        $company = Companies::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
