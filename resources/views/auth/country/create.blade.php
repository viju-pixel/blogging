@extends('admin.layouts.app')
@section('title') Create Country @endsection
@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex flex-row-reverse justify-content-end mb-4 pb-2 gap-4">
                <h1 class="page-title">Add New Country</h1>
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
    <form class="row" action="{{route('admin.user-management.country.store')}}" method="POST" enctype="multipart/form-data">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name" required />
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nice_name') ? 'has-error' : '' }}">
                        <label for="nice_name" class="form-label">Nice name</label>
                        <input type="text" id="nice_name" name="nice_name" class="form-control" value="{{ old('nice_name') }}" placeholder="Nice Name" required />
                        @if($errors->has('nice_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('nice_name') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('iso') ? 'has-error' : '' }}">
                        <label for="iso" class="form-label">Iso</label>
                        <input type="text" id="iso" name="iso" class="form-control" value="{{ old('iso') }}" placeholder="Iso" required />
                        @if($errors->has('iso'))
                        <em class="invalid-feedback">
                            {{ $errors->first('iso') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('iso3') ? 'has-error' : '' }}">
                        <label for="iso3" class="form-label">Iso3</label>
                        <input type="text" id="iso3" name="iso3" class="form-control" value="{{ old('iso3') }}" placeholder="Iso3" required />
                        @if($errors->has('iso3'))
                        <em class="invalid-feedback">
                            {{ $errors->first('iso3') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('phone_code') ? 'has-error' : '' }}">
                        <label for="phone_code" class="form-label">Phone code</label>
                        <input type="number" id="phone_code" name="phone_code" class="form-control" value="{{ old('phone_code') }}" placeholder="Phone Code" required />
                        @if($errors->has('phone_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('phone_code') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('num_code') ? 'has-error' : '' }}">
                        <label for="num_code" class="form-label">Num Code</label>
                        <input type="number" id="num_code" name="num_code" class="form-control" value="{{ old('num_code') }}" placeholder="Num Code" required />
                        @if($errors->has('num_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('num_code') }}
                        </em>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="publish_section">
                        <p>Publish</p>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <input class="add_page_button btn btn-primary" type="submit" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
