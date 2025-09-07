<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="icon" href="<?= base_url('assets/images/logo.png') ?>" type="image/png">
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <!--    <link rel="stylesheet" href="--><?php //= base_url('assets/css/guideline.css'); 
                                            ?>
    <!--">-->
    <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <style>
    h3 {
        text-align: center;
        color: #090575;
        padding: 20px;
        font-weight: bolder;
        text-decoration: underline;

    }

    /* General Stepper Container */
    .stepper-wrapper {
        display: flex;
        justify-content: center;
        width: 100%;
        padding: 20px 0;
        background-color: #fff;
        /* Light grey background */
        border-radius: 5px;
        overflow: hidden;
        /* Important for containing pseudo-elements */
    }

    .stepper-list {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Subtle shadow for the whole stepper */
        border-radius: 5px;
        /* Rounded corners for the entire bar */
    }

    /* Individual Stepper Item */
    .stepper-item {
        position: relative;
        display: flex;
        align-items: center;
        padding: 10px 30px 10px 20px;
        /* Adjust padding for spacing and arrow overlap */
        background-color: #e0e0e0;
        /* Default grey background for inactive steps */
        color: #555;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        white-space: nowrap;
        /* Prevent text wrapping */
        transition: background-color 0.3s ease, color 0.3s ease;
        z-index: 1;
        /* Ensure stepper content is above pseudo-elements */
    }

    .stepper-item:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .stepper-item:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    /* Arrow Separator */
    .stepper-item:not(:last-child)::after {
        content: '';
        position: absolute;
        right: 0;
        /* Position at the right edge of the item */
        top: 50%;
        transform: translate(50%, -50%) rotate(45deg);
        /* Rotate for arrow shape */
        width: 20px;
        /* Width of the arrow base */
        height: 20px;
        /* Height of the arrow base */
        background-color: inherit;
        /* Inherit background for seamless transition */
        border-top: 1px solid #ccc;
        /* Border to define the arrow edge */
        border-right: 1px solid #ccc;
        z-index: 0;
        /* Behind the stepper content */
        box-shadow: 2px -2px 5px rgba(0, 0, 0, 0.1);
        /* Shadow for the arrow */
    }

    /* Stepper Circle for numbers */
    .stepper-circle {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: #999;
        /* Default circle background */
        color: #fff;
        margin-right: 10px;
        font-size: 12px;
        font-weight: bold;
    }

    /* Active State */
    .stepper-item.active {
        background-color: #007bff;
        /* Blue for active step */
        color: #fff;
        padding-right: 40px;
        /* More padding for active arrow effect */
    }

    .stepper-item.active .stepper-circle {
        background-color: #fff;
        /* White circle for active step */
        color: #007bff;
        /* Blue number for active step */
    }

    .stepper-item.active:not(:last-child)::after {
        background-color: #007bff;
        /* Active background for the arrow */
        border-top-color: #007bff;
        /* Active border for arrow */
        border-right-color: #007bff;
    }

    /* To ensure the next item's arrow aligns correctly */
    .stepper-item.active+.stepper-item {
        padding-left: 40px;
        /* Adjust padding for the item immediately after the active one */
    }

    /* Optional: Completed State (for steps already passed) */
    .stepper-item.completed {
        background-color: #8bc34a;
        /* Green for completed steps */
        color: #fff;
    }

    .stepper-item.completed .stepper-circle {
        background-color: #fff;
        color: #8bc34a;
    }

    .stepper-item.completed:not(:last-child)::after {
        background-color: #8bc34a;
        border-top-color: #8bc34a;
        border-right-color: #8bc34a;
    }

    /* Media Queries for Responsiveness (Optional but recommended) */
    @media (max-width: 768px) {
        .stepper-list {
            flex-direction: column;
            /* Stack items vertically on smaller screens */
            width: 90%;
            margin: auto;
        }

        .stepper-item {
            width: 100%;
            padding: 15px 20px;
            justify-content: flex-start;
            border-radius: 0;
            /* Remove rounded corners when stacked */
        }

        .stepper-item:first-child {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .stepper-item:last-child {
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .stepper-item:not(:last-child) {
            border-bottom: 1px solid #ccc;
            /* Add a separator between stacked items */
        }

        .stepper-item::after {
            content: none;
            /* Hide arrows when stacked */
        }

        /* CONTAINER STYLE */
        .container_box {
            width: 75% !important;
        }
    }

    th,
    tr,
    td {
        text-align: center;
        vertical-align: middle;
        padding: 8px;
        border: 1px solid;
    }
    </style>
</head>



<body>
    <div class="container_box min-vh-100">
        <div style="display: flex;justify-content:center; width: auto;height: 70px;">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="logo not found">
            <h3>APPLICATION FORM FOR IBPS SO 2025</h3>
        </div>
        <br>
        <?php
        helper('form');
        echo form_open('/registration', array('id' => 'application', 'method' => 'post', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data'));
        ?>
        <?php
        //        echo "ye session";
        //        var_dump($_SESSION);
        //        session_unset();
        ?>
        <div class="container" style="margin-top: 6%;">
            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label">1. Full Name(as per certificate)</label>
                    <span style="color:red"> * </span>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="full_name" id="full_name">
                    <span style="color:red" id="full_name_error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3 ">2. Father's/Mother's Name</label>
                    <span style="color:red">*</span>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control mt-3" name="father_mother" id="father_mother">
                    <span style="color:red" id="father_mother_error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3">3. Gender</label>
                </div>
                <div class="col-md-9" style="padding-top:10px;">
                    <input class="form-check-input mt-3" type="radio" class="form-control" name="gender" id="male"
                        value="male" checked="checked">
                    <label class="form-check-label mt-2" for="label_male">Male</label>
                    <input class="form-check-input mt-3" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label mt-2" for="label_female">Female</label>
                    <input class="form-check-input mt-3" type="radio" name="gender" id="third_gender"
                        value="third_gender">
                    <label class="form-check-label mt-2" for="label_third_gender">Third Gender</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3">4. Category</label>
                    <span style="color:red">*</span>

                </div>
                <div class="col-md-9" style="padding-top:10px;">
                    <input class="form-check-input mt-3" onclick="category_selected(this.value)" type="radio"
                        name="category" id="gen" value="gen" checked="">
                    <label class="form-check-label mt-2" for="label_gen">Gen</label>

                    <input class="form-check-input mt-3" onclick="category_selected(this.value)" type="radio"
                        name="category" id="obc" value="obc">
                    <label class="form-check-label mt-2" for="label_obc">OBC</label>

                    <input class="form-check-input mt-3" onclick="category_selected(this.value)" type="radio"
                        name="category" id="sc_st" value="sc_st">
                    <label class="form-check-label mt-2" for="label_sc_st">SC/ST</label>

                    <input class="form-check-input mt-3" onclick="category_selected(this.value)" type="radio"
                        name="category" id="ex_serv" value="ex_serv">
                    <label class="form-check-label mt-2" for="label_ex_serv">Ex-servicemen</label>

                    <input class="form-check-input mt-3" onclick="category_selected(this.value)" type="radio"
                        name="category" id="pwd" value="pwd">
                    <label class="form-check-label mt-2" for="label_pwd">PWD</label>
                    <span style="color:red; margin-left: 20%">* Category once submitted cannot be changed later. </span>
                </div>
            </div>

            <div class="row" id="obc_sc_st" style="display: none;">
                <label id="cast_c_label" class="col-md-3 col-form-label mt-3 ">4.1 Cast Certificate</label>
                <div class="col-md-9">
                    <input type="file" onchange="check_doc(this.id)" class="form-control mt-3" name="obc_sc"
                        id="obc_sc">
                    <span style="color:red" id="obc_sc_error"></span>
                </div>
            </div>

            <div class="row" id="service_branch" style="display: none;">
                <label class="col-md-3 col-form-label mt-3 ">4.1 Service Branch</label>
                <div class="col-md-9">
                    <select class="form-select mt-3" name="service_b" id="service_b">
                        <option value="army">Army</option>
                        <option value="navy">Indian Navy</option>
                        <option value="airforce">Indian Airforce</option>
                    </select>
                </div>
            </div>
            <div class="row" id="discharge" style="display: none;">
                <label class="col-md-3 col-form-label mt-3 ">4.2 Discharge Certificate</label>
                <div class="col-md-9">
                    <input type="file" onchange="check_doc(this.id)" class="form-control mt-3" name="discharge_c"
                        id="discharge_c">
                    <span style="color:red">* Discharge Certificate from Defence Authority. </span>
                    <span style="color:red" id="discharge_c_error"></span>
                </div>
            </div>
            <div class="row" id="service_number" style="display: none;">
                <label class="col-md-3 col-form-label mt-3 ">4.3 Service Number</label>
                <div class="col-md-9" id="ex_service_men">
                    <input type="text" class="form-control mt-3" name="service_n" id="service_n">
                    <span style="color:red" id="service_n_error"></span>
                </div>
            </div>

            <div class="row" id="disability_certificate" style="display: none;">
                <label class="col-md-3 col-form-label mt-3 ">4.1 Disability Certificate</label>
                <div class="col-md-9">
                    <input type="file" onchange="check_doc(this.id)" class="form-control mt-3" name="disability_c"
                        id="disability_c">
                    <span style="color:red" id="disability_c_error"></span>
                </div>
            </div>
            <div class="row" id="disability_percentage" style="display: none;">
                <label class="col-md-3 col-form-label mt-3 ">4.2 Disability Percentage (%)</label>
                <div class="col-md-9">
                    <input type="number" class="form-control mt-3" minlength="2" maxlength="3" name="disability_p"
                        id="disability_p">
                    <span style="color:red">* Disability percentage between 40% and 100% are eligible. Less than 40% is
                        not valid. </span>
                    <span style="color:red" id="disability_p_error"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3 ">5. Date Of Birth</label>
                    <span style="color:red">*</span>
                </div>
                <div class="col-md-9">
                    <input type="date" class="form-control mt-3" onchange="calculate_dob()" name="dob" id="dob">
                    <span id="age_cal" style="color:red"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="mt-3 dropdown">6. Nationality</label>
                    <span style="color:red">*</span>
                </div>
                <div class="col-md-9">
                    <select name="nationality" id="nationality" class="form-select mt-3">
                        <option value="no_option" selected>Select the option</option>
                        <option value="india" onclick="nationality_check(this.value)">citizen of India</option>
                        <option value="nepal" onclick="nationality_check(this.value)">citizen of Nepal</option>
                        <option value="bhutan" onclick="nationality_check(this.value)">citizen of Bhutan
                        </option>
                        <option value="pakistan" onclick="nationality_check(this.value)">citizen of Pakistan
                        </option>
                    </select>
                </div>
            </div>
            <div class="row" id="national_proof_div" style="display: none;">
                <label id="nationality_label" class="col-md-3 mt-3 dropdown">6.1 Nationality Proof</label>
                <div class="col-md-9">
                    <input type="file" class="form-control mt-3" onchange="check_doc(this.id)" name="national_proof"
                        id="national_proof">
                    <span style="color:red">* Passport OR Citizenship Certificate issued by respective Government
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3 ">7. Mobile No.</label>
                    <span style="color:red">*</span>
                </div>
                <!-- Input group -->
                <div class="col-md-9">
                    <div class="input-group mt-3">
                        <span class="input-group-text">+91</span>
                        <input type="number" class="form-control" name="mobile" id="mobile">
                        <span class="input-group-text">(10 digits)</span>
                    </div>
                    <span style="color:red" id="mobile_error"></span>
                </div>
            </div>

            <div class=" row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3 "> Confirm Mobile No.</label>
                    <span style="color:red">*</span>
                </div>
                <!-- Input group -->
                <div class="col-md-9">
                    <div class="input-group mt-3">
                        <span class="input-group-text">+91</span>
                        <input type="number" onchange="confirm_mobile(this.value)" class="form-control" name="mobile_c"
                            id="mobile_c">
                        <span class="input-group-text">(10 digits)</span>
                    </div>
                </div>
                <span style="color:red" id="mobile_c_error"></span>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3 ">8. Email id</label>
                    <span style="color:red">*</span>
                </div>
                <div class="col-md-9">
                    <input type="email" class="form-control mt-3" name="email" id="email">
                </div>
                <span style="color:red" id="email_error"></span>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3 ">9. Education Details:</label>
                    <span style="color:red">*</span>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <table class="mt-2 p-3" style="border:1px solid;">
                        <thead>
                            <th>S.No</th>
                            <th>Levels</th>
                            <th>Subject</th>
                            <th>Total</th>
                            <th>Out of</th>
                            <th>Percentage(%)</th>

                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Graduation</td>
                                <td>
                                    <select name="graduation" style="width:250px;" id="graduation"
                                        class="form-select mt-1">
                                        <option value="no_option" selected>Select the option</option>
                                        <option value="btech">B.Tech I.T</option>
                                        <option value="msc_cs_ca">MSC/CS/Computer Application</option>
                                        <option value="ece">Electronics and Communication Engineering/Electronics
                                        </option>
                                        <option value="tele_ele">Telecommunication/Electronics and Instrumentation
                                        </option>
                                    </select>
                                </td>
                                <td><input type="number" name="g_marks" id="g_marks" value=""></td>
                                <td><input type="number" onfocusout="cal_per(this.value,this.name)" name="g_total"
                                        id="g_total" value="">
                                </td>
                                <td><input type="text" name="g_per" id="g_per" value='' readonly></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Senior Secondary/12th</td>
                                <td><input type="text" name="ss_sub" id="ss_sub"></td>
                                <td><input type="number" name="ss_marks" id="ss_marks"></td>
                                <td><input type="number" onfocusout="cal_per(this.value,this.name)" name="ss_o_total"
                                        id="ss_o_total"></td>
                                <td><input type="text" name="ss_per" id="ss_per" value='' readonly></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Secondary/10th</td>
                                <td><input type="text" name="s_sub" id="s_sub"></td>
                                <td><input type="number" name="s_marks" id="s_marks"></td>
                                <td><input type="number" onfocusout="cal_per(this.value,this.name)" name="s_o_total"
                                        id="s_o_total"></td>
                                <td><input type="text" name="s_per" id="s_per" value='' readonly></td>
                            </tr>
                        </tbody>


                    </table>
                </div>

            </div>
            <span style="color:red">*For filing the form Percentage should be more than 60% in graduation </span>

            <div class="row">
                <div class="col-md-3">
                    <label class="col-form-label mt-3 ">10. Documents Upload:</label>
                    <span style="color:red">*</span>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <table class="mt-2 p-3" style="border:1px solid;">
                        <thead>
                            <th>S.No</th>
                            <th>Document</th>
                            <th>upload</th>

                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Photo</td>
                                <td><input type="file" onchange="check_doc(this.id)" name="photo" id="photo"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Signature</td>
                                <td><input type="file" onchange="check_doc(this.id)" name="sign" id="sign"></td>
                            </tr>

                        </tbody>


                    </table>
                </div>

            </div>
            <span style="color:red">*Uploaded documents should be in jpeg/jpg format and size should not be greater than
                20KB.</span><br>
            <span style="color:red" id="photo_error"></span><br>
            <span style="color:red" id="sign_error"></span>

            <br><br><br>

            <div style="text-align: center;">
                <button type="button" onclick="preview_details()" class="btn btn-primary">Preview</button>
                <button type="submit" onclick="save_details(event)" class="btn btn-success">Save</button>

            </div>



        </div>
        <?= form_close(); ?>
    </div>
    </div>
    <script>
    function nationality_check(national) {
        // alert(national + ">>" + typeof (national));
        if (national != 'india') {
            $('#national_proof_div').show();
            // console.log(national + ">>>" + national.charAt(0).toUpperCase() + ">>>" + national.slice(1));
            // return;
            $('#nationality_label').text("6.1 " + national.charAt(0).toUpperCase() + national.slice(1) +
                " Nationality Proof");
        } else {
            $('#national_proof_div').hide();
        }
    }

    function category_selected(catSelected) {
        // alert(catSelected + ">>>" + typeof (catSelected));
        // return;
        if (catSelected != 'gen') {
            if (catSelected == 'Obc' || catSelected == 'Sc/St') {
                $("#obc_sc_st").css('display', '');
                $("#disability_percentage").css('display', 'none');
                $("#disability_certificate").css('display', 'none');
                $("#service_number").css('display', 'none');
                $("#discharge").css('display', 'none');
                $("#service_branch").css('display', 'none');
                $("#cast_c_label").text('4.1. ' + catSelected + ' Cast Certificate');
            } else if (catSelected == 'ex_serv') {
                $("#obc_sc_st").css('display', 'none');
                $("#disability_percentage").css('display', 'none');
                $("#disability_certificate").css('display', 'none');
                $("#service_number").css('display', '');
                $("#discharge").css('display', '');
                $("#service_branch").css('display', '');
            } else if (catSelected == 'pwd') {
                $("#obc_sc_st").css('display', 'none');
                $("#disability_percentage").css('display', '');
                $("#disability_certificate").css('display', '');
                $("#service_number").css('display', 'none');
                $("#discharge").css('display', 'none');
                $("#service_branch").css('display', 'none');
            }
        } else {
            $("#obc_sc_st").css('display', 'none');
            $("#disability_percentage").css('display', 'none');
            $("#disability_certificate").css('display', 'none');
            $("#service_number").css('display', 'none');
            $("#discharge").css('display', 'none');
            $("#service_branch").css('display', 'none');
        }

    }

    // NOTE : NANDI : number hona chahiye submit karte time 40 se 100 aye BELOW FUNCTION JUST FOR LEARNING ITNA DEEP BANADIYA

    $('#disability_p').on('input', function() {
        // alert($(this).val() + ">>" + typeof ($(this).val()));

        let disb_per = $(this).val();

        // console.log(this);      // ye plain DOM element hai
        // console.log($(this));   // ye jQuery object hai
        // console.log(this.value);
        // isNAN() - returns true is value is NOT A NUMBER and false is a NUMBER
        if (isNaN($(this).val())) {
            // alert("number naih hai");
            new_val = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(new_val);
        } else {
            // console.log("ayaa" + ">>>" + disb_per + ">>>" + typeof (disb_per));
            // alert(disb_per.length);
            if (disb_per.length > 1 && parseInt(disb_per) != 0) {
                // alert("if");
                // console.log(disb_per.charAt(1).slice());
                if (disb_per.charAt(0) == '1' && (disb_per.charAt(1) != 0 || disb_per.charAt(2) != 0)) {
                    // var rem = disb_per.slice(0, 1);
                    // $(this).val(rem);
                    (disb_per.length == 2) ? $(this).val(disb_per.slice(0, 1)): '';
                    (disb_per.length == 3) ? $(this).val(disb_per.slice(0, 2)): '';
                }
                if ((disb_per.length == 3) && (disb_per.charAt(0) != '1')) {
                    $(this).val(disb_per.slice(0, 2));
                    alert("Disability persentage should be between 40 to 100 ");
                }
            } else if (disb_per.length == 1 && parseInt(disb_per) == 0) {
                // alert("elseif >");
                $(this).val('');
            } else if (disb_per.length == 1 && parseInt(disb_per) != 1 && parseInt(disb_per) < 4) {
                // alert("elseif >>");
                $(this).val('');
            }


        }
    });

    function calculate_dob() {

        // alert($('#dob').val() + ">>>>" + typeof ($('#dob').val()));
        let dob = $('#dob').val();
        let dob_yr = dob.split("-");
        dob_yr = parseInt(dob_yr[0]);
        const d = new Date();
        let year = d.getFullYear();
        // console.log(year + ">>" + typeof (year) + dob_yr[0] + ">>" + typeof (dob_yr[0]))
        // console.log(year - dob_yr);
        let age_cal = year - dob_yr;
        // console.log($("input[name=category]:radio:checked").val());
        // console.log($("input[name=category]:radio:checked").val() + ">>>" + age_cal);
        let category = $("input[name=category]:radio:checked").val();
        // console.log(category + ">>>" + typeof age_cal);
        if (age_cal < 20) {
            alert('Not Eligible To Fill The Form');
            return false;
        }
        if ((age_cal > 28) && (category == 'gen')) {
            alert('Not Eligible To Fill The Form, Over age');
            return false;
        } else if (age_cal > 28) {
            // alert("AAAA");
            // return;
            let relaxed_age;
            console.log(category + ">>" + age_cal);
            switch (category) {
                case 'Obc':
                    relaxed_age = 28 + 3;
                    if (relaxed_age <= age_cal)
                        alert("Candidate is over age!!!");
                    break;
                case 'Sc/St':
                    relaxed_age = 28 + 5;
                    if (relaxed_age <= age_cal)
                        alert("Candidate is over age!!!");
                    break;
                case 'ex_serv':
                    relaxed_age = 28 + 10;
                    if (relaxed_age <= age_cal)
                        alert("Candidate is over age!!!");
                    break;
                case 'pwd':
                    relaxed_age = 28 + 12;
                    if (relaxed_age <= age_cal)
                        alert("Candidate is over age!!!");
                    break;
                default:
                    alert("Candidate is of General Category");
                    break;
            }
        }
        /*else if ((age_cal > 28) && (category == 'Sc/St')) {
            let relaxed_age = age_cal + 5;
            console.log(">>" + relaxed_age);
            (relaxed_age > 33) ? alert('Candidate is over age!!!') : '';
        } else if ((age_cal > 28) && (category == 'Sc/St')) {
            let relaxed_age = age_cal + 5;
            console.log(">>" + relaxed_age);
            (relaxed_age > 33) ? alert('Candidate is over age!!!') : '';
        } else if ((age_cal > 28) && (category == 'Obc')) {
            let relaxed_age = age_cal + 5;
            console.log(">>" + relaxed_age);
            (relaxed_age > 33) ? alert('Candidate is over age!!!') : '';
        }*/

    }

    function cal_per(total, name) {
        // alert(total + ">>" + name);
        if (name == 'g_total') {
            if (($('#g_marks').val() == '')) {
                alert("Enter the marks scored out of total");
            } else {
                var marks = $('#g_marks').val();
                // alert(marks + ">>" + total)
                per = parseInt((marks / total) * 100);
                if (per < 60) {
                    alert("Not eligible to fill the form");
                    return false;
                }
                $("#g_per").val(per);

            }
        } else if (name == 'ss_o_total') {
            if (($('#ss_marks').val() == '')) {
                alert("Enter the marks scored out of total");
            } else {
                var marks = $('#ss_marks').val();
                // alert(marks + ">>" + total)
                per = parseInt((marks / total) * 100);
                // commented below if section because percentage condition only for graduation 
                // if (per < 60) {
                //     alert("Not eligible to fill the form");
                //     return false;
                // }
                $("#ss_per").val(per);

            }
        } else {
            if (($('#s_marks').val() == '')) {
                alert("Enter the marks scored out of total");
            } else {
                var marks = $('#s_marks').val();
                // alert(marks + ">>" + total)
                per = parseInt((marks / total) * 100);
                // commented below if section because percentage condition only for graduation 
                // if (per < 60) {
                //     alert("Not eligible to fill the form");
                //     return false;
                // }
                $("#s_per").val(per);

            }
        }
    }

    function check_doc(id_document) {
        // console.log(id_document);
        // console.log(($('#' + id_document).val()));
        // console.log(($('#' + id_document).prop("files")[0]));
        // console.log(($('#' + id_document).prop("files")[0]).size);

        if (($('#' + id_document).prop("files")[0]).size > 0) {
            let file_size = ($('#' + id_document).prop("files")[0]).size;
            // console.log(typeof(file_size));
            // return false;
            allowed_size = file_size / 1024;
            // console.log(allowed_size + ">>>>>" + Math.round(allowed_size));
            if (Math.round(allowed_size) > 20) {
                alert("File size should be less than 20KB. Selected: " + Math.round(allowed_size) + "KB");
                $('#' + id_document).val('');
                return false;
            }
        }
        var file_type = ($('#' + id_document).prop("files")[0]).type;

        if ((id_document == 'national_proof') || (id_document == 'obc_sc') ||
            (id_document == 'discharge_c') || (id_document == 'disability_c')) {
            if (file_type !== 'application/pdf') {
                alert("Alert - only pdf format files can be uploaded");
                $('#' + id_document).val('');
                return false;
            }


        } else if ((id_document == 'photo') || (id_document == 'sign')) {

            // console.log(($('#' + id_document).prop("files"))[0].type);
            // console.log(typeof file_type);
            if ((file_type !== 'image/jpeg') && (file_type !== 'image/jpg')) {
                alert("Alert - only jpeg/jpg format files can be uploaded");
                $('#' + id_document).val('');
                return false;
            }

        }
    }

    function save_details(e) {
        e.preventDefault();
        // alert('save on click');
        // alert($('input[name=csrf_test_name]').val());
        var csrfTokenName = $('input[type=hidden]').attr('name');
        var csrfTokenVal = $('input[type=hidden]').val();
        // console.log(csrfTokenName + ">>" + csrfTokenVal);
        var formInput = new FormData(document.getElementById('application'));
        // console.log(formInput);
        $.ajax({
            url: '/registration',
            type: 'POST',
            dataType: 'JSON',
            processData: false, // Important for FormData
            contentType: false, // Important for FormData
            data: formInput,
            success: function(response) {
                console.log(response);
                // return false;
                $('span[id$="_error"]').text('');

                if (response.success === false) {
                    console.log("aya");

                    // har error ko uske span mein daalo
                    $.each(response.errors, function(field, message) {
                        $('#' + field + '_error').text(message);
                    });

                    // csrf token update karna mat bhoolo
                    $('input[name="csrf_test_name"]').val(response.csrf_hash);

                } else {
                    alert('Form submitted successfully!');
                    // yaha apna next step likho, jaise redirect ya model call
                }

            },
            error: function(xhr, status, error) {
                console.log("yahan kaise aya");
            }

        })
    }

    function confirm_mobile(confirmNo) {
        let mobile = $('#mobile').val();
        if (mobile != confirmNo) {
            alert("Mobile Number does not match, Kindly enter correct ");
            $('#mobile_c').val('');
        }
    }

    document.getElementById("mobile").addEventListener("input", function() {
        if (this.value.length > 10) {
            this.value = this.value.slice(0, 10);
        }
    });
    document.getElementById("mobile_c").addEventListener("input", function() {
        if (this.value.length > 10) {
            this.value = this.value.slice(0, 10);
        }
    });
    </script>

</body>

</html>