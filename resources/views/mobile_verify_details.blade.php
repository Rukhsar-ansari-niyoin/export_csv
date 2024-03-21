<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verification OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="modal d-flex align-items-center" tabindex="-1" style="background: linear-gradient(10deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) -5%, rgba(0, 212, 255, 1) 100%);">

            <div class="modal-dialog">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </div>
                @endif
                <div class="modal-content">

                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title"><img width="220px" src="{{asset('images/logo.png')}}" alt="Logo"></h5>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="myForm" method="post" action="{{ route('verify_details') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <label for="inputEmail_otp" class="form-label">Enter Email OTP</label>
                                <input type="hidden" class="form-control" id="inputEmail" name="email" value="@if(session('email')){{session('email')}}@endif">
                                <input type="text" class="form-control" id="inputEmail_otp" name="email_otp" placeholder="Enter Email OTP">
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
</body>

</html>