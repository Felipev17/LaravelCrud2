<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    
    public function index()
    {
        $roles = Roles::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    
    public function store(Request $request)
    {
        Roles::create($request->all());
        return redirect()->route('roles.index');
    }

   
    public function edit(Roles $roles)
    {
        return view('roles.edit', compact('roles'));
    }

    public function update(Request $request, Roles $roles)
    {
        $roles->update($request->all());
        return redirect()->route('roles.index');
    }

    
    public function destroy(Roles $roles)
    {
        $roles->delete();
        return redirect()->route('roles.index');
    }

    
}
