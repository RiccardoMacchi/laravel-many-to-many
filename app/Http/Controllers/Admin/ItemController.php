<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Type;
use App\Functions\Helper;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'I miei Lavori'
;       $items = Item::orderBy('title')->get();
        return view('admin.items.index', compact('items','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Aggiungi un nuovo lavoro';
        $types = Type::all();
        return view('admin.items.create', compact('title','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['title'], Item::class);
        $new_item = new Item();

        $new_item->fill($data);

        $new_item->save();
        return redirect()->route('admin.items.show', $new_item->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        $types = Type::all();
        $title = 'Stai modificando ' . $item->title;
        return view('admin.items.edit', compact('item','title','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, string $id)
    {
        $data = $request->all();
        $item = Item::find($id);
        if($item->title != $data['title']){
            $data['slug'] = Helper::generateSlug($data['title'], Item::class);
        }
        $item->update($data);

        return redirect()->route('admin.items.show', $item);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('admin.items.index');
    }
}
