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
                        <form class="row g-3" id="myForm" method="post" action="{{ route('mobileOtp') }}" enctype="multipart/form-data">
                            @csrf

                           
                            <h3 align="center"> Mobile Verification using OTP</h3>
        
                          
                            <div class="col-md-6">
                                <label for="inputName" class="form-label">Enter Phone Number</label>
                                <input type="text" class="form-control" id="inputEmail" name="email" value="@if(session('email')){{session('email')}}@endif">
                                <input type="text" class="form-control" id="inputNumber" name="phone" placeholder="Enter Phone Number">
                            </div>

                
                           
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   