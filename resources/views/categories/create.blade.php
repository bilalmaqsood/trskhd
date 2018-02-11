@extends('layouts.app')

@section('title' , 'All-Students')

@section('content')
<div class="container">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Add Categroies</div>
                <div class="panel-body">
                    <form action="{{route("categories.store")}}" method="post">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label>Categroy Name</label>
                                <input type="text" name="name" value="" class="form-control" placeholder="Enter Categroy Name">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="" class="form-control" placeholder="Enter Categroy Price">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection