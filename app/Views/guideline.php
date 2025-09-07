<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ibps</title>
    <link rel="icon" href="<?= base_url('assets/images/logo.png') ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url('assets/css/guideline.css'); ?>">


</head>
<body>
<!--<div class=" test">ye hai check test div</div>-->
<div class="container_box d-flex justify-content-center align-items-center min-vh-100">
    <img src="<?= base_url('assets/images/logo1.png') ?>" alt="image not found"/>

    <div class="content">
        <p>The Institute of Banking Personnel Selection (IBPS) has officially started the online application process for
            IBPS SO 2025 to fill a total of 1007 Specialist Officer vacancies across various public sector banks.
            Candidates
            who are eligible and interested in roles such as IT Officer, Agricultural Field Officer, Rajbhasha Adhikari,
            Law
            Officer, HR/Personnel Officer, and Marketing Officer can now apply through the official IBPS website. The
            application window is open from 1st July 2025 and will remain active till 21st July 2025. It is important
            for
            applicants to carefully read the official notification, check the eligibility criteria, and gather all
            necessary
            documents before proceeding with the registration. The selection process includes three stages, Prelims,
            Mains,
            and Interview. Candidates are advised not to wait until the last date and complete their IBPS SO Apply
            Online
            2025 process early to avoid any last-minute technical issues. The direct application link is now live on the
            portal.</p>
    </div>
    <?php
    helper('form');
    echo form_open('/signin', array('method' => 'get'));
    ?>

    <div class="content"><input type="checkbox" name="confirmation" value="yes" required/> Click here to fill the IBPS
        SO exam 2025 form online <br/>

    </div>
    <br><br><br><br>
    <div>
        <input type="submit" id="submit_btn" name="guideline_page" value="submit"/>
    </div>
    <?= form_close(); ?>
</div>
<script>

    //    scope of let and var example
    /*    var n = 10;
        {
            var n = 12;
            console.log("var=" + n);
        }
        console.log("var=" + n);

        let b = 10;
        {
            let b = 12;
            console.log("let=" + b);
            console.log("var=" + n);
        }
        console.log("let=" + b);*/
</script>

</body>
</html>
