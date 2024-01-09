@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        New Student
    </div>
    <form action="{{ route('students.store') }}" id="students-save-form" method="POST" enctype="multipart/form-data">        
        @csrf
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname"
                        required value="{{ old('firstname') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="Last_name">Last Name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" required
                        value="{{ old('lastname') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" required
                        value="{{ old('address') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="qr">QR</label>
                    <input type="file" class="form-control" id="qr" placeholder="QR Code" name="qr" required
                        value="{{ old('qr') }}">
                </div>

                 <div class="form-group col-md-6">
                    <label for="signature">Signature</label>
                    <input type="file" class="form-control" id="signature" placeholder="Last Name" name="signature" required
                        value="{{ old('signature') }}">
                </div> 

                <div class="form-group col-md-6">
                    <label for="school_id">School ID</label>
                    <input type="text" class="form-control" id="school" placeholder="School ID" name="school"
                        required value="{{ old('school') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="course">Course</label>
                    <select name="course" id="course" class="form-control">
                        <option value="" selected disabled>Select a Course</option>
                        <option value="1">BSIT</option>
                        <option value="2">BSED</option>
                        <option value="3">BEED</option>
                    </select>
                </div>

                 <div class="form-group col-md-6">
                    <label for="img">Image</label>
                    <input type="file" class="form-control" id="img" placeholder="Image" name="img"
                        required value="{{ old('img') }}">
                </div> 

                <div class="form-group col-md-6">
                    <label for="parents_name">Parents Name</label>
                    <input type="text" class="form-control" id="parentsname" placeholder="Parents Name" name="parentsname"
                        required value="{{ old('parentsname') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="em_contact">Emergency Contact</label>
                    <input type="text" class="form-control" id="emcontact" placeholder="Emergency Contact" name="emcontact"
                        required value="{{ old('emcontact') }}">
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
            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
        </div>
    </form>
</div>
@endsection
