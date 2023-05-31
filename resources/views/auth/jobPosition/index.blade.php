@extends('layouts.auth')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('position.create') }}"> Create New Job Position</a>
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
            <th>Job Position Name</th>
            <th width="310px">Action</th>
        </tr>
        @foreach ($positions as $position)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $position->name }}</td>
            <td>
                <form action="{{ route('position.destroy',$position->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('position.show',$position->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('position.edit',$position->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
       
        @endforeach
       
    </table>

    <div> {!! $positions->links() !!}</div>
@endsection
