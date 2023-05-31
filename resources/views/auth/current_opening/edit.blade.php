@extends('layouts.auth')

@section('styles')
<link href="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Current Opening</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('current_opening.index') }}"> Back</a>
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
   
<form action="{{ route('current_opening.update',$currentOpening->id) }}" method="POST" >
    @csrf
    @method('PUT') 
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job Title:</strong>
                <input type="text" name="title" class="form-control" value="{{ $currentOpening->title}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job Description:</strong>
                <textarea class="form-control ckeditor" style="height:100px" name="description" >{{ $currentOpening->description}}</textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

@endsection
@section('scripts')
<script src="{{asset('assets/auth/plugins/apexcharts/apexcharts.js')}}"></script> 
<script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
       
    });
</script>
@endsection
 