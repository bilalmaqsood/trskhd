@extends('layouts.app')

@section('css')
<style type="text/css">
  .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
@endsection

@section('title' , 'View Inventory')

@section('content')

<!-- header starts  -->
 <div class="heading_btns_area">
        <div class="pull-left">
            <h2 class="">View Inventory</h2>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clear40"></div>
<div class="">    
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>{{$inventory->title}}</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                      <td>SR.</td>
                      <td>Categroy Name</td>
                      <td>Unit Price</td>
                      <td>Quntity</td>
                      <td>Debit / Credit</td>
                      <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                 @foreach($inventory->inventories as $inventory)
                     <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$categories[$inventory->category_id]}}</td>
                          <td>{{$inventory->unit_price}} </td>
                          <td>{{$inventory->qty}}</td>
                          <td>{{$inventory->type==1?"debit":"credit"}}</td>
                          <td>{{$inventory->total_amount}}</td>
                        </tr>
                      @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4"></td>
                    <td>Debit: <span class="debit">{{$debit}}</span></td>
                    <td>Credit: <span class="credit">{{$credit}}</span></td>
                </tr>
                <tr>
                      <td colspan="5"></td>
                      <td>Balance : <span class="balance">{{$balance}}</span></td>
                  </tr>
              </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection