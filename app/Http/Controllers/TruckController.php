<?php

namespace App\Http\Controllers;

use App\Models\Trucks;
use App\Traits\FetchCompanyData;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    use FetchCompanyData;
    public function __construct()
    {
        $this->middleware('permission:view trucks')->only(['index', 'show']);
        $this->middleware('permission:create trucks')->only(['create', 'store']);
        $this->middleware('permission:update trucks')->only(['edit', 'update']);
        $this->middleware('permission:delete truck')->only('destroy');
    }

    public function index()
    {
        $trucks = Trucks::all();
        $companyInfo    = $this->getCompanyData();

        return view('trucks.index', compact('trucks', 'companyInfo'));
    }

    public function create()
    {
        $companyInfo    = $this->getCompanyData();

        return view('trucks.create', compact('companyInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:clients,id',
            'plate_number' => 'required|numeric',
            'driver_info' => 'nullable|string|max:255',
            'capacity' => 'required|string',
        ]);

        Trucks::create($request->all());
        $companyInfo    = $this->getCompanyData();

        return redirect()->route('trucks.index', compact('companyInfo'))->with('success', 'truck created successfully.');
    }

    public function show($id)
    {
        $truck = Trucks::findOrFail($id);
        $companyInfo    = $this->getCompanyData();

        return view('orders.show', compact('truck','companyInfo'));
    }

    public function edit($id)
    {
        $truck = Trucks::findOrFail($id);
        $companyInfo    = $this->getCompanyData();

        return view('trucks.edit', compact('truck','companyInfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required|exists:clients,id',
            'plate_number' => 'required|numeric',
            'driver_info' => 'nullable|string|max:255',
            'capacity' => 'required|string',
        ]);

        $truck = Trucks::findOrFail($id);
        $truck->update($request->all());
        $companyInfo    = $this->getCompanyData();

        return redirect()->route('truck.index',compact('companyInfo'))->with('success', 'truck updated successfully.');
    }

    public function destroy($id)
    {
        $truck = Trucks::findOrFail($id);
        $truck->delete();
        $companyInfo    = $this->getCompanyData();

        return redirect()->route('trucks.index', compact('companyInfo'))->with('success', 'truck deleted successfully.');
    }
}
