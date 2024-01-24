@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-start">EDITING STUDENT</h3>
            <a href="{{ route('users.index') }}" class="float-end">
                <button type="button" class="btn btn-primary">Back</button>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Administrator</option>
                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Staff</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Update User</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
            </form>
        </div>
    </div>
@endsection
