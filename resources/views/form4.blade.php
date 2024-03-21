<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>merchant onboarding form </title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="modal d-block modal-lg" tabindex="-1" style="background: linear-gradient(10deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) -5%, rgba(0, 212, 255, 1) 100%);">

            <div class="modal-dialog">

                <div class="modal-content">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title"><img width="220px" src="{{asset('images/logo.png')}}" alt="Logo"></h5>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="myForm" method="post" action="{{ route('verificationFormSubmit') }}" enctype="multipart/form-data">
                            @csrf

                           
                          
                           
                           
                           
                           
                           <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Enter Email</label>
                                <input type="text" class="form-control" id="inputEmail" name="email" value="@if(session('email')){{session('email')}}@endif">
                            </div>
                           
                           <div class="col-md-6">
                                <label for="inputName" class="form-label">Enter Full Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Full Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirmName" class="form-label">Enter Firm Name</label>
                                <input type="text" class="form-control" id="inputFirmName" name="firm_name" placeholder="Enter Firm Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPincode" class="form-label">Enter Pincode</label>
                                <input type="text" class="form-control" id="inputPincode" name="pincode" placeholder="Enter Pincode">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDob" class="form-label">Select DOB</label>
                                <input type="date" class="form-control" id="inputDob" name="dob" placeholder="Enter Dob">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Select State</label>
                                <select id="inputState" name="state" class="form-select">
                                    <option value="">--Select State*--</option>
                                    <option value="ANDAMAN &amp; NICOBAR ISLANDS">ANDAMAN &amp; NICOBAR ISLANDS</option>
                                    <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                    <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                    <option value="ASSAM">ASSAM</option>
                                    <option value="Ballia">Ballia</option>
                                    <option value="Barmer">Barmer</option>
                                    <option value="BIHAR">BIHAR</option>
                                    <option value="CHANDIGARH">CHANDIGARH</option>
                                    <option value="CHATTISGARH">CHATTISGARH</option>
                                    <option value="DADRA &amp; NAGAR HAVELI">DADRA &amp; NAGAR HAVELI</option>
                                    <option value="DAMAN &amp; DIU">DAMAN &amp; DIU</option>
                                    <option value="DELHI">DELHI</option>
                                    <option value="GOA">GOA</option>
                                    <option value="GUJARAT">GUJARAT</option>
                                    <option value="HARYANA">HARYANA</option>
                                    <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                                    <option value="Imphal H.O">Imphal H.O</option>
                                    <option value="JAMMU &amp; KASHMIR">JAMMU &amp; KASHMIR</option>
                                    <option value="JHARKHAND">JHARKHAND</option>
                                    <option value="KARNATAKA">KARNATAKA</option>
                                    <option value="KERALA">KERALA</option>
                                    <option value="LAKSHADWEEP">LAKSHADWEEP</option>
                                    <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                    <option value="MAHARASHTRA">MAHARASHTRA</option>
                                    <option value="MANIPUR">MANIPUR</option>
                                    <option value="MEGHALAYA">MEGHALAYA</option>
                                    <option value="MIZORAM">MIZORAM</option>
                                    <option value="NAGALAND">NAGALAND</option>
                                    <option value="NULL">NULL</option>
                                    <option value="ODISHA">ODISHA</option>
                                    <option value="PONDICHERRY">PONDICHERRY</option>
                                    <option value="PUNJAB">PUNJAB</option>
                                    <option value="RAJASTHAN">RAJASTHAN</option>
                                    <option value="SIKKIM">SIKKIM</option>
                                    <option value="TAMIL NADU">TAMIL NADU</option>
                                    <option value="TELANGANA">TELANGANA</option>
                                    <option value="TRIPURA">TRIPURA</option>
                                    <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                                    <option value="UTTARAKHAND">UTTARAKHAND</option>
                                    <option value="Varanasi">Varanasi</option>
                                    <option value="WEST BENGAL">WEST BENGAL</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputType" class="form-label">Select Type</label>
                                <select id="inputType" name="type" class="form-select">
                                    <option value="">--Select Type*--</option>
                                    <option value="aadhar">Aadhar</option>
                                    <option value="without_aadhar">Without Aadhar</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Enter Address</label>
                                <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Enter Address">
                            </div>
                            <div class="col-md-6" id="pancardImgField" style="display: none;">
                                <label for="inputPanCardImg" class="form-label">Enter Pan Card Image</label>
                                <input type="file" class="form-control" name="pancardImg" id="inputPanCardImg">
                            </div>

                            <div class="col-md-6" id="aadharFields" style="display: none;">
                                <label for="inputAadhar" class="form-label">Enter Aadhar Number</label>
                                <input type="text" class="form-control" name="aadhar" id="inputAadhar" placeholder="Enter Aadhar Number">
                            </div>
                            <div class="col-md-6" id="pancardFields" style="display: none;">
                                <label for="inputPanCard" class="form-label">Enter Pan Card Number</label>
                                <input type="text" class="form-control" name="pancard" id="inputPanCard" placeholder="Enter Pan Card Number">
                            </div>

                            <div class="col-md-6" id="aadharFrontImgField" style="display: none;">
                                <label for="inputAadharFrontImg" class="form-label">Enter Aadhar Front Image</label>
                                <input type="file" class="form-control" name="aadharFimg" id="inputAadharFrontImg">
                            </div>
                            <div class="col-md-6" id="aadharBackImgField" style="display: none;">
                                <label for="inputAadharBackImg" class="form-label">Enter Aadhar Back Image</label>
                                <input type="file" class="form-control" name="aadharBimg" id="inputAadharBackImg">
                            </div>
                            <div class="col-md-6" id="driving" style="display: none;">
                                <label for="inputDriving" class="form-label">Enter Driving Lic</label>
                                <input type="text" class="form-control" placeholder="Enter Driving Lic" name="driving" id="inputDriving">
                            </div>
                            <div class="col-md-6" id="drivingFrontImgField" style="display: none;">
                                <label for="inputDrivingFrontImg" class="form-label">Enter Driving Lic Front Image</label>
                                <input type="file" class="form-control" name="drivingFimg" id="inputDrivingFrontImg">
                            </div>
                            <div class="col-md-6" id="drivingBackImgField" style="display: none;">
                                <label for="inputDrivingBackImg" class="form-label">Enter Driving Lic Back Image</label>
                                <input type="file" class="form-control" name="drivingBimg" id="inputDrivingBackImg">
                            </div>
                            <div class="col-md-6" id="voterID" style="display: none;">
                                <label for="inputVoterID" class="form-label">Enter Voter ID</label>
                                <input type="text" class="form-control" placeholder="Enter Voter ID" name="voterID" id="inputVoterID">
                            </div>
                            <div class="col-md-6" id="VoterIDFrontImgField" style="display: none;">
                                <label for="inputVoterIDFrontImg" class="form-label">Enter Voter ID Front Image</label>
                                <input type="file" class="form-control" name="voterIDFimg" id="inputVoterIDFrontImg">
                            </div>
                            <div class="col-md-6" id="VoterIDBackImgField" style="display: none;">
                                <label for="inputVoterIDBackImg" class="form-label">Enter Voter ID Back Image</label>
                                <input type="file" class="form-control" name="voterIDBimg" id="inputVoterIDBackImg">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('inputType').addEventListener('change', function() {
            var selectedType = this.value;
            var aadharFields = document.getElementById('aadharFields');
            var aadharFrontImgField = document.getElementById('aadharFrontImgField');
            var aadharBackImgField = document.getElementById('aadharBackImgField');
            var pancardFields = document.getElementById('pancardFields');
            var pancardImgField = document.getElementById('pancardImgField');
            var drivingFrontImgField = document.getElementById('drivingFrontImgField');
            var drivingBackImgField = document.getElementById('drivingBackImgField');
            var VoterIDFrontImgField = document.getElementById('VoterIDFrontImgField');
            var VoterIDBackImgField = document.getElementById('VoterIDBackImgField');
            var voterID = document.getElementById('voterID');
            var driving = document.getElementById('driving');

            if (selectedType === 'aadhar') {
                aadharFields.style.display = 'block';
                aadharFrontImgField.style.display = 'block';
                aadharBackImgField.style.display = 'block';
                pancardFields.style.display = 'block';
                pancardImgField.style.display = 'block';
                drivingFrontImgField.style.display = 'none';
                drivingBackImgField.style.display = 'none';
                VoterIDFrontImgField.style.display = 'none';
                VoterIDBackImgField.style.display = 'none';
                driving.style.display = 'none';
                voterID.style.display = 'none';
            } else if (selectedType === 'without_aadhar') {
                aadharFields.style.display = 'none';
                aadharFrontImgField.style.display = 'none';
                aadharBackImgField.style.display = 'none';
                pancardFields.style.display = 'block';
                pancardImgField.style.display = 'block';
                drivingFrontImgField.style.display = 'block';
                drivingBackImgField.style.display = 'block';
                VoterIDFrontImgField.style.display = 'block';
                VoterIDBackImgField.style.display = 'block';
                driving.style.display = 'block';
                voterID.style.display = 'block';
            } else {
                aadharFields.style.display = 'none';
                aadharFrontImgField.style.display = 'none';
                aadharBackImgField.style.display = 'none';
                pancardFields.style.display = 'none';
                pancardImgField.style.display = 'none';
                drivingFrontImgField.style.display = 'none';
                drivingBackImgField.style.display = 'none';
                VoterIDFrontImgField.style.display = 'none';
                VoterIDBackImgField.style.display = 'none';
                driving.style.display = 'none';
                voterID.style.display = 'none';
            }
        });
    </script>
    
</body>

</html>