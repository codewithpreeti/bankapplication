<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="icon" href="<?= base_url('assets/images/logo.png') ?>" type="image/png">
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/guideline.css'); ?>">
    <style>

        /*        .aa {


                    !* content: center; *!

                    !* border:2px solid red;  *!
                    !* border-collapse:collapse;    *!
                    margin-left: auto;
                    margin-right: auto;
                    !* padding:10px;
                    color:red;  *!
                    font-weight: normal;
                    text-align: center;
                    margin-top: 50px;

                    width: 1000px;
                    border: 2px solid blue;
                    padding: 50px;


                }*/

        .all:after {
            content: " *";
            color: red;
        }

        /*h3 {*/
        /*    text-align: center;*/
        /*    color: #0f44f5;*/
        /*    padding: 20px;*/
        /*    font-weight: bolder;*/

        /*}*/

    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <h3> APPLICATION FORM FOR IBPS SO</h3>
    <form class="aa" action=" " method="post" enctype="multipart/form-data">
        <div class="form-group col-md-6">
<span>
<label class="all">
First Name: </label><input type="text" name="fname" style="text-transform: capitalize;" required/>

    <!-- <div class="form-group col-md-6"> -->
<label class="all">
Last Name: </label><input type="text" name="lname" style="text-transform: capitalize;" required/><br><br>
</span>
            <span>
<label class="all">
Father's First Name: </label><input type="text" name="f_fname" style="text-transform: capitalize;" required/>
<label class="all">
Last Name: </label>
<input type="text" name="f_lname" style="text-transform: capitalize;" required/><br><br>
</span>
            <span>
<label class="all">
Mother's First Name: </label><input type="text" name="m_fname" style="text-transform: capitalize;" required/>
<label class="all">
Last Name: </label>
<input type="text" name="m_lname" style="text-transform: capitalize;" required/><br><br>
</span>
        </div>
        <script>
            function ageCount() {

                var userinput = document.getElementById("dob").value;

                var dob = new Date(userinput);

                if (userinput.length == 10) {

                    if (userinput == null || userinput == '') {
                        document.getElementById("message").innerHTML = "**Choose a date please!";
                        return false;
                    } else {

                        //calculate month difference from current date in time
                        var month_diff = Date.now() - dob.getTime();

                        //convert the calculated difference in date format
                        var age_dt = new Date(month_diff);

                        //extract year from date
                        var year = age_dt.getUTCFullYear();

                        //now calculate the age of the user
                        var age = Math.abs(year - 1970);
                        alert(age);
                        //display the calculated age
                        return document.getElementById("result").innerHTML =
                            "Age is: " + age + " years. ";
                    }

                }

            }

        </script>

        <script type="text/javascript">
            function categoryselected(str) {
                var sel = str.value;

                if (sel == 1) {
                    document.getElementById("ff").style.display = 'none';
                } else {
                    document.getElementById("ff").style.display = 'block';

                }

            }
        </script>
        <div>
            <label class="all">Category:</label>
            <select name="cast" onchange="categoryselected(this)">
                <option value="" disabled selected></option>
                <option value="1">GEN</option>
                <option value="2">EWS</option>
                <option value="3">SC/ST</option>
                <option value="4">OBC</option>
                <option value="5">PWD</option>
                <option value="6">Ex-servicemen</option>
            </select>

            <input type="file" id="ff" name="upload" hidden/>
            <label class="all">DOB:</label>
            <input type="date" name="dob" id="dob" onkeydown="ageCount()" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        </br></br>
        <div>
            <label class="all">E-mail:</label>
            <input type="text" name="email" placeholder="Email id for login" required/>

            <label class="all">Phone:</label>
            <input type="tel" name="phn" required/>&nbsp;&nbsp;

            <label class="all">Address:</label>
            <textarea name="addr"></textarea></br></br>

            <label class="all">Nationality:</label>
            <select name="nation" id="nationselected" onchange="nationofpeople()">
                <option value="" disabled selected></option>
                <option value="1">Citizen of India</option>
                <option value="2">Subject of Nepal or Bhutan</option>
                <option value="3">Tibetan Refugee</option>
                <option value="4">Pakistan</option>
            </select>

            <label class="all">Qualification:</label>
            <select name="edu">
                <option value="" disabled selected></option>
                <option value="b.tech">B.tech</option>
                <option value="msc">MSC</option>
                <option value="ece">Electronics and Communication Engineering</option>
                <option value="et">Electronics and Telecommunication</option>
                <option value="ei">Electronics and Instrumentation</option>

            </select>
        </div>

        </br></br>

        <label><b><u>Document upload:</u></b></label><br><br>
        <style>
            .dd, th, td {
                border: 2px solid black;
                border-collapse: collapse;
                margin-left: auto;
                margin-right: auto;
                padding: 10px;
                color: black;
                font-weight: normal;
            }

            .tt th {
                background-color: #AEDBCE;

            }
        </style>
        <table class='dd'>
            <tr>
                <th class='tt'>S.no</th>
                <th>Required Document</th>
                <th>Document Specification</th>
                <th>Upload</th>
            </tr>
            <tr>
                <td>1.</td>
                <td><label>Photograph:</label></td>
                <td><b>Document Format:</b> JPG<br>
                    <b>Min Size(KB):</b> 10<br>
                    <b>Max Size(KB):</b> 50
                </td>
                <td><input type="file" name="photo"/></td>
            </tr>
            <tr>
                <td>2.</td>
                <td><label>Signature:</label></td>
                <td><b>Document Format:</b> JPG<br>
                    <b>Min Size(KB):</b> 10<br>
                    <b>Max Size(KB):</b> 50
                </td>
                <td><input type="file" name="sign"/></td>
            </tr>
            <tr>
                <td>3.</td>
                <td><label>Nationality Certificate:</label></td>
                <td><b>Document Format:</b> JPG<br>
                    <b>Min Size(KB):</b> 10<br>
                    <b>Max Size(KB):</b> 50
                </td>
                <td><input type="file" name="nat_doc" id="nationality_doc" onchange="nationofpeople()"/></td>
            </tr>
            <tr>
                <td>4.</td>
                <td><label>Qualification Certificate:</label></td>
                <td><b>Document Format:</b> JPG<br>
                    <b>Min Size(KB):</b> 10<br>
                    <b>Max Size(KB):</b> 50
                </td>
                <td><input type="file" name="qualify"/></td>
            </tr>
            <tr>


        </table>
        <br><br><br>
        <button type="submit" name="register_user" value="reg_user_db"
                style="background-color: #008CBA;border-radius: 12px; cursor: pointer;">Save
        </button>

        &
        <a href="/bank_form/layouts/form/preview.view.php">
            <button type="button" name="register_user" value="reg_user_db"
                    style="background-color: #008CBA;border-radius: 12px; cursor: pointer;">Next
            </button>
        </a>
    </form>

</div>
<script>
    // alert('form called');


    function nationofpeople() {

// var e = document.getElementById("nationselected");
// var value = e.value;
// var text = e.options[e.selectedIndex].text;
// alert(value+" ****** "+text);

        var option_value = $('#nationselected').find(":selected").val();
        var option_text = $('#nationselected').find(":selected").text();
        alert(option_value + " and " + option_text);

        if (option_value === '1') {
            alert('ifpart');
            $('#nationality_doc').attr('disabled', true);

        } else {
            alert('elsepart');
            $('#nationality_doc').attr('disabled', false);
        }


    }


</script>


</body>
</html>