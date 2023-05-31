@extends('layouts.auth')

@section('styles')
<link href="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Resume</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('auth/resume') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ url('auth/resume/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
                @if($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="number"  name="phone" class="form-control" placeholder="+91 9987654321">
                @if($errors->has('phone'))
                <p class="text-danger">{{$errors->first('phone')}}</p>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email">
                @if($errors->has('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Message:</strong>
                <textarea class="form-control" style="height:150px" name="message" placeholder=" Type Message"></textarea>
            </div>
            @if($errors->has('message'))
                <p class="text-danger">{{$errors->first('message')}}</p>
                @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position:</strong>
                <select  name="position" class="form-control">
                    <option value=""  disabled selected>Choose Options</option>
                   @foreach($categories as $category)
                   <option value="{{$category->name}}">{{$category->name}}</option>
                   @endforeach
                </select>
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

@endsection

 