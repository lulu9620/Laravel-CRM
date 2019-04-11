@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <span class="h2">Add Company</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="/companies" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Company Name:</label>
                        <input class="form-control" id="name" name="name" placeholder="Company name...">
                        <label for="email">Email address:</label>
                        <input class="form-control" id="email" name="email" placeholder="company@domain.com">
                        <label for="website">Website:</label>
                        <input type="text" class="form-control" id="website" name="website"
                               placeholder="www.mycompany.com">
                    </div>
                    <div class="form-group">
                        <label for="logo">Add logo:</label>
                        <input type="file" name="logo" class="form-control-file">
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{$error}}
                            @endforeach
                    </div>
                    @endif
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark ">Send!</button>
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