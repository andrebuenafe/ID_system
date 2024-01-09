@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        New User
    </div>
    <form action="{{ route('users.store') }}" id="users-save-form" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                        required value="{{ old('name') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required
                        value="{{ old('email') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="" selected disabled>Select a Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Staff</option>
                    </select>
                </div>


                <div class="form-group col-md-6">
                    <label for="temp_password">Temporary Password</label>
                    <input type="text" class="form-control" id="temp_password" placeholder="Temporary Password"
                        name="temp_password" required value="{{ old('temp_password') }}">
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="p-0 m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <button type="submit" id="save_btn" class="btn btn-success btn-sm">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
        </div>
    </form>
</div>
@endsection
