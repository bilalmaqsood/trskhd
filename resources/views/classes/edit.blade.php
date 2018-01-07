@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'Edit-Exam')

@section('content')

    <div class="clear40"></div>

        <div class="container">
        <div class="jumbotron">
            <h2 class="">{{$class->name}}</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="create_test_area">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit {{$class->name}}</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('classes.update', [$class->id])}}">
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text" value="{{$class->name}}" required name="name" class="form-control"  placeholder="Exam Name">
                            </div>
                            <div class="form-group">
                                <label>Add Fee</label>
                                <input type="number" value="{{$class->fee}}" required name="fee" class="form-control"  placeholder="Add class fee">
                            </div>
                            <div class="form-group">
                                <label>Seats</label>
                                <input type="text" value="{{$class->seats}}" required name="seats" class="form-control"  placeholder="Enter total seats ">
                            </div>

                            <label class="control-label">Add Books</label>
                            <div id="books">
                                {{--<div class="form-group">
                                    <div class="col-md-6">
                                        <input type="text" required name="books[0][name]" class="form-control"  placeholder="Add new book ">
                                        <input type="hidden" value="0" name="books[0][id]" >
                                    </div>

                                    <div class="col-md-6">
                                        <button type="button" class="add btn btn-success"> Add </button>
                                        <button type="button" class="newDelete btn btn-danger"> Delete </button>
                                    </div>

                                </div>--}}
                                <div class="clear10"></div>
                                @foreach($class->books as $book)
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text"  value="{{$book->name}}" required name="books[{{$loop->iteration + 1}}][name]" class="form-control"  placeholder="Enter book name ">
                                            <input type="hidden"  value="{{$book->id}}" required name="books[{{$loop->iteration + 1}}][id]" class="form-control"  placeholder="Enter book name ">
                                        </div>

                                        <div class="col-md-6">
                                            {{--<button  class="add btn btn-success"> Add </button>--}}
                                            <button type="button" data-id="{{$book->id}}" class="delete btn btn-danger"> Delete </button>
                                        </div>

                                    </div>
                                    <div class="clear10"></div>
                                @endforeach
                            </div>

                            {{csrf_field()}}
                            <button type="button" class="add btn btn-success"> Add New Book</button>

                            <button  type="submit" value="" class="btn btn-warning">Update Class</button>
                            <a href="{{route('classes.index')}}" class="btn btn-primary test_toggle">Show All Classes</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clear40"></div>
@endsection

@section('js')

    <script>

        $(function () {

            var form = $('#staff_store');

            form.validate();
        })

        $(function () {
            $(document).on('click' , '.add' , function (e) {

                e.preventDefault();
                var books = $("#books");
                var element = '<div class="form-group">'+
                        '<div class="col-md-6">'+
                            '<input type="text"  required name="books[0][name]" class="form-control"  placeholder="Enter book name ">'+
                            '<input type="hidden" value="0"  required name="books[0][id]" >'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<button type="button" class="newDelete btn btn-danger"> Delete </button>'+
                        '</div>'+
                    '</div>'+
                    '<div class="clear10"></div>';
                books.append(element);
            });

            $(document).on('click' , '.newDelete' , function (e) {
                e.preventDefault();
                $(this).closest('.form-group').remove();
            });


            $(document).on('click' , '.delete' , function (e) {

                var $this = $(this);
                var id    = $this.data('id');

                swal({
                    showLoaderOnConfirm: true,
                    title: "Are you sure",
                    text: "This book and all releted data will be deleted. this action can not be undo !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#007AFF",
                    confirmButtonText: "confirm",
                    cancelButtonText: "cancel",
                    closeOnConfirm: true
                }, function() {
                    $.ajax({
                        url    :  '{{ str_replace('-1','',route('delete.book',-1))  }}' + id,
                        headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                        error: function() {
                            swal("Cancelled", "Unable to delete ", "error");
                        },
                        success: function(response) {

                            swal("Success", "Deleted successfully !", "success");
//                    tr.remove();
                            location.reload();
                            if(response.success == 'true'){
                            }else{
                            }
                        },

                        type: 'POST'
                    });
                });


            });


        })

    </script>


@endsection


