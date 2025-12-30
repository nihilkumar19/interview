<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // =======================
    // ADMIN ITEMS LIST
    // =======================
    public function index()
    {
        $items = Item::with('user')->get();
        return view('items.index', compact('items'));
    }

    // =======================
    // CREATE FORM (ADMIN + USER)
    // =======================
    public function create()
    {
        return view('items.create');
    }

    // =======================
    // STORE ITEM
    // =======================
    public function store(Request $request)
{
    $request->validate([
        'name'        => 'required',
        'description' => 'required'
    ]);

    $data = [
        'name'        => $request->name,
        'description' => $request->description,
    ];

    // 🔥 ADMIN FIRST
    if(auth('admin')->check()){
        $data['user_id'] = null;
        Item::create($data);

        return redirect()
            ->route('admin.items.index')
            ->with('success','Item Created By Admin');
    }

    // 👤 USER SECOND
    if(auth()->check()){
        $data['user_id'] = auth()->id();
        Item::create($data);

        return redirect('/dashboard')
            ->with('success','Item Submitted Successfully');
    }

    return back()->withErrors('Unauthorized Action');
}

    // =======================
    // USER VIEW ONLY PAGE
    // =======================
    public function myItems()
    {
        $items = Item::where(function($q){
            $q->where('user_id', auth()->id())
              ->orWhereNull('user_id');
        })
        ->with('user')
        ->get();

        return view('items.my-items', compact('items'));
    }

    // =======================
    // ADMIN EDIT
    // =======================
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    // =======================
    // ADMIN UPDATE
    // =======================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required'
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->only('name','description'));

        return redirect()
            ->route('admin.items.index')
            ->with('success','Item Updated Successfully');
    }

    // =======================
    // ADMIN DELETE
    // =======================
    public function destroy($id)
    {
        Item::findOrFail($id)->delete();

        return back()->with('success','Item Deleted Successfully');
    }
}
