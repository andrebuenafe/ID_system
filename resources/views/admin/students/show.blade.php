@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="float-start">PREVIEW ID</h3>
        <a href="{{ route('students.index') }}" class="float-end">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>
        <div class="card-body p-3" id="canvas-container">
            <div class="id-card-canvas front-side" style="background: url('{{asset("storage/images/")}}{{"/".$student->img}}')">
                <div id="logo-container">
                    <img id="school-logo" src="{{asset('img/MLG LOGO.png')}}" alt="mlg-logo" >
                    <p class="school-name">MLG COLLEGE OF LEARNING, INC.</p>
                    <p class="school-address">Brgy. Atabay, Hilongos</p>
                </div>
                <div id="qr-code">
                    <img src="{{asset('storage/qrs/')}}{{ "/".$student->qr}}" alt="" width="30%">
                </div>
                <div id="signature">
                    <img src="{{asset('storage/signatures/')}}{{"/".$student->signature}}" alt="" width="50%">
                </div>
                <div id="course-color" style="background-color:{{ $student->course_color }}">
                    <div id="student-name">
                        <h2 class="last-name text-uppercase">{{ $student->lname }}</h2>
                        <h3 id="Text-resize"class="first-name text-uppercase">{{ $student->fname }}</h3>

                        <div class="extra-details">
                            <div class="dob">
                                <p class="my-0">Date of Birth:</p>
                                <h4>{{ \Carbon\Carbon::parse($student->bday)->format('m/d/Y') }}</h4>
                            </div>
                            <div class="address">
                                <p>{{ $student->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div id="white-bar">
                        <div class="id-number">
                            {{$student->school_id}}
                        </div>
                        <div class="course-code">
                            {{$student->course}}
                        </div>
                    </div>
                    <div id="id-card-footer">
                        <div class="website">
                            https://mlgcl.edu.ph/
                        </div>
                        <div class="email">
                            mlg@mlgcl.edu.ph
                        </div>
                    </div>
                </div>
            </div>
            <div class="id-card-canvas back-side" style="">
                <div class="validity-table ml-2">
                    <div class="row bg-secondary">
                        <div class="col-3">
                            <div class="row bg-secondary" style="display: flex;flex-direction: column;align-items: stretch;">
                                <div class="border pl-4 text-uppercase" style="flex: 0 0 32px;display: flex;align-items: center;">
                                    Semester
                                </div>
                                <div class="border pl-4 text-uppercase">
                                    First
                                </div>
                                <div class="border pl-4 text-uppercase">

                                    Second
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="row bg-secondary">
                                <div class="col-12 border text-center text-uppercase">School Year</div>
                                <div class="col-3 border text-center">{{$student->sy_started}} - {{$student->sy_started+1}}</div>
                                <div class="col-3 border text-center">{{$student->sy_started+1}} - {{$student->sy_started+2}}</div>
                                <div class="col-3 border text-center">{{$student->sy_started+2}} - {{$student->sy_started+3}}</div>
                                <div class="col-3 border text-center">{{$student->sy_started+3}} - {{$student->sy_started+4}}</div>
                            </div>
                            <div class="row bg-secondary">
                                <div class="col-3 border" id="year-1" style="color: #858796">1</div>
                                <div class="col-3 border" id="year-2" style="color: #858796">2</div>
                                <div class="col-3 border" id="year-3" style="color: #858796">3</div>
                                <div class="col-3 border" id="year-4" style="color: #858796">4</div>
                            </div>
                            <div class="row bg-secondary">
                                <div class="col-3 border" id="year-1" style="color: #858796">1</div>
                                <div class="col-3 border" id="year-2" style="color: #858796">2</div>
                                <div class="col-3 border" id="year-3" style="color: #858796">3</div>
                                <div class="col-3 border" id="year-4" style="color: #858796">4</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row back-side-blurb text-center">

                    <div class="offset-3 col-9 text-dark px-3">

                        <div class="certify-box mt-3 px-1">
                            This is to certify that the person whose picture and signature appear herein is a bonafide student of<br><strong>MLG College of Learning, Inc.</strong>
                        </div>
                        <div class="director-signature mt-3">
                            <img src="" alt="" class="e-signature">
                            <h6 class="mb-0" id="director-name"><strong>MARY LILIBETH O. YAN, DevEdD</strong></h6>
                            <p class="mb-0"><small>School Director</small></p>
                        </div>
                        <div class="important-reminders mt-2">
                            <h6 class="text-uppercase mb-0"><strong>Important Reminders</strong></h6>
                            <p class="mb-0">Always wear this ID while inside the school campus.</p>
                            <p class="mb-0 font-weight-bold">Do not forget your <br>STUDENT ID NUMBER.</p>
                        </div>
                        <div class="if-lost-box mt-2">
                            <small>If lost and found, please surrender this ID to the</small>
                            <p class="mb-0 text-uppercase font-weight-bold">Student Affairs Office,</p>
                            <p class="mb-0">MLG College of Learning, Inc</p>
                            <p class="mb-0">Brgy. Atabay, Hilongos, Leyte</p>
                        </div>
                        <div class="emergency-contact mt-2">
                            <strong>In case of emergency, please contact</strong>
                            <h5 class="mb-0 text-uppercase"><strong>{{$student->parents_name}}</strong></h5>
                            <h5 class="mb-0"><strong>{{$student->em_contact}}</strong></h5>
                        </div>
                        <div class="qr-scan-box bg-secondary text-uppercase text-white p-2 m-2">

                            <small>Please scan the QR Code at the Front for more validation & Contact Information.</small>

                        </div>
                    </div>
                </div>
                <div class="back-side-footer bg-secondary text-center py-1">
                    https://www.facebook.com/mlgcl
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            function updateFontSize() {
                var $element = $('#Text-resize'); // The name ID

                // Get the text content and remove extra spaces
                var text = $element.text().replace(/\s+/g, ' ').trim();

                // Set the font size based on the length of the text
                $element.css('font-size', text.length === 18 ? '15px' : '15px');
            }

            // Call the function initially and whenever the content changes
            updateFontSize();
            $('#Text-resize').on('input', updateFontSize);
        });
    </script>
 @include('admin.students._datatables-script')

@endsection
