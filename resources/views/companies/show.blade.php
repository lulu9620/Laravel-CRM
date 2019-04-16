@extends('layouts.admin')
@section('title')
    Company
@show
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-3">
                <span class="h2">Company: "{{$company->name}}"</span>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                @if(count($company->employees) > 0)
                    <table id="table_employees" class="display" style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email1</th>
                            <th scope="col">Phone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($company->employees as $employee)
                            <tr>
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <span class="h2 text-center">This company has no employees!</span>
                @endif
            </div>
        </div>
    </div>
@endsection