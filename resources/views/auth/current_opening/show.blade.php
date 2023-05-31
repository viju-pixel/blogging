@extends('layouts.auth')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Current Opening</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('current_opening.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="lg-col-6 col-6">
            <table class="table table-bordered table-responsive" >
                <tr>
                    <th>ID</th>
                    <td>{{$currentOpening->id}}</td>

                </tr>
                <tr>
                    <th>Created By Name</th>
                    <td>{{$currentOpening->name}}</td>
                </tr>
                <tr>
                    <th>Job Title</th>
                    <td>{{$currentOpening->title}}</td>
                </tr>
               
                <tr>
                    <th>Job Description</th>
                    <td>{!! html_entity_decode($currentOpening->description) !!}</td>
                </tr>
               
            </table>
        </div>
    </div>
    @endsection