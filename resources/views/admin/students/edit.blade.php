@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Student
    </div>
    <form action="{{ route('students.update', $students->id) }}" id="students-save-form" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname"
                        required value="{{ $students->fname }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="Last_name">Last Name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" required
                        value="{{ $students->lname }}">
                </div>

                <div class="form-group col-md-12">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" required
                        value="{{ $students->address }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="school_id">School ID</label>
                    <input type="text" class="form-control" id="school" placeholder="School ID" name="school"
                        required value="{{ $students->school_id }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="course">Course</label>
                    <select name="course" id="course" class="form-control">
                        <option value="" selected disabled>Select a Course</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BEED">BEED</option>
                        <option value="BSED-Math">BSED-MATH</option>
                        <option value="BSED-SS">BSED-SS</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="parents_name">Emergency Contact Name</label>
                    <input type="text" class="form-control" id="parentsname" placeholder="Emergency Contact Name" name="parentsname"

                        required value="{{ strtoupper($students->parents_name) }}" style="text-transform: uppercase;">
                </div>

                <div class="form-group col-md-6">
                    <label for="em_contact">Emergency Contact Number</label>
                    <input type="text" class="form-control" id="emcontact" placeholder="Emergency Contact Number" name="emcontact"
                        required value="{{ $students->em_contact }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="bday">Date of Birth</label>
                    <input type="date" class="form-control" id="bday" placeholder="Date of Birth" name="bday"
                        required value="{{ $students->bday }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="sy_started">School Year</label>
                    <input type="text" class="form-control" id="sy_started" placeholder="School Year" name="sy_started"
                        required value="{{ $students->sy_started }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="img">Student Image</label>
                    <input type="file" class="form-control" id="img" placeholder="Image" name="img">


                </div>

                 <div class="form-group col-md-6">
                    <label for="signature">Student Signature</label>
                    <input type="file" class="form-control" id="signature" placeholder="Last Name" name="signature">


                </div>
                <div class="form-group col-md-6">
                    <label for="qr">QR Code</label>
                    <input type="file" class="form-control" id="qr" placeholder="QR Code" name="qr">


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
