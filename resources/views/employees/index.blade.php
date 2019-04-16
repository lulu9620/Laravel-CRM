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
                <table id="table_employees" class="display" style="width: 100%">
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
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="/employees/{{$employee->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-user-times"></i>
                                    </button>
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