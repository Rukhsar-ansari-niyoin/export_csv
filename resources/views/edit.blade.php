<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Export In CSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="modal d-block modal-lg" tabindex="-1">

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
                    <div class="modal-header">
                        <h5 class="modal-title">Sarap Pe</h5>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="myForm" method="post" action="{{ route('update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputName" class="form-label">Enter Full Name</label>
                                <input type="text" class="form-control" id="inputName" value="{{ $data->name }}" name="name" placeholder="Enter Full Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName" class="form-label">Enter Phone Number</label>
                                <input type="text" class="form-control" id="inputNumber" value="{{ $data->phone }}" name="phone" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Enter Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ $data->email }}" placeholder="Enter Email">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPincode" class="form-label">Enter Pincode</label>
                                <input type="text" class="form-control" id="inputPincode" name="pincode" value="{{ $data->pincode }}" placeholder="Enter Pincode">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDob" class="form-label">Select DOB</label>
                                <input type="date" class="form-control" id="inputDob" name="dob" value="{{ $data->dob }}" placeholder="Enter Dob">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Select State</label>
                                <select id="inputState" name="state" value="{{ $data->id }}" class="form-select">
                                    <option value="">--Select State*--</option>
                                    <option {{ $data->state == 'ANDAMAN & NICOBAR ISLANDS' ? 'selected' : '' }} value="ANDAMAN &amp; NICOBAR ISLANDS">ANDAMAN &amp; NICOBAR ISLANDS</option>
                                    <option {{ $data->state == 'ANDHRA PRADESH' ? 'selected' : '' }} value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                    <option {{ $data->state == 'ARUNACHAL PRADESH' ? 'selected' : '' }} value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                    <option {{ $data->state == 'ASSAM' ? 'selected' : '' }} value="ASSAM">ASSAM</option>
                                    <option {{ $data->state == 'Ballia' ? 'selected' : '' }} value="Ballia">Ballia</option>
                                    <option {{ $data->state == 'Barmer' ? 'selected' : '' }} value="Barmer">Barmer</option>
                                    <option {{ $data->state == 'BIHAR' ? 'selected' : '' }} value="BIHAR">BIHAR</option>
                                    <option {{ $data->state == 'CHANDIGARH' ? 'selected' : '' }} value="CHANDIGARH">CHANDIGARH</option>
                                    <option {{ $data->state == 'CHATTISGARH' ? 'selected' : '' }} value="CHATTISGARH">CHATTISGARH</option>
                                    <option {{ $data->state == 'DADRA &amp; NAGAR HAVELI' ? 'selected' : '' }} value="DADRA &amp; NAGAR HAVELI">DADRA &amp; NAGAR HAVELI</option>
                                    <option {{ $data->state == 'DAMAN &amp; DIU' ? 'selected' : '' }} value="DAMAN &amp; DIU">DAMAN &amp; DIU</option>
                                    <option {{ $data->state == 'DELHI' ? 'selected' : '' }} value="DELHI">DELHI</option>
                                    <option {{ $data->state == 'GOA' ? 'selected' : '' }} value="GOA">GOA</option>
                                    <option {{ $data->state == 'GUJARAT' ? 'selected' : '' }} value="GUJARAT">GUJARAT</option>
                                    <option {{ $data->state == 'HARYANA' ? 'selected' : '' }} value="HARYANA">HARYANA</option>
                                    <option {{ $data->state == 'HIMACHAL PRADESH' ? 'selected' : '' }} value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                                    <option {{ $data->state == 'Imphal H.O' ? 'selected' : '' }} value="Imphal H.O">Imphal H.O</option>
                                    <option {{ $data->state == 'JAMMU &amp; KASHMIR' ? 'selected' : '' }} value="JAMMU &amp; KASHMIR">JAMMU &amp; KASHMIR</option>
                                    <option {{ $data->state == 'JHARKHAND' ? 'selected' : '' }} value="JHARKHAND">JHARKHAND</option>
                                    <option {{ $data->state == 'KARNATAKA' ? 'selected' : '' }} value="KARNATAKA">KARNATAKA</option>
                                    <option {{ $data->state == 'KERALA' ? 'selected' : '' }} value="KERALA">KERALA</option>
                                    <option {{ $data->state == 'LAKSHADWEEP' ? 'selected' : '' }} value="LAKSHADWEEP">LAKSHADWEEP</option>
                                    <option {{ $data->state == 'MADHYA PRADESH' ? 'selected' : '' }} value="MADHYA PRADESH">MADHYA PRADESH</option>
                                    <option {{ $data->state == 'MAHARASHTRA' ? 'selected' : '' }} value="MAHARASHTRA">MAHARASHTRA</option>
                                    <option {{ $data->state == 'MANIPUR' ? 'selected' : '' }} value="MANIPUR">MANIPUR</option>
                                    <option {{ $data->state == 'MEGHALAYA' ? 'selected' : '' }} value="MEGHALAYA">MEGHALAYA</option>
                                    <option {{ $data->state == 'MIZORAM' ? 'selected' : '' }} value="MIZORAM">MIZORAM</option>
                                    <option {{ $data->state == 'NAGALAND' ? 'selected' : '' }} value="NAGALAND">NAGALAND</option>
                                    <option {{ $data->state == 'NULL' ? 'selected' : '' }} value="NULL">NULL</option>
                                    <option {{ $data->state == 'ODISHA' ? 'selected' : '' }} value="ODISHA">ODISHA</option>
                                    <option {{ $data->state == 'PONDICHERRY' ? 'selected' : '' }} value="PONDICHERRY">PONDICHERRY</option>
                                    <option {{ $data->state == 'PUNJAB' ? 'selected' : '' }} value="PUNJAB">PUNJAB</option>
                                    <option {{ $data->state == 'RAJASTHAN' ? 'selected' : '' }} value="RAJASTHAN">RAJASTHAN</option>
                                    <option {{ $data->state == 'SIKKIM' ? 'selected' : '' }} value="SIKKIM">SIKKIM</option>
                                    <option {{ $data->state == 'TAMIL NADU' ? 'selected' : '' }} value="TAMIL NADU">TAMIL NADU</option>
                                    <option {{ $data->state == 'TELANGANA' ? 'selected' : '' }} value="TELANGANA">TELANGANA</option>
                                    <option {{ $data->state == 'TRIPURA' ? 'selected' : '' }} value="TRIPURA">TRIPURA</option>
                                    <option {{ $data->state == 'UTTAR PRADESH' ? 'selected' : '' }} value="UTTAR PRADESH">UTTAR PRADESH</option>
                                    <option {{ $data->state == 'UTTARAKHAND' ? 'selected' : '' }} value="UTTARAKHAND">UTTARAKHAND</option>
                                    <option {{ $data->state == 'Varanasi' ? 'selected' : '' }} value="Varanasi">Varanasi</option>
                                    <option {{ $data->state == 'WEST BENGAL' ? 'selected' : '' }} value="WEST BENGAL">WEST BENGAL</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputType" class="form-label">Select Type</label>
                                <select id="inputType" name="type" class="form-select">
                                    <option value="">--Select Type*--</option>
                                    <option value="aadhar" {{ $data->type == 'aadhar' ? 'selected' : '' }}>Aadhar</option>
                                    <option value="without_aadhar" {{ $data->type == 'without_aadhar' ? 'selected' : '' }}>Without Aadhar</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Enter Address" value="{{ $data->address }}">
                            </div>

                            <div id="aadharFields" class="row" @if( $data->type != 'aadhar') style="display: none;" @endif>
                                <div class="col-md-6">
                                    <label for="inputAadhar" class="form-label">Aadhar Number</label>
                                    <input type="text" class="form-control" name="aadhar" id="inputAadhar" placeholder="Enter Aadhar Number" value="{{ $data->aadhar }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPanCard" class="form-label">Pan Card Number</label>
                                    <input type="text" class="form-control" name="pancard" id="inputPanCard" placeholder="Enter Pan Card Number" value="{{ $data->pancard }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPanCardImg" class="form-label">Pan Card Image</label>
                                    <input type="file" class="form-control" name="pancardImg" id="inputPanCardImg">
                                    @if($data->pancardImg)
                                    <img width="100px" src="{{ asset($data->pancardImg) }}" alt="Pan Card Image">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAadharFrontImg" class="form-label">Aadhar Front Image</label>
                                    <input type="file" class="form-control" name="aadharFimg" id="inputAadharFrontImg">
                                    @if($data->aadharFimg)
                                    <img width="100px" src="{{ asset($data->aadharFimg) }}" alt="Aadhar Front Image">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAadharBackImg" class="form-label">Aadhar Back Image</label>
                                    <input type="file" class="form-control" name="aadharBimg" id="inputAadharBackImg">
                                    @if($data->aadharBimg)
                                    <img width="100px" src="{{ asset($data->aadharBimg) }}" alt="Aadhar Back Image">
                                    @endif
                                </div>
                            </div>
                            <div id="without_aadharFields" class="row" @if( $data->type != 'without_aadhar') style="display: none;" @endif>
                                <div class="col-md-6">
                                    <label for="inputPanCardImg" class="form-label">Pan Card Image</label>
                                    <input type="file" class="form-control" name="pancardImg" id="inputPanCardImg">
                                    @if($data->pancardImg)
                                    <img width="100px" src="{{ asset($data->pancardImg) }}" alt="Pan Card Image">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPanCard" class="form-label">Pan Card Number</label>
                                    <input type="text" class="form-control" name="pancard" id="inputPanCard" placeholder="Enter Pan Card Number" value="{{ $data->pancard }}">
                                </div>
                                <div class="col-md-6" id="driving">
                                    <label for="inputDriving" class="form-label">Enter Driving Lic</label>
                                    <input type="text" class="form-control" name="driving" value="{{ $data->driving }}" id="inputDriving" placeholder="Enter Driving Lic">
                                </div>
                                <div class="col-md-6" id="drivingFrontImgField">
                                    <label for="inputDrivingFrontImg" class="form-label">Enter Driving Lic Front Image</label>
                                    <input type="file" class="form-control" name="drivingFimg" id="inputDrivingFrontImg">
                                    @if($data->drivingFimg)
                                    <img width="100px" src="{{ asset($data->drivingFimg) }}" alt="Driving Lic Image">
                                    @endif
                                </div>
                                <div class="col-md-6" id="drivingBackImgField">
                                    <label for="inputDrivingBackImg" class="form-label">Enter Driving Lic Back Image</label>
                                    <input type="file" class="form-control" name="drivingBimg" id="inputDrivingBackImg">
                                    @if($data->drivingBimg)
                                    <img width="100px" src="{{ asset($data->drivingBimg) }}" alt="Driving Lic Image">
                                    @endif
                                </div>
                                <div class="col-md-6" id="voterID">
                                    <label for="inputVoterID" class="form-label">Enter Voter ID</label>
                                    <input type="text" class="form-control" name="voterID" value="{{ $data->voterID }}" placeholder="Enter Voter ID" id="inputVoterID">
                                </div>
                                <div class="col-md-6" id="VoterIDFrontImgField">
                                    <label for="inputVoterIDFrontImg" class="form-label">Enter Voter ID Front Image</label>
                                    <input type="file" class="form-control" name="voterIDFimg" id="inputVoterIDFrontImg">
                                    @if($data->voterFimg)
                                    <img width="100px" src="{{ asset($data->voterFimg) }}" alt="Voter ID Image">
                                    @endif
                                </div>
                                <div class="col-md-6" id="VoterIDBackImgField">
                                    <label for="inputVoterIDBackImg" class="form-label">Enter Voter ID Back Image</label>
                                    <input type="file" class="form-control" name="voterIDBimg" id="inputVoterIDBackImg">
                                    @if($data->voterBimg)
                                    <img width="100px" src="{{ asset($data->voterBimg) }}" alt="Voter ID Image">
                                    @endif
                                </div>
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
            var without_aadharFields = document.getElementById('without_aadharFields');
            var inputAadhar = document.getElementById('inputAadhar');
            var inputPanCard = document.getElementById('inputPanCard');
            var inputPanCardImg = document.getElementById('inputPanCardImg');
            var inputAadharFrontImg = document.getElementById('inputAadharFrontImg');
            var inputAadharBackImg = document.getElementById('inputAadharBackImg');
            var inputDrivingFrontImg = document.getElementById('inputDrivingFrontImg');
            var inputDrivingBackImg = document.getElementById('inputDrivingBackImg');
            var inputVoterIDFrontImg = document.getElementById('inputVoterIDFrontImg');
            var inputVoterIDBackImg = document.getElementById('inputVoterIDBackImg');
            var voterID = document.getElementById('voterID');
            var driving = document.getElementById('driving');
            if (selectedType === 'aadhar') {
                aadharFields.style.display = 'flex';
                without_aadharFields.style.display = 'none';
                inputAadhar.value = "";
                inputPanCard.value = "";
                inputPanCardImg.value = "";
                inputAadharFrontImg.value = "";
                inputAadharBackImg.value = "";
                inputDrivingFrontImg.value = "";
                inputDrivingBackImg.value = "";
                inputVoterIDFrontImg.value = "";
                inputVoterIDBackImg.value = "";
                voterID.value = "";
                driving.value = "";
            } else if (selectedType === 'without_aadhar') {
                aadharFields.style.display = 'none';
                without_aadharFields.style.display = 'flex';
                inputAadhar.value = "";
                inputPanCard.value = "";
                inputPanCardImg.value = "";
                inputAadharFrontImg.value = "";
                inputAadharBackImg.value = "";
                inputDrivingFrontImg.value = "";
                inputDrivingBackImg.value = "";
                inputVoterIDFrontImg.value = "";
                inputVoterIDBackImg.value = "";
                voterID.value = "";
                driving.value = "";
            } else {
                aadharFields.style.display = 'none';
                without_aadharFields.style.display = 'none';
                inputAadhar.value = "";
                inputPanCard.value = "";
                inputPanCardImg.value = "";
                inputAadharFrontImg.value = "";
                inputAadharBackImg.value = "";
                inputDrivingFrontImg.value = "";
                inputDrivingBackImg.value = "";
                inputVoterIDFrontImg.value = "";
                inputVoterIDBackImg.value = "";
                voterID.value = "";
                driving.value = "";
            }
        });
    </script>
</body>

</html>