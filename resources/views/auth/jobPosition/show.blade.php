@extends('layouts.auth')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Job Position</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('position.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-responsive" >
                <tr>
                    <th>ID</th>
                    <td>{{$position->id}}</td>
                </tr>
               
                <tr>
                    <th>Job position Name</th>
                    <td>{{$position->name}}</td>
                </tr>
               
               
            </table>
        </div>
    </div>
    @endsection