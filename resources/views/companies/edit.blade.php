@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-3">
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
                                <img src="/storage/companies/{{$company->logo}}" class="img-fluid" alt="" width="50"
                                     height="50"><br>
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
                <hr class="mt-5">
                <span class="h5 text-center">Delete the company?</span><br>
                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteCompanyModal">
                    Delete!
                </button>
                <hr>
                <form method="post" action="/companies/{{$company->id}}">
                    @csrf
                    @method('DELETE')
                    <div class="modal fade" id="deleteCompanyModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content bg-danger">
                                <div class="modal-header ">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Do you want to delete the company?<br>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning">Delete</button>
                                </div>
                                <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop