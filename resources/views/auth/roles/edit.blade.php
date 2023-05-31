@extends('admin.layouts.app')
@section('title') Edit Role @endsection
@section('content')
<div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-row-reverse justify-content-end mb-4 pb-2 gap-4">
                <h1 class="page-title">Edit Role</h1>
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
    <form class="row" action="{{route('admin.user-management.roles.update', $role->id)}}" method="POST" enctype="multipart/form-data">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="form-label">Role Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}" required />
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('event_url') ? 'has-error' : '' }}">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{ $role->slug }}" required />
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="permissions" class="form-label">Permissions</label>
                        <select class="role-permissions form-control" id="permissions" name="permissions[]" multiple="multiple">
                            @foreach ($permissions as $permission)
                                <option value="{{$permission->id}}" {{ (in_array($permission->id, old('permissions', [])) || isset($role) && $role->permissions->contains($permission->id)) ? 'selected' : '' }}>{{$permission->name}}</option>
                            @endforeach
                        </select>
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
                            <input class="add_page_button btn btn-primary" type="submit" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
@parent
<script type="text/javascript">
    jQuery(function ($) {
        $('.role-permissions').select2({
            placeholder: 'Permissions',
            allowClear: true
        });
    });
</script>
@endsection
