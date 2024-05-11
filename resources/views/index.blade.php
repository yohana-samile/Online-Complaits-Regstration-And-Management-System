<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OCRMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .btnSuccess{
            background-color: rgba(213, 94, 28, .9);
            float: right;
        }
    </style>
</head>
    <body>
        <section class="h-custom" style="background-color: #225294;">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-5">
                        <div class="card rounded-3">
                            <img src="{{asset('10753a1877f871d8a45fc8a66fd0ca9b.png')}}" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="logo">
                            <div class="card-body">
                                <h3 class="text-center">Complaits Regstration</h3>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('store')}}">
                                    @csrf
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label float-left" for="complait_submitted">Enter Your Complait Below</label>
                                        <textarea name="complait_submitted" id="complait_submitted" cols="30" rows="5" class="form-control" autofocus></textarea>
                                    </div>
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btnSuccess btn-lg mb-1 text-white push-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="text-white">
            <footer class="bg-body-tertiary text-center text-lg-start text-white">
                <div class="text-center p-3" style="background-color: rgba(213, 94, 28, .9);">
                    © 2024 Copyright:
                    Eva, <a class="text-body text-white" href="https://www.aru.ac.tz/">Ardhi Online Complaits Regstration And Management System</a>
                </div>
            </footer>
        </section>
    </body>
</html>
