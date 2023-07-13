<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formação | Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <link href="./dist-assets/images/logo1.png" rel="shortcut icon">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 intro-section">
                    <div class="intro-content-wrapper" style="background-color:#4caf50; border-radius: 10px">
                        <h1 style="color: white; font-weight:bold; text-align:center">Bem-vindo</h1>
                        <h5 style="color: white; font-weight:bold; text-align:center;">Ao portal de formação</h5>
                    </div>
                    <div class="intro-section-footer" style="background-color:#4caf50; border-radius: 10px; margin-top:10px; margin-bottom:10px">
                        <p style="color: white; font-weight:bold; text-align:center">Copyright 2022 ITS - International Trading and Solutions</p>
                    </div>
                </div>
                <div class="col-sm-7 form-section">
                    <div class="login-wrapper">
                        <div class="mb-3" style="text-align: center;">
                            <img src="./dist-assets/images/logo1.png" style="width: 100px;" alt="" class="logo">
                        </div>
                        <h3 style="text-align: center;">Portal de Formação</h3>
                        <form action="#" id="frm_login" method="POST">
                            <div class="row">
                                <div class="form-group mb-3 col-md-12">
                                    <label for="email" class="sr-only" style="font-weight: bold;">E-mail:</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" >
                                </div>
                                <div class="form-group mb-3 col-md-12">
                                    <label for="password" class="sr-only" style="font-weight: bold;">Senha: </label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                                </div>
                                <!-- <div class="form-group mb-3 col-md-12"> 
                                    <div class="g-recaptcha" data-sitekey="6LetJZwjAAAAAFBLSr8NOjCe2RpyaVjFdd5nEHVd" data-callback="verifyCaptcha"></div>
                                    <div id="g-recaptcha-error"></div>
                                </div> -->
                                <!-- <div class="custom-control custom-checkbox login-check-box">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                </div>  -->
                                <div class="col-md-12" style="text-align: right;">
                                    <button type="submit" class="btn login-btn" id="entrar">
                                        <span class="ent">Entrar</span>
                                        <span class="spinner-border spinner-border-sm spin" role="status" aria-hidden="true" hidden></span>
                                        <span class="carregando" hidden>Carregando...</span>
                                    </button>
                                    <!-- <a href="#!" class="forgot-password-link">Password?</a> -->
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="dist-assets/js/scripts/sweetalert2@11.js"></script>

    <script>
        $(document).ready(function() {

            $(document).on("submit", "#frm_login", function(e) {
                e.preventDefault();
                window.location.assign("pagina_inicial.php")
                // if (recaptcha_response.length > 0) {
                // $("#entrar").attr("disabled", true);
                // $(".ent").attr("hidden", true);
                // $(".spin").removeAttr("hidden");
                // $(".carregando").removeAttr("hidden");
                // if ($("#email").val() != "" && $("#password").val() != "") {
                //     $.ajax({
                //         url: './app/ajax/auth/login.php',
                //         data: {
                //             email: $("#email").val(),
                //             password: $("#password").val()
                //         },
                //         type: 'POST',
                //         dataType: "json",
                //         success: function(data) {
                //             console.log(data)
                //             if (data.error == false) {
                //                 window.location = "./pagina_inicial.php";
                //             } else {
                //                 Swal.fire({
                //                     icon: "error",
                //                     title: data.message,
                //                     showConfirmButton: true,
                //                 })
                //             }
                //         },
                //         error: function(error) {
                //             console.log(error)
                //         }
                //     }).always(function() {
                //         $("#entrar").removeAttr("disabled");
                //         $(".ent").removeAttr("hidden", true);
                //         $(".spin").attr("hidden", true);
                //         $(".carregando").attr("hidden", true);
                //     })
                // } else {
                //     Swal.fire({
                //         icon: "warning",
                //         title: "Por favor, preencha todos os campos",
                //         showConfirmButton: true,
                //     })
                //     $("#entrar").removeAttr("disabled");
                //     $(".ent").removeAttr("hidden", true);
                //     $(".spin").attr("hidden", true);
                //     $(".carregando").attr("hidden", true);
                // }
                // } else {

                // }
                return false;
            })
        })
    </script>
</body>


</html>