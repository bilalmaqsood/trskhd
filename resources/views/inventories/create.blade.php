@extends('layouts.app')

@section('css')
    <style type="text/css">
        th:last-child select {
            display: none;
        }
    </style>
@endsection

@section('title' , 'Create Inventory')

@section('content')
    <div class="heading_btns_area">
        <div class="pull-left">
            <h2 class="">Create Inventory</h2>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clear40"></div><!-- header starts  -->
    <div class="container">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Add Inventory</div>
                <div class="panel-body">
                    <form action="{{route("inventories.store")}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Inventory Title</label>
                            <input type="text" name="title" value="" class="form-control" placeholder="Enter Categroy Name">
                        </div>
                        <div class="form-group">
                            <label>Select Year</label>
                            <select name="year" id="years" class="form-control">
                                <option value='' selected disabled="">--Select Years--</option>
                                <option value="2017">2014</option>
                                <option value="2017">2015</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2020">2021</option>
                                <option value="2020">2022</option>
                                <option value="2020">2023</option>
                                <option value="2020">2024</option>
                                <option value="2020">2025</option>
                                <option value="2020">2026</option>
                                <option value="2020">2027</option>
                                <option value="2020">2028</option>
                                <option value="2020">2029</option>
                                <option value="2020">2030</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Month</label>
                            <select id='months' name="month" class="form-control">
                                <option value='' selected disabled="">--Select Month--</option>
                                <option value='01'>Janaury</option>
                                <option value='02'>February</option>
                                <option value='03'>March</option>
                                <option value='04'>April</option>
                                <option value='05'>May</option>
                                <option value='06'>June</option>
                                <option value='07'>July</option>
                                <option value='08'>August</option>
                                <option value='09'>September</option>
                                <option value='10'>October</option>
                                <option value='11'>November</option>
                                <option value='12'>December</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
