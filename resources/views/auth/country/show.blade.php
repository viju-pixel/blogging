@extends('admin.layouts.app')
@section('title') Show Country @endsection
@section('content')
<div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-row-reverse justify-content-end mb-4 pb-2 gap-4">
                <h1 class="page-title">Show Country</h1>
                <a class="btn btn-secondary" href="{{route('admin.user-management.country.index')}}">
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
            <table class="table table-bordered table-responsive" aria-describedby="country-detail">
                <tr>
                    <th>ID</th>
                    <td>{{$country->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$country->name}}</td>
                </tr>
                <tr>
                    <th>Nice Name</th>
                    <td>{{$country->nice_name}}</td>
                </tr>
                <tr>
                    <th>Iso</th>
                    <td>{{$country->iso}}</td>
                </tr>
                <tr>
                    <th>Iso3</th>
                    <td>{{$country->iso3}}</td>
                </tr>
                <tr>
                    <th>Num Code</th>
                    <td>{{$country->num_code}}</td>
                </tr>
                <tr>
                    <th>Phone Code</th>
                    <td>{{$country->phone_code}}</td>
                </tr>
                <tr>
                    <th>Create at</th>
                    <td>{{$country->created_at->format('j F Y')}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$country->updated_at->format('j F Y')}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
