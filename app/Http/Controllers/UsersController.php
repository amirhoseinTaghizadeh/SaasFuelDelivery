<?php

namespace App\Http\Controllers;

use App\Models\Users as User;
use App\Traits\FetchCompanyData;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    use FetchCompanyData;
    public function __construct()
    {
        $this->middleware('permission:view users')->only(['index', 'show']);
        $this->middleware('permission:create users')->only(['create', 'store']);
        $this->middleware('permission:edit users')->only(['edit', 'update']);
        $this->middleware('permission:delete users')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $companyInfo    = $this->getCompanyData();

        return view('users.index', compact('users','companyInfo'));
    }

    public function create()
    {
        $roles = Role::all();
        $companyInfo    = $this->getCompanyData();

        return view('users.create', compact('roles','companyInfo'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'company_id' => 'required|exists:companies,id',
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::create($validatedData);
        $user->assignRole($request->role_id);
        $companyInfo    = $this->getCompanyData();


        return redirect()->route('users.index',compact('companyInfo'))->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $companyInfo    = $this->getCompanyData();

        return view('users.edit', compact('user', 'roles', 'companyInfo'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'company_id' => 'required|exists:companies,id',
            'role_id' => 'required|exists:roles,id'
        ]);

        if ($request->password) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $user->update($validatedData);
        $user->syncRoles([$request->role_id]);
        $companyInfo    = $this->getCompanyData();

        return redirect()->route('users.index',compact('companyInfo'))->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        $companyInfo    = $this->getCompanyData();

        return redirect()->route('users.index',compact('companyInfo'))->with('success', 'User deleted successfully.');
    }
}
