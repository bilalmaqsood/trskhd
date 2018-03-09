<?php

namespace App\Http\Controllers;

use App\Trskd\Models\Category;
use App\Trskd\Models\Inventory;
use App\Trskd\Models\InventoryDetails;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
        $categories = Category::all()->pluck("name","id")->toArray();
        view()->share("categories",$categories);
    }

    public function index()
    {
        $inventories = Inventory::all();
        return view("inventories.index",compact("inventories"));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("inventories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "required",
            "month" => "required",
            "year" => "required",
        ]);

        $inventory = Inventory::create($request->all());

        return redirect()->route("inventory_details.add",$inventory->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $inventory = Inventory::find($id);
        $invetories = $inventory->inventories;
        $balance = count($inventory->inventories)?$inventory->inventories->last()->balance:0.00;
        $debit = $invetories->where('type',InventoryDetails::DEBIT)->sum("total_amount");
        $credit = $invetories->where('type',InventoryDetails::CREDIT)->sum("total_amount");
        return view("inventories.show",compact("inventory","invetories","credit","debit","balance"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        return view("inventories.edit", compact("inventory"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
