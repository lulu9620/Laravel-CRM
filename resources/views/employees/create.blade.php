@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <span class="h2">Add Employee</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="/employees" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input class="form-control" id="first_name" name="first_name" placeholder="First name...">
                        <label for="last_name">Last Name:</label>
                        <input class="form-control" id="last_name" name="last_name" placeholder="Last name...">
                        <label for="email">Email address:</label>
                        <input class="form-control" id="email" name="email" placeholder="myName@domain.com">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="07xx-xxx-xxx">
                        <label for="company">Select the company:</label>
                        <select class="form-control" id="company" name="company_id">
                            <option value="default" selected>Select a company</option>
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{$error}}<br>
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