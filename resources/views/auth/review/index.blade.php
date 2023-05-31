@extends('layouts.auth')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Review</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('review.create') }}"> Create New Review</a>
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
            <th>Name</th>
            <th>Email</th>
            <th>Description</th>
            <th width="310px">Action</th>
        </tr>
        @foreach ($reviews as $review)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $review ->name }}</td>
            <td>{{ $review ->email }}</td>
            <td>{{ $review ->description }}</td>
            <td>
                <form action="{{ route('review.destroy',$review->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('review.show',$review->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('review.edit',$review->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
   
       

@endsection
