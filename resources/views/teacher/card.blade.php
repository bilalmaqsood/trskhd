 @extends('layouts.app')

@section('title' , 'Staff Card')
@section('css')
 <style type="text/css">
        /*.vertical{
            display: none;
        }
        .horizontal{
            display: none;
        }*/
        .card_area_hori{

        }
        body {
            background-color: #d7d6d3;
            font-family:'verdana';
        }
        #vertical .card_area_hori .id-card-holder {
            max-width: 420px;
            height: 271.76471px;
            padding: 4px;
            margin: 0 auto;
            /*background-color: #1f1f1f;*/
            border-radius: 5px;
            position: relative;
            display: table;
            width: 100%;
        }
        #vertical .card_area_hori .id-card-holder:after {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 0 5px 5px 0;
        }
        #vertical .card_area_hori .id-card-holder:before {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 0px;
            border-radius: 5px 0 0 5px;
        }
        #vertical .card_area_hori .id-card {

            background-color: #fff;
            padding: 0px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 1.5px 0px #b9b9b9;
        }
        #vertical .card_area_hori .id-card img {
            margin: 0 auto;
        }
        #vertical .card_area_hori .header img {
            width: 250px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        #vertical .card_area_hori .photo img{
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        #vertical .std_name{
            background: #d8541e;
            color: #fff;
            padding: 5px 0;
            /*border-radius: 200px 0px 200px 0px;
            -moz-border-radius: 200px 0px 200px 0px;
            -webkit-border-radius: 200px 0px 200px 0px*/;
            /*border: 2px solid #000000;*/
        }
        #vertical .class_name{
            background: #004d24;
            color: #fff;
            padding: 5px;
           /* border-radius: 0px 200px 0px 200px;
            -moz-border-radius: 0px 200px 0px 200px;
            -webkit-border-radius: 0px 200px 0px 200px;*/
            /*border: 2px solid #000000;*/
        }
        #vertical .address{
            background: #004d24;
            color: #fff;
            padding: 5px;
            /*border-radius: 0px 200px 0px 200px;
            -moz-border-radius: 0px 200px 0px 200px;
            -webkit-border-radius: 0px 200px 0px 200px;*/
            /*border: 2px solid #000000;*/
            font-size: 16px;
        }

        /*Vertical*/
        #horizontal .card_area_hori .id-card-holder {
            max-width: 420px;
            height: 271.76471px;
            padding: 4px;
            margin: 0 auto;
            background-color: #1f1f1f;
            border-radius: 5px;
            position: relative;
            display: table;
            transform: rotate(90deg);
            width: 100%;
        }
        #horizontal .card_area_hori .id-card-holder:after {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 50%;
            border-radius: 0 5px 5px 0;
        }
        #horizontal .card_area_hori .id-card-holder:before {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 0px;
            border-radius: 5px 0 0 5px;
        }
        #horizontal .card_area_hori .id-card {

            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 1.5px 0px #b9b9b9;
        }
        #horizontal .card_area_hori .id-card img {
            margin: 0 auto;
        }
        #horizontal .card_area_hori .header img {
            width: 250px;
            margin-top: 15px;
        }
        #horizontal .card_area_hori .photo img{
            width: 200px;
        }

        #horizontal .std_name{
            background: #d8541e;
            color: #fff;
            padding: 15px;
            border-radius: 200px 0px 200px 0px;
            -moz-border-radius: 200px 0px 200px 0px;
            -webkit-border-radius: 200px 0px 200px 0px;
            border: 0px solid #000000;
        }
        #horizontal .class_name{
            background: #004d24;
            color: #fff;
            padding: 15px;
            border-radius: 0px 200px 0px 200px;
            -moz-border-radius: 0px 200px 0px 200px;
            -webkit-border-radius: 0px 200px 0px 200px;
            border: 0px solid #000000;
        }
        #horizontal .address{
            background: #004d24;
            color: #fff;
            padding: 15px;
            border-radius: 0px 200px 0px 200px;
            -moz-border-radius: 0px 200px 0px 200px;
            -webkit-border-radius: 0px 200px 0px 200px;
            border: 0px solid #000000;
            font-size: 16px;
        }
        .personal{
            background-color: #d8541e;
            padding: 5px;
            color: #fff;
            float: left;
            width: 50%;
        }
        .heading{
            background-color: #004d24;
            padding: 5px;
            color:#fff;
            float: left;
            width: 50%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
     <!--    <button type="button" class="btn btn-primary vertical_btn">Vertical</button>
        <button type="button" class="btn btn-primary horizontal_btn"> Horizontal</button> -->
        <div class="vertical" id="vertical">
            <h1>Staff Card</h1>
            <div class="card_area_hori front">
                <div class="col-sm-6"><h4 class="text-center">Front</h4>
                    <div class="id-card-holder">
                        <div class="id-card">
                            <div class="header">
                               <img src="{{asset('')}}/assets/images/{{isset($header->name)? $header->name : 'logo.png' }}" class="logo" alt="">
                            </div>
                            <h2 class="text-center std_name">{{$teacher->name}}</h2>
                            <div class="clearfix"></div>
                            <div class="photo">
                                <img src="{{asset($teacher->user->Image)}}">
                            </div>
                            <h5><em>{{$teacher->Designation}}</em></h5>
                            <hr>
                            <h3 class="class_name">{{$teacher['teacherClass']->name}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="back"><h4 class="text-center">Back</h4>
                        <div class="id-card-holder">
                            <div class="id-card">
                                <div class="header">
                                    <img src="{{asset('')}}/assets/images/{{isset($header->name)? $header->name : 'logo.png' }}" class="logo" alt="">
                                </div>

                                <p class="heading">D-O-B</p>
                                <p class="personal">{{$teacher->user->DOB}}</p>
                                <div class="clearfix"></div>
                                <p class="heading">Mobile</p>
                                <p class="personal">{{$teacher->user->Mobile}}</p>
                                
                                <div class="photo">
                                     <img src="{{asset($teacher->user->Image)}}">
                                </div>
                                <div class="clear30"></div>
                                <h3 class="address">{{$school->address}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        $(".horizontal_btn").click(function(){
            $("#horizontal").show(1000);
            $("#vertical").hide(1000);
        });

        $(".vertical_btn").click(function(){
            $("#horizontal").hide(1000);
            $("#vertical").show(1000);
        });
    </script>
@endsection