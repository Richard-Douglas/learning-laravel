<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support; 
use App\Http\Requests\StoreUpdateSupport;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        
        return view('admin.support.index', compact('supports'));
    }

    public function show(string|int $id)
    {
        // Support::find($id)
        // Support::where('id', $id) -> first();
        // Support::where('id', '!=', $id) -> first();
        if(!$support = Support::find($id)) {
            return back();
        }

        return view('admin.support.show', compact('support'));
    }

    public function create()
    {
        return view('admin.support.create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $support = $support->create($data);
       
        return redirect()->route('supports.index');
    }

    public function edit(Support $support, string|int $id)
    {
        if(!$support = $support::where('id', $id)->first()) {
            return back();
        }

        return view('admin.support.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string|int $id)
    {
        if(!$support = $support::where('id', $id)->first()) {
            return back();
        }

        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(Support $support, string|int $id)
    {
        if(!$support = $support::where('id', $id)->first()) {
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }
}
