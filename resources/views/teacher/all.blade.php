@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="container">
        {{dd($teachers)}}
        <div class="clear20"></div>
        <div class="view_std_area">
            <div class="std-filters">
                <div class="col-md-2">
                    <select name="year" class="form-control">
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="month" class="form-control">
                        <option value="jan">January</option>
                        <option value="feb">February</option>
                        <option value="march">March</option>
                        <option value="apr">April</option>
                    </select>
                </div>
            </div>
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone No</th>
                    <th>Desgination</th>
                    <th>CNIC NO</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td>M.Kashif</td>
                    <td>Ali</td>
                    <td>03314362242</td>
                    <td>Teacher</td>
                    <td>35403-22564873</td>
                    <td><a href="view_staff_details.html" title="View"><i class="fa fa-eye"></i> </a>
                        <a href="#" title="Edit"><i class="fa fa-pencil"></i> </a>
                        <a href="#" title="Block"><i class="fa fa-ban"></i> </a>
                        <a href="#" title="Unblock"><i class="fa fa-unlock"></i> </a>
                        <a href="#" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>

@endsection

@section('js')

@endsection()