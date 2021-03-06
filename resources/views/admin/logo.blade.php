@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>Header & Footer Logo</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="header_footer_logos">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Header Logo</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('change.logo')}}" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="header" id="header_logo"  class="form-control">
                            </div>
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-success">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Footer Logo</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('change.logo')}}" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="footer" id="footer_logo"  class="form-control">
                            </div>
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-success">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection