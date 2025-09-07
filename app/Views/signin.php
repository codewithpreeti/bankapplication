<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
    <style>
        .form-control {
            border: none;
            border-bottom: 1px solid #111;
            border-radius: 0;
            box-shadow: none;
        }

        .form-control:focus {
            border-bottom: 2px solid #b71313;
            outline: none;
            box-shadow: none;
        }

        label {
            font-size: 20px;
            color: #555;
            margin-bottom: 2px;
        }

        .login-header {
            background-color: #c3def9;
            padding: 15px;

        }

        .captcha-img {
            height: 40px;
            width: 140px;
            margin-top: 5px;
            display: inline-block;
            /*background: url('') no-repeat center;*/
            background-size: contain;
            border: 1px solid #ccc;
            /*position: relative;*/
            /*top: -5px; !* Adjust this value to move it up or down *!*/
        }

        .refresh {
            display: inline-block;
            margin-left: 25px;
            cursor: pointer;
            font-size: 18px;

        }

        .divider {
            border: none;
            border-top: 1px solid #867f7f;
            margin: 20px 0;
        }

        .links {
            display: flex;
            justify-content: space-between;

        }

        /*.captcha-container {*/
        /*    display: flex;*/
        /*    align-items: flex-start; !* Aligns items to the top of the container *!*/
        /*    gap: 10px; !* Optional: Adds some space between the two divs *!*/
        /*}*/

    </style>
</head>

<body class="bg-light">
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div style="background-color: red;width:152px;height:130px;">dsaAFSS</div>-->
<!--        <div style="background-color: deepskyblue;width:152px;height:130px;">GFHJDG</div>-->
<!--    </div>-->
<!--</div>-->

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <div class="bg-white rounded shadow" style="min-height: 750px; width: 80%;">
            <div class="login-header">
                <h4 class="text-primary">Login for Registered User</h4>
            </div>
            <?php
            helper('form');
            echo form_open('/registration', array('method' => 'get'));
            ?>
            <?php
            //            echo "ye session";
            //            var_dump($_SESSION);
            ?>
            <input type="hidden" id="csrf_token_name" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <div class="p-4 mt-3 mb-0">
                <label for="email">Email / Mobile:</label>
                <input type="text" id="email" name="email" placeholder="Enter Email or Mobile" class="form-control"
                       autocomplete="off" required>
            </div>

            <div class="p-4 mt-2 mb-0">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password"
                       class="form-control" required>
            </div>

            <div class="p-4 mt-2 mb-0 d-flex align-items-center gap-3">
                <div class="captcha-img"><img id="captcha_image" src="<?= !empty($captcha) ? $captcha : ''; ?>"
                                              alt="captcha missing">
                </div>
                <div class="refresh" onclick="refresh_captcha()" style="text-align: center">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </div>
            </div>

            <div class="p-4">
                <label for="password">Captcha:</label>
                <input type="text" id="captcha" name="captcha" class="form-control" required>
            </div>
            <hr class="divider">
            <center>
                <button type="submit" class="mt-1 btn btn-primary w-75">Login</button>
            </center>
            <?= form_close(); ?>

            <div class="p-4 links">
                <div>
                    <a href="<?= base_url('/registration') ?>">Sign UP!</a><br>
                    <small>(New User)</small>
                </div>
                <div>
                    <a href="">Forget Password!</a>
                </div>


            </div>

        </div>
    </div>
</div>


<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script>

    function refresh_captcha() {
        let csrf_token = $('#csrf_token_name').attr('name');
        let csrf_hash = $('#csrf_token_name').val();
        // console.log({[csrf_token]: csrf_hash});
        $.ajax({
            url: '/refresh',
            type: 'POST',
            data: {
                [csrf_token]: csrf_hash
            },
            // dataType: 'json',     // if writing this then dont need to do JSON parse
            success: function (response) {
                // console.log(typeof response);
                // console.log(JSON.parse(response));
                // return false;
                response = JSON.parse(response);
                $('#captcha_image').attr('src', response.captcha_path);
                $('#csrf_token_name').attr('name', response.csrf_token);
                $('#csrf_token_name').val(response.csrf_hash);
            },
            error: function (xhr, status, error) {
                console.log("Status Code:", xhr.status);
                console.log("Response Text:", xhr.responseText);
                console.log("Status:", status);
                console.log("Error Message:", error);
            }
        });

    }
</script>
</body>


</html>
