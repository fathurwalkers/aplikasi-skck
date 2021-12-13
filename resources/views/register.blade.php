<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Form Registrasi</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/sbadmin/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('vendor/sbadmin/') }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    {{-- <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6"> --}}
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halaman Registerasi</h1>
                                    </div>

                                    {{-- @error('login_nama') --}}
                                    {{-- <div class="row"> --}}
                                        {{-- <div class="alert alert-danger">
                                            Nama lengkap tidak boleh kosong!
                                        </div> --}}
                                    {{-- </div> --}}
                                    {{-- @enderror --}}


                                    <form class="user" action="{{ route('post-register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('login_nama') is-invalid @enderror" aria-describedby="emailHelp"
                                                placeholder="Nama lengkap..." name="login_nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('login_username') is-invalid @enderror" aria-describedby="emailHelp"
                                                placeholder="Username..." name="login_username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('login_password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="login_password">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('login_email') is-invalid @enderror" aria-describedby="emailHelp"
                                                placeholder="Email" name="login_email">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            REGISTER
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Sudah punya akun? Masuk disini!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/sbadmin/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('vendor/sbadmin/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/sbadmin/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('vendor/sbadmin/') }}/js/sb-admin-2.min.js"></script>

</body>

</html>