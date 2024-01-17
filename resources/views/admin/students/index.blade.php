@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="float-start">STUDENT</h3>
    </div>
        <div class="card-body p-1">
          @if (isset($success))
          <div class="alert alert-success mx-2">
            {{ $success }}
          </div>
        @endif
            <table class="table table-sm table-hover table-striped mb-0" id="students-table">
              <thead>
                <tr>
                  <th scope="col">Action</th>
                  <th scope="col">School ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Course</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
    </div>
 @include('admin.students._datatables-script')
@endsection
