@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Employees</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 mb-3">
                <a href="/employees/create">
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table id="table_employees" class="display w-100">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->first_name}}</td>
                            <td>{{$employee->last_name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>
                                <a href="employees/{{$employee->id}}/edit">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-user-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteEmployeeModal"><i class="fas fa-user-times"></i></button>
                                <form method="post" action="/employees/{{$employee->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content bg-danger">
                                                <div class="modal-header">
                                                    <h5>Delete employee</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete the employee?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop