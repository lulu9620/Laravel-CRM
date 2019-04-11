@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><span class="h2">Companies</span></div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <a href="/companies/create">
                    <button type="submit" class="btn btn-dark">Add Company</button>
                </a>
            </div>
        </div>
        @foreach($companies as $company)
            <div class="row companies text-center">
                <div class="col-lg-1">
                    <label style="margin-bottom: 2rem!important;" for="logo">Logo:</label><br>
                    <img src="/storage/companyLogo/{{$company->logo}}" class="img-fluid" alt="" width="80" height="80"
                         style="margin-top: -20px">
                </div>
                <div class="col-lg-4">
                    <label style="margin-bottom: 2rem!important;" for="company">Company Name:</label><br>
                    <span class="h5" id="company"><a
                                href="/companies/{{$company->id}}/edit">{{$company->name}}</a></span>
                </div>
                <div class="col-lg-2 text-center">
                    <label style="margin-bottom: 2rem!important;" for="companyEmail">Company Email:</label><br>
                    <span class="h5" id="companyEmail">{{$company->email}}</span>
                </div>
                <div class="col-lg-2 text-center">
                    <label style="margin-bottom: 2rem!important;" for="website">Website:</label><br>
                    <span class="h5 mt-3" id="website">{{$company->website}}</span>
                </div>
                <div class="col-lg-1">
                    <label style="margin-bottom: 2rem!important;" for="website">Employees:</label><br>
                    <a href="/companies/{{$company->id}}"><i class="fas fa-users" style="font-size:25px"></i></a>
                </div>
            </div>
        @endforeach
        <div class="row  text-center">
            <div class="col-lg-12">
                {!! $companies->links() !!}
            </div>
        </div>
    </div>
@endsection