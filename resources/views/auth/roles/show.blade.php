@extends('admin.layouts.app')
@section('title') Show Role @endsection
@section('content')
<div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-row-reverse justify-content-end mb-4 pb-2 gap-4">
                <h1 class="page-title">Show Role</h1>
                <a class="btn btn-secondary" href="{{route('admin.user-management.roles.index')}}">
                    {{-- Back Sign svg --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    <span>Back</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-responsive" aria-describedby="roles-details">
                <tr>
                    <th>ID</th>
                    <td>{{$role->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$role->name}}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{$role->slug}}</td>
                </tr>
                <tr>
                    <th>Create at</th>
                    <td>{{$role->created_at->format('j F Y')}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$role->updated_at->format('j F Y')}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
