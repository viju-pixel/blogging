@extends('layouts.auth')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Portfolio</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('auth/portfolio/create') }}"> Create New Portfolio</a>
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
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Tags</th>
            <th>Image</th>
            <th width="310px">Action</th>
        </tr>
        @foreach ($portfolios as $portfolio)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $portfolio ->title }}</td>
            <td>{{ $portfolio ->portfolio_category }}</td>
            <td>{{ $portfolio ->description }}</td>
            <td>{{ $portfolio ->tags }}</td>
            <td><img src="/uploads/portfolio/{{ $portfolio->portfolio_image }}" width="80px"  height="70px"></td>                  
            <td>
                    <form action="{{ route('portfolio.destroy',$portfolio->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ url('auth/portfolio',$portfolio->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('portfolio.edit',$portfolio->id) }}">Edit</a>
   
                    
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach
    </table>
  
    {{!!$portfolios->links()!!}}
@endsection
