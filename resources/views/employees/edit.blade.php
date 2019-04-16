@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-3">
                <span class="h2">Edit Employee</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="/employees/{{$employee->id}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input class="form-control" id="first_name" name="first_name" value="{{$employee->first_name}}">
                        <label for="last_name">Last Name:</label>
                        <input class="form-control" id="last_name" name="last_name" value="{{$employee->last_name}}">
                        <label for="email">Email address:</label>
                        <input class="form-control" id="email" name="email" value="{{$employee->email}}">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}">
                        <label for="company">This employee work for:</label>
                        <select class="form-control" id="company" name="company_id">
                            @foreach ($companies as $company)
                                @if($company->id == $employee->company_id)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary ">Send!</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 d-flex align-items-center mb-5">
                <hr>
                <span class="h5 text-center">Please complete the fields!!</span>
                <hr>
            </div>
        </div>
    </div>
@stop