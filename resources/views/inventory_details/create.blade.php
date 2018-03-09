@extends('layouts.app')

@section('css')
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
        <td colspan="4"></td>
        <td> {!! Form::submit('Save', ['class' => 'btn btn-success btn-wide']) !!}</td>
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
                {!! Form::select("details[$I->id][category_id]", $categories ,$I->category_id, ["class" =>"form-control category_id"]) !!}
            </td>
            <td class="col-sm-3">
                {!! Form::text("details[$I->id][unit_price]",$I->unit_price, ['class' => 'form-control unit_price']) !!}
            </td>
            <td class="col-sm-2">
                {!! Form::text("details[$I->id][qty]",$I->qty, ['class' => 'form-control qty']) !!}
            </td>
            <td class="col-sm-3">
                {!! Form::select("details[$I->id][type]", [1=>"debit",2=>"credit"] ,$I->type, ["class" =>"form-control type"]) !!}
            </td>
            <td class="col-sm-2">
                {!! Form::number("details[$I->id][total_amount]",$I->total_amount, ['class' => 'form-control total_amount']) !!}
            </td>
            {!! Form::hidden("details[$I->id][balance]",$I->balance,["class" => "balance"]) !!}
            {!! Form::hidden("details[$I->id][debit]",$I->debit,["class" => "debit"]) !!}
            {!! Form::hidden("details[$I->id][credit]",$I->credit,["class" => "credit"]) !!}
            <td class="col-sm-2">
                <a class="deleteRow btn btn-danger" data-index="{{$I->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
          <td colspan="3"></td>
          <td>Debit: <span class="debit">{{$debit}}</span></td>
          <td>Credit: <span class="credit">{{$credit}}</span></td>
      </tr>
      <tr>
            <td colspan="4"></td>
            <td>Balance : <span class="balance">{{$balance}}</span></td>
        </tr>
    </tfoot>
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
                {!! Form::select("details[@{{ index }}][category_id]", $categories ,null, ["class" =>"form-control category_id"]) !!}
            </td>
            <td class="col-sm-3">
                {!! Form::text("details[@{{ index }}][unit_price]",null, ['class' => 'form-control unit_price']) !!}
            </td>
            <td class="col-sm-2">
                {!! Form::text("details[@{{ index }}][qty]",null, ['class' => 'form-control qty']) !!}
            </td>
            <td class="col-sm-3">
                {!! Form::select("details[@{{ index }}][type]", [1=>"debit",2=>"credit"] ,null, ["class" =>"form-control type"]) !!}
            </td>
            <td class="col-sm-2">
                {!! Form::number("details[@{{ index }}][total_amount]",null, ['class' => 'form-control total_amount']) !!}
            </td>
            {!! Form::hidden("details[@{{ index }}][balance]",null,["class" => "balance"]) !!}
            {!! Form::hidden("details[@{{ index }}][debit]",null,["class" => "debit"]) !!}
            {!! Form::hidden("details[@{{ index }}][credit]",null,["class" => "credit"]) !!}

            <td class="col-sm-2"><a class="deleteRow btn btn-danger" data-index="@{{ index }}">Delete</a></td>
        </tr>
</script>
<script src="{{asset('/assets/scripts/inventory.js')}}"></script>
    <script>
    $(document).ready(function() {
//    TRSKD.inventory.calculateBill();

        $(document).on('change', 'input,select', function(event) {
            event.preventDefault();
            TRSKD.inventory.calculateBill();

        });

    });
    </script>

@endsection