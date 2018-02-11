@extends('layouts.app')

@section('title' , 'Dashboard')
@section('css')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style type="text/css">
        .state-overview {
            color: #fff;
        }
        .bg-b-green {
            background: linear-gradient(45deg,#2ed8b6,#59e0c5);
        }
        .info-box {
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            min-height: 100px;
            width: 100%;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .1);
            -webkit-box-shadow: 0 5px 20px rgba(0, 0, 0, .1);
            margin-bottom: 20px;
            padding: 15px;
        }
        .info-box-icon.push-bottom {
            margin-top: 20px;
        }
        .info-box-icon {
            float: left;
            height: 70px;
            width: 70px;
            text-align: center;
            font-size: 30px;
            line-height: 74px;
            background: rgba(0, 0, 0, .2);
            border-radius: 100%;
        }
        .info-box-content {
            padding: 10px 10px 10px 0;
            margin-left: 90px;
        }
        .info-box-text, .progress-description {
            display: block;
            font-size: 16px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 400;
        }
        .info-box-number {
            font-weight: 300;
            font-size: 21px;
        }
        .info-box .progress, .info-box .progress .progress-bar {
            border-radius: 0;
        }

        .info-box .progress {
            background: rgba(0, 0, 0, .2);
            margin: 5px -10px 5px 0;
            height: 2px;
        }
        .progress {
            border: 0;
            background-image: none;
            filter: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            height: 8px;
            border-radius: 0!important;
            margin: 0;
        }
        .progress {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: .25rem;
        }
        .info-box .progress .progress-bar {
            background: #fff;
        }
        .info-box .progress, .info-box .progress .progress-bar {
            border-radius: 0;
        }

        .progress-bar {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            background-color: #007bff;
            transition: width .6s ease;
        }
        .progress-description {
            margin: 0;
        }
        .info-box-text, .progress-description {
            display: block;
            font-size: 16px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 400;
        }
        .bg-b-yellow {
            background: linear-gradient(45deg,#FFB64D,#ffcb80);
        }
        .bg-b-blue {
            background: linear-gradient(45deg,#4099ff,#73b4ff);
        }
        .bg-b-pink {
            background: linear-gradient(45deg,#FF5370,#ff869a);
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <div class="state-overview">
            <div class="row">
                <div class="col-md-3">
                    <div class="info-box bg-b-green">
                        <span class="info-box-icon push-bottom"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Students</span>
                            <span class="info-box-number">{{$students}}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 45%"></div>
                            </div>
                            <span class="progress-description">
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                    <div class="info-box bg-b-yellow">
                        <span class="info-box-icon push-bottom"><i class="fa fa-male"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Male Students</span>
                            <span class="info-box-number">{{$boys}}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                            <span class="progress-description">
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                    <div class="info-box bg-b-blue">
                        <span class="info-box-icon push-bottom"><i class="fa fa-female"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Female Students</span>
                            <span class="info-box-number">{{$girls}}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                            <span class="progress-description">
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                    <div class="info-box bg-b-pink">
                        <span class="info-box-icon push-bottom"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Staff</span>
                            <span class="info-box-number">{{$teachers}}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 50%"></div>
                            </div>
                            <span class="progress-description">
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection

