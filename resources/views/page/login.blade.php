<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('public/images/logo_ctu.png') }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--Font googleapis-->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>

<style>
    /* Coded with love by Mutiullah Samim */
    body{
        font-family: 'Mulish', sans-serif;
        background-color: white;
    }
    .container{
        background-image: url('{{ url('public/images/ctu-background.jpeg') }}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        border-radius:5px;box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }
    .user_card {
        height: 320px;
        width: 350px;
        margin-top: auto;
        margin-bottom: auto;
        background: #2175ab;
        position: relative;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 5px;

    }
    .brand_logo_container {
        position: absolute;
        height: 170px;
        width: 170px;
        top: -75px;
        border-radius: 50%;
        background: white;
        padding: 10px;
        text-align: center;
    }
    .brand_logo {
        height: 150px;
        width: 150px;
        border-radius: 50%;
        border: 2px solid white;
    }
    .form_container {
        margin-top: 100px;
    }
    .login_btn {
        width: 100%;
        background: yellow !important;
        color: grey !important;
    }
    .login_btn:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .login_container {
        padding: 0 2rem;
    }
    .input-group-text {
        background: yellow !important;
        color: grey !important;
        border: 0 !important;
        border-radius: 0.25rem 0 0 0.25rem !important;
    }
    .input_user,
    .input_pass:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
        background-color: yellow !important;
    }
</style>

<div class="container p-0 pb-3">
    <div class="jumbotron p-0 mt-4">
        <img src="{{ url('public/images/recommer-edit.jpg') }}"
        style="max-width:100%;height:152px;border-top-left-radius:5px;border-top-right-radius:5px;">
    </div>
    <br><br>
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="{{ url('public/images/logo_ctu.png') }}"
                     class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form action="{{ url('post-login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="inputUsername" class="form-control input_user" placeholder="Tài khoản" required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="inputPassword" class="form-control input_pass" placeholder="Mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember_me" value="1">
                            <label class="custom-control-label" for="customControlInline">Ghi nhớ tôi</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="button" class="btn login_btn"><b>Đăng nhập</b></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@if (Session::has('error_login_session'))
    <script type="text/javascript">
        Swal.fire({
            position: 'center'
            , icon: 'error'
            , title: 'Tài khoản hoặc mật khẩu sai'
            , showConfirmButton: false
            , timer: 3000
        });
    </script>
@endif

</body>
</html>
