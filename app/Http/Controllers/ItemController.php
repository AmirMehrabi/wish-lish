<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Redirect;
use Inertia\Inertia;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reserve(Item $item)
    {
        $item->reserve();

        if($item->is_reserved == true) {
            $message = 'آیتم مورد نظر با موفقیت رزرو شد';
        } else {
            $message = 'رزرو شما با موفقیت لغو شد';
        }
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'item' => $item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'biaaatch';
        $request->validate([
            'title' => ['required'],
            'price' => ['required'],
            'address' => ['sometimes'],
        ]);

        $item = new Item();
        $item->title = $request->title;
        $item->price = $request->price;
        if($request->has('address')) {
            $item->address = $request->address;
        }

        if($request->has('description')) {
            $item->description = $request->description;
        }

        if($request->has('picture')) {
            $item->picture = $request->picture;
        }
        
        $item->user_id = auth()->user()->id;
        $item->save();

        return Redirect::route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'آیتم مورد نظر با موفقیت حذف شد'
        ]);
    }
}
