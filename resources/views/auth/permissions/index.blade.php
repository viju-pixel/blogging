@extends('layouts.auth')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Contact</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Contact</a>
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
            <th>Slug</th>
            <th width="310px">Action</th>
        </tr>
        @foreach ($permissions as $permission)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $permission ->name }}</td>
            <td>{{ $permission ->slug }}</td>
     
            <td>
                <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{!!$permissions->links()!!}}
    
@endsection
