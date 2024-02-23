<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Traits\FetchCompanyData;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use FetchCompanyData;

    public function __construct()
    {
        $this->middleware('permission:view orders')->only(['index', 'show']);
        $this->middleware('permission:create orders')->only(['create', 'store']);
        $this->middleware('permission:update orders')->only(['edit', 'update']);
        $this->middleware('permission:delete orders')->only('destroy');
    }

    public function index()
    {
        $orders         = Orders::all();
        $companyInfo    = $this->getCompanyData();

        return view('orders.index', compact('orders','companyInfo'));
    }

    public function create()
    {
        $companyInfo    = $this->getCompanyData();

        return view('orders.create' , compact('companyInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'fuel_amount' => 'required|numeric',
            'fuel_type' => 'nullable|string|max:255',
            'delivery_deadline' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
        ]);


        Orders::create($request->all());
        $companyInfo    = $this->getCompanyData();

        return redirect()->route('orders.index' , compact('companyInfo'))->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = Orders::findOrFail($id);
        $companyInfo    = $this->getCompanyData();

        return view('orders.show', compact('order' , 'companyInfo'));
    }

    public function edit($id)
    {
        $order = Orders::findOrFail($id);

        return view('orders.edit', compact('order' , 'com'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'fuel_amount' => 'required|numeric',
            'fuel_type' => 'nullable|string|max:255',
            'delivery_deadline' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $order = Orders::findOrFail($id);
        $order->update($request->all());
        $companyInfo    = $this->getCompanyData();

        return redirect()->route('orders.index', compact('companyInfo'))->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();
        $companyInfo    = $this->getCompanyData();

        return redirect()->route('orders.index',compact('companyInfo'))->with('success', 'Order deleted successfully.');
    }
}
