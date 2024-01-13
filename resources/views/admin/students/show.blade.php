@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fas fa-solid fa-users"></i>
                Print Preview
            </div>
        </div>
    </div>
        <div class="card-body p-3" id="canvas-container">
            
            <div class="id-card-canvas front-side" style="background: url('{{asset("img/sas.jpg")}}')">
                <div id="logo-container">
                    <img id="school-logo" src="{{asset('img/MLG LOGO.png')}}" alt="mlg-logo" >
                    <p class="school-name">MLG COLLEGE OF LEARNING, INC.</p>
                    <p class="school-address">Brgy. Atabay, Hilongos</p>
                </div>
                <div id="qr-code">
                    <img src="{{asset('storage/qrs/MULAR_QRCODE-01-11-2024_21.24.49.png')}}" alt="" width="30%">
                </div>
                <div id="signature">
                    <img src="{{asset('storage/signatures/Caramol-01-11-2024_19.49.06.png')}}" alt="" width="50%">
                </div>
                <div id="course-color" style="background-color: #ff914d">
                    <div id="student-name">
                        <h1 class="last-name">UTRERA</h1>
                        <h3 class="first-name">DENZEL DAVE</h3>
                        <div class="extra-details">
                            <div class="dob">
                                <p class="my-0">Date of Birth:</p>
                                <h4>01/01/01</h4>
                            </div>
                            <div class="address">
                                <p>Brgy. Central, Hilongos</p>
                            </div>
                        </div>
                    </div>
                    <div id="white-bar">
                        <div class="id-number">
                            22-003842
                        </div>
                        <div class="course-code">
                            BSIT
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
                
            </div>
        </div>
    </div>
 @include('admin.students._datatables-script')

@endsection

