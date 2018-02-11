@extends('layouts.app')

@section('css')
    <style type="text/css">
        th:last-child select {
            display: none;
        }
    </style>
@endsection

@section('title' , 'Inventroy Details')

@section('content')
<!-- header starts  -->
<div class="inventory-wrapper">
    <div class="heading_btns_area">
        <div class="pull-left">
            <h2 class="">Inventory Details</h2>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clear40"></div>
    {!! Form::open(['route' => 'inventory_details.store', "method" => "post"]) !!}
    {!! Form::hidden("inventory_id",$inventory->id) !!}
    <table id="myTable" class=" table order-list">
    <thead>
      <tr>
         <td>
                <input type="button" class="btn btn-block" id="add" value="Add Row" />
            </td>
        </tr>
        <tr>
            <td>Select Categroy</td>
            <td>Unit Price</td>
            <td>Quntity</td>
            <td>Debit/Credit</td>
            <td>Amount</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody class="inventory-container">
    @foreach($invetories as $I)
        <tr class="inventory-row inventory-{{ $I->id }}" data-index="{{ $I->id }}">

            <td class="col-sm-3">
                {!! Form::select("details[$I->id][category_id]", $categories ,$I->category_id, ["class" =>"form-control"]) !!}
            </td>
            <td class="col-sm-3">
                {!! Form::text("details[$I->id][unit_price]",$I->unit_price, ['class' => 'form-control']) !!}
            </td>
            <td class="col-sm-2">
                {!! Form::text("details[$I->id][qty]",$I->qty, ['class' => 'form-control']) !!}
            </td>
            <td class="col-sm-3">
                {!! Form::select("details[$I->id][type]", [1=>"debit",2=>"credit"] ,$I->type, ["class" =>"form-control"]) !!}
            </td>
            <td class="col-sm-2">
                {!! Form::number("details[$I->id][total_amount]",$I->total_amount, ['class' => 'form-control']) !!}
            </td>
            <td class="col-sm-2"><a class="deleteRow btn btn-danger">Delete</a>

            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
      <tr>
          <td></td>
          <td></td>
          <td>Total: 500</td>
          <td>Debit: 100</td>
          <td>Credit: 50</td>
        </tr>
    </tfoot>
        {!! Form::submit('Click Me!') !!}
    <div class="clearfix"></div>
</table>
    {!! Form::close() !!}
</div>

@endsection

@section('scripts')
    <script src="{{asset('/assets/js/handlebars/handlebars.js')}}"></script>

    <script type="text/template" id="inventory-template">

        <tr class="inventory-row inventory-@{{ index }}" data-index="@{{ index }}">
            <td class="col-sm-3">
                {!! Form::select("details[@{{ index }}][category_id]", $categories ,null, ["class" =>"form-control"]) !!}
            </td>
            <td class="col-sm-3">
                {!! Form::text("details[@{{ index }}][unit_price]",null, ['class' => 'form-control']) !!}
            </td>
            <td class="col-sm-2">
                {!! Form::text("details[@{{ index }}][qty]",null, ['class' => 'form-control']) !!}
            </td>
            <td class="col-sm-3">
                {!! Form::select("details[@{{ index }}][type]", [1=>"debit",2=>"credit"] ,null, ["class" =>"form-control"]) !!}
            </td>
            <td class="col-sm-2">
                {!! Form::number("details[@{{ index }}][total_amount]",null, ['class' => 'form-control']) !!}
            </td>
            <td class="col-sm-2"><a class="deleteRow btn btn-danger">Delete</a></td>
        </tr>
</script>


<script src="{{asset('/assets/scripts/inventory.js')}}"></script>
@endsection