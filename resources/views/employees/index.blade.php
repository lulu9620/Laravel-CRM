@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><span class="h2">Employees</span></div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <a href="/employees/create">
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nr.Crt</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
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
                            <td><a href="/employees/{{$employee->id}}/edit">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-user-edit"></i>
                                    </button>
                                </a></td>
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
        <div class="row  text-center">
            <div class="col-lg-12">
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
@stop