@extends('layouts.auth')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('review.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="lg-col-6 col-6">
            <table class="table table-bordered table-responsive" >
                <tr>
                    <th>ID</th>
                    <td>{{$review->id}}</td>

                </tr>
                <tr>
                    <th> Name</th>
                    <td>{{$review->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$review->email}}</td>
                </tr>
               
                <tr>
                    <th>Description</th>
                    <td>{{$review->description}}</td>
                </tr>
               
            </table>
        </div>
    </div>
    @endsection