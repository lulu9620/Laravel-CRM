@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <span class="h2">Edit "{{$company->name}}" company</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="/companies/{{$company->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Company Name:</label>
                        <input class="form-control" id="name" name="name" value="{{$company->name}}">
                        <label for="email">Email address:</label>
                        <input class="form-control" id="email" name="email" value="{{$company->email}}">
                        <label for="website">Website:</label>
                        <input type="text" class="form-control" id="website" name="website"
                               value="{{$company->website}}">
                        @if($company->logo)
                            <label class="mb-2" for="logo">Logo:</label><br>
                            <div class="col-lg-6">
                                <img src="/storage/companyLogo/{{$company->logo}}" class="img-fluid" alt="" width="80"
                                     height="80"><br>
                            </div>
                        @else
                            <label for="changeLogo">Add Logo :</label>
                            <input type="file" name="logo" class="form-control-file"/>
                        @endif
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{$error}}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark ">Send!</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 text-center">
                <form method="post" action="/companies/{{$company->id}}">
                    @csrf
                    @method('DELETE')
                    <hr class="mt-5">
                    <span class="h5 text-center">Do you want to delete the company? </span><br>
                    <button type="submit" class="btn btn-danger">Delete!</button>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@stop