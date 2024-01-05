<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support; 
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        
        return view('admin.support.index', compact('supports'));
    }

    public function create()
    {
        return view('admin.support.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
