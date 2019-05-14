@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Companies</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <a href="/companies/create" class="nav-link">
                    <button type="submit" class="btn btn-dark">Add Company</button>
                </a>
            </div>
        </div>
        <table id="table_companies" class="display w-100">
            <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Employees</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td><img src="/storage/companies/{{$company->logo}}" class="img-fluid" alt="image"></td>
                    <td><a href="/companies/{{$company->id}}/edit" class="nav-link">{{$company->name}}</a></td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->website}}</td>
                    <td><a href="{{$company->id}}/"><i class="fas fa-users ml-5 h5"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection