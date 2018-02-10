@extends('layouts.app')

@section('title', 'Inventory')
@section('css')
    <style type="text/css">
        .entry:not(:first-of-type)
        {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')

    <div class="clear40"></div>

    <div class="container">

        <div class="clear50"></div>
        <!-- header starts  -->
        <div class="container">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <select name="inv_years" class="form-control" id="inv_years">
                    <option selected="selected">Select Year.</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select name="inv_month" id="inv_month" class="form-control">
                    <option selected="selected">Select Month</option>
                    @foreach($months as $month)
                        <option value="{{$month}}"> {{$month}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3"></div>

            <div class="clear40"></div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Total Item's/Amount</div>
                    <div class="panel-body">
                        <div class="control-group" id="fields">
                            <div class="controls">
                                <form role="form" autocomplete="off">
                                    <div class="entry input-group">
                                        <input class="form-control" name="fields[]" type="text" placeholder="Add total Item/Amount" />
                                        <span class="input-group-btn">
                                            {{--<button class="btn btn-success btn-add" type="button">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>--}}
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <form action="" method="">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add Details</div>
                        <div class="panel-body">

                            <div id="education_fields">

                            </div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inv_title" name="title[]" value="" placeholder="Inventory Title">
                                </div>
                            </div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <textarea class="form-control" id="inv_des" name="description[]" placeholder="Inventory Description"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-control" id="debit_credit" name="type[]">
                                            <option selected="selected">Select</option>
                                            <option value="debit">Debit</option>
                                            <option value="credit">Credit</option>
                                        </select>
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        </div>
                </form>
                <div class="col-sm-4">
                    <p><strong>Total</strong> 25000</p>
                </div>
                <div class="col-sm-4">
                    <p><strong>Debit</strong> 12000</p>
                </div>
                <div class="col-sm-4">
                    <p><strong>Credit</strong> 10000</p>
                </div>
            </div>
            <div class="">
            </div>
        </div>
    </div>

    <div class="clear40"></div>

@endsection

@section('js')

    <script type="text/javascript">
                $(function()
                {
                    $(document).on('click', '.btn-add', function(e)
                    {
                        e.preventDefault();

                        var controlForm = $('.controls form:first'),
                            currentEntry = $(this).parents('.entry:first'),
                            newEntry = $(currentEntry.clone()).appendTo(controlForm);

                        newEntry.find('input').val('');
                        controlForm.find('.entry:not(:last) .btn-add')
                            .removeClass('btn-add').addClass('btn-remove')
                            .removeClass('btn-success').addClass('btn-danger')
                            .html('<span class="glyphicon glyphicon-minus"></span>');
                    }).on('click', '.btn-remove', function(e)
                    {
                        $(this).parents('.entry:first').remove();

                        e.preventDefault();
                        return false;
                    });
                });
                $(function() {
                    var start_year = new Date().getFullYear();

                    for (var i = start_year; i > start_year - 10; i--) {
                        $('#inv_years').append('<option value="' + i + '">' + i + '</option>');
                    }

                });
                var room = 1;
                function education_fields() {

                    room++;
                    var objTo = document.getElementById('education_fields')
                    var divtest = document.createElement("div");
                    divtest.setAttribute("class", "form-group removeclass"+room);
                    var rdiv = 'removeclass'+room;
                    divtest.innerHTML = '<div class="col-sm-4 nopadding"><div class="form-group"> <input type="text" class="form-control" id="inv_title" name="inv_title[]" value="" placeholder="Inventroy Title"></div></div><div class="col-sm-4 nopadding"><div class="form-group"> <textarea class="form-control" id="inv_des" name="inv_des" placeholder="Inventroy Description"></textarea></div></div><div class="col-sm-4 nopadding"><div class="form-group"><div class="input-group"> <select class="form-control" id="debit_credit" name="debit_credit[]"><option selected="selected">Select</option> <option value="debit">Debit</option><option value="credit">Credit</option>  </select><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

                    objTo.appendChild(divtest)
                }
                function remove_education_fields(rid) {
                    $('.removeclass'+rid).remove();
                }
            </script>


@endsection()