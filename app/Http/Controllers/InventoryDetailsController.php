<?php

namespace App\Http\Controllers;

use App\Trskd\Models\Category;
use App\Trskd\Models\Inventory;
use App\Trskd\Models\InventoryDetails;
use Illuminate\Http\Request;

class InventoryDetailsController extends Controller
{
    function __construct()
    {
        $categories = Category::all()->pluck("name","id")->toArray();
        view()->share("categories",$categories);
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rows = $this->validate($request,[
            "inventory_id" => "required",
            "details.*.category_id" => "required|numeric",
            "details.*.unit_price" => "required|numeric",
            "details.*.qty" => "required|numeric",
            "details.*.type" => "required|numeric",
            "details.*.total_amount" => "required|numeric",
        ]);
//        dd($request->details);
        foreach ($request->details as $index => $row){
            $data = $row;
            if(InventoryDetails::DEBIT){
                $data["debit"] = $row["total_amount"];
                $data["inventory_id"] = $request->inventory_id;
                $data["balance"] = $request->balance + $row["total_amount"];
                InventoryDetails::updateOrCreate(["id" => $index],$data);

            } else if(InventoryDetails::CREDIT){
                $data["credit"] = $row["total_amount"];
                $data["inventory_id"] = $request->inventory_id;
                $data["balance"] = $request->balance - $row["total_amount"];
                InventoryDetails::updateOrCreate(["id" => $index],$data);
            }
        }
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


    public function addInventory($id)
    {
        $inventory = Inventory::findorfail($id);
        $invetories = $inventory->inventories;
        return view("inventory_details.create",compact("inventory","invetories"));
    }
}
