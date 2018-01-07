@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'Create-Class')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>Create Class</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
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
                    <div class="panel-heading">Create Class</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('classes.store')}}">
                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text" value="{{old('name')}}" required name="name" class="form-control"  placeholder="Exam Name">
                            </div>
                            <div class="form-group">
                                <label>Add Fee</label>
                                <input type="number" value="{{old('fee')}}" required name="fee" class="form-control"  placeholder="Add class fee">
                            </div>
                            <div class="form-group">
                                <label>Seats</label>
                                <input type="text" value="{{old('seats')}}" required name="seats" class="form-control"  placeholder="Enter total seats ">
                            </div>

                            <label class="control-label">Add Books</label>
                            <div id="books">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="text"  required name="books[]" class="form-control"  placeholder="Enter book name ">
                                    </div>

                                    <div class="col-md-6">
                                        <button  class="add btn btn-success"> Add </button>
                                        <button class="delete btn btn-danger"> Delete </button>
                                    </div>

                                </div>
                                <div class="clear10"></div>

                            </div>

                            {{csrf_field()}}
                            <button  type="submit" value="" class="btn btn-success">Create Class</button>
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
        $(document).on('click' , '.add' , function (e) {

            e.preventDefault();
            var books = $("#books");
            var element = '<div class="form-group">'+
                            '<div class="col-md-6">'+
                                '<input type="text"  required name="books[]" class="form-control"  placeholder="Enter book name ">'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<button style="margin-right: 5px" class="add btn btn-success"> Add </button>'+
                                '<button class="delete btn btn-danger"> Delete </button>'+
                            '</div>'+
                            '</div>'+
                            '<div class="clear10"></div>';
            books.append(element);
        });

        $(document).on('click' , '.delete' , function (e) {
            e.preventDefault();
            $(this).closest('.form-group').remove();
            console.log($(this).parent('.form-group'));
        });

    })

</script>
@endsection