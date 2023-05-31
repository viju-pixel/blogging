@extends('layouts.auth')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('portfolio.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-responsive" >
                <tr>
                    <th>ID</th>
                    <td>{{$portfolio->id}}</td>
                </tr>
                <tr>
                    <th>Category Name</th>
                    <td>{{ $portfolio->portfolio_category }}</td>
                </tr>
              
               
                <tr>
                    <th>portfolio Image</th>
                    <td><img src="/uploads/portfolio/{{ $portfolio->portfolio_image }}" width="80px"  height="70px"></td>
                </tr>

                <tr>
                    <th>Title</th>
                    <td>{{$portfolio->title}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$portfolio->description}}</td>
                </tr>
               
            </table>
        </div>
    </div>
    @endsection