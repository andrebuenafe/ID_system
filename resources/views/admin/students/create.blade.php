@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="float-start">NEW STUDENT</h3>
        <a href="{{ route('students.index') }}" class="float-end">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
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

                <div class="form-group col-md-12">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" required
                        value="{{ old('address') }}">
                </div>



                <div class="form-group col-md-6">
                    <label for="school_id">School ID</label>
                    <input type="text" class="form-control" id="school_id" placeholder="School ID" name="school_id"
                        required value="{{ old('school_id') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="course">Course</label>
                    <select name="course" id="course" class="form-control">
                        <option value="" selected disabled>Select a Course</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BEED">BEED</option>
                        <option value="BSED-Math">BSED-MATH</option>
                        <option value="BSED-SS">BSED-SS</option>
                        <option value="addNewCourse">Add New Course</option>
                    </select>
                    <input type="text" name="new_course" id="new_course" class="form-control mt-2 text-uppercase" placeholder="Enter New Course" style="display: none;">
                    <input type="hidden" id="selected_course_color" name="selected_course_color" />
                </div>

                <div class="form-group col-md-6">
                    <label for="course_color">Course Color</label>
                    <input type="text" class="form-control" id="course_color" name="course_color" />
                </div>

                <div class="form-group col-md-6">
                    <label for="parents_name">Emergency Contact Name</label>
                    <input type="text" class="form-control" id="parentsname" placeholder="Emergency Contact Name" name="parentsname"
                        required value="{{ old('parentsname') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="em_contact">Emergency Contact Number</label>
                    <input type="text" class="form-control" id="emcontact" placeholder="Emergency Contact Number" name="emcontact"
                        required value="{{ old('emcontact') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="bday">Date of Birth</label>
                    <input type="date" class="form-control" id="bday" placeholder="Date of Birth" name="bday"
                        required value="{{ old('bday') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="sy_started">School Year</label>
                    <input type="text" class="form-control" id="sy_started" placeholder="School Year" name="sy_started"
                        required value="{{ old('sy_started') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="img">Student Image</label>
                    <input type="file" class="form-control" id="img" placeholder="Image" name="img">

                    @if(isset($students) && $students->img)
                    <img src="{{ asset('storage/' . $students->img) }}" alt="Student Image" style="max-width: 100%">
                @endif
                </div>

                 <div class="form-group col-md-6">
                    <label for="signature">Student Signature</label>
                    <input type="file" class="form-control" id="signature" placeholder="Last Name" name="signature">

                    @if(isset($students) && $students->signature)
                    <img src="{{ asset('storage/' . $students->signature) }}" alt="Signature Image" style="width: 100%">
                @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="qr">QR Code</label>
                    <input type="file" class="form-control" id="qr" placeholder="QR Code" name="qr">

                    @if(isset($students) && $students->qr)
                    <img src="{{ asset('storage/' . $students->qr) }}" alt="QR Image" style="max-width: 100%">
                @endif
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


<script>
    $(document).ready(function(){
        $("#course").change(function(){
            if($(this).val() === "addNewCourse"){
                $("#new_course").show();
            } else {
                $("#new_course").hide();
            }
        });
    });
</script>

    <!-- Spektrum Color Changer Script -->
<script>
        $(document).ready(function () {
            // Initialize Spectrum color picker
            $("#course_color").spectrum({
                preferredFormat: "hex",
                showInput: true,
                showPalette: true,
                palette: [
                    ["#ff914d", "#4d79ff", "#009900", "#990099", "#ffff00", "#993333", "#ddddbb"],
                    // Add more colors if needed
                ],
                change: function(color) {
                    $("#selected_course_color").val(color.toHexString());
                }
            });

            $("#course").change(function () {
                if ($(this).val() === "addNewCourse") {
                    $("#new_course").show();
                } else {
                    $("#new_course").hide();
                    // Set the default color or the predefined color based on the selected course
                    $("#course_color").spectrum("set", getCourseColor($(this).val()));
                }
            });

            // Function to get the course color
            function getCourseColor(course) {
                // Define default color or use the predefined color based on the selected course
                var defaultColor = '#cccccc';
                var courseColors = {
                    'BSIT': '#ff914d',
                    'BEED': '#4d79ff',
                    'BSED-Math': '#009900',
                    'BSED-SS': '#990099',
                    'BSBA': '#ffff00',
                    'MARINE': '#993333',
                    'HM': '#ddddbb',
                };

                return courseColors[course] || defaultColor;
            }
        });
</script>

@endsection
