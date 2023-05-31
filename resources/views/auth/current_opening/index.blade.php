@extends('layouts.auth')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Current Opening</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('current_opening.create') }}"> Create New Current Opening</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Created By Name</th>
            <th>Job Title</th>
            <th>Job Description</th>
            <th width="310px">Action</th>
        </tr>
        @foreach ($openings as $opening)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $opening ->name }}</td>
            <td>{{ $opening ->title }}</td>
            <td>{!!  html_entity_decode ($opening ->description ) !!}</td>
            <td>
                <form action="{{ route('current_opening.destroy',$opening->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('current_opening.show',$opening->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('current_opening.edit',$opening->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
@endsection
