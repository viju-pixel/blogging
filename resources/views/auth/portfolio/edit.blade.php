@extends('layouts.auth')

@section('styles')
<link href="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Contact</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('auth/portfolio') }}"> Back</a>
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
   
<form action="{{ route('portfolio.update',$portfolio->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" value="{{$portfolio->title}}">
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" >{{$portfolio->description}}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select  name="portfolio_category" class="form-control">
                    <option value=""  disabled selected>Choose Option</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->name }}"
                    @if ($portfolio->portfolio_category == $category->name) {{ 'selected' }} 
                    @endif> {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tags:</strong>
                <select id="" name="tags[]" multiple class="form-control" >
                    <option value=""  disabled selected>Choose Options</option>
                   @foreach($tags as $tag)
                   <option value="{{$tag->name}}" 
                   @if($portfolio->tags == $tag->name) {{ 'selected' }} 
                   @endif> {{ $tag->name }} </option>
                   @endforeach
                </select>
            </div>
        </div>
       

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Portfolio Image:</strong>
                <input type="file" name="portfolio_image"  class="form-control"  value="{{$portfolio->portfolio_image}}"/>
                <img src="{{asset('uploads/portfolio/'.$portfolio->portfolio_image)}}" alt="" srcset="" height="70px" width="80px">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

@endsection

 