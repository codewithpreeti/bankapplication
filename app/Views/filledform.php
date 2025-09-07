<html>
<head>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">



<style>

    .aa{


        /* content: center; */

        /* border:2px solid red;  */
        /* border-collapse:collapse;    */
        margin-left: auto;
        margin-right: auto;
        /* padding:10px;
        color:red;  */
        font-weight:normal;
        text-align: center;
        margin-top :50px;

        width: 1000px;
        border: 2px solid blue;
        padding: 50px;


    }

    .all:after {
        content:" *";
        color: red;
    }

</style>
</head>

<body>
<h3 style='text-align:center; color:blue; padding:20px'><u>
        APPLICATION FORM FOR IBPS SO IT OFFICERS </h3></u></strong>



<form class="aa" action="/bank_form/update/index.php" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-6">
<span>
<label class="all">
First Name: </label><input type="text" name="fname" style="text-transform: capitalize;" value ="<?= $row['a_fname'] ?>" required />

    <!-- <div class="form-group col-md-6"> -->
<label class="all">
Last Name: </label><input type="text" name="lname" style="text-transform: capitalize;" value ="<?= $row['a_lname'] ?>" required /><br><br>
</span>
        <span>
<label class="all">
Father's First Name: </label><input type="text" name="f_fname"  style="text-transform: capitalize;" value ="<?= $row['f_fname'] ?>" required />
<label class="all">
Last Name: </label>
<input type="text" name="f_lname"  style="text-transform: capitalize;" value ="<?= $row['f_lname'] ?>"required /><br><br>
</span>
        <span>
<label class="all">
Mother's First Name: </label><input type="text" name="m_fname"  style="text-transform: capitalize;" value ="<?= $row['m_fname'] ?>" required />
<label class="all">
Last Name: </label>
<input type="text" name="m_lname"  style="text-transform: capitalize;" value ="<?= $row['m_lname'] ?>" required /><br><br>
</span>
    </div>

    <div class="row">
        <div class="col-md-4">
        <label class="all" style="margin-left: -45%;">Category:</label>
        <select name="cast" onchange="categoryselected(this)" >
            <!-- <option  value=""></option> -->
            <option value="1" <?php echo $row['category']=='1'? 'selected' : '';?>>GEN</option>
            <option value="2" <?php echo $row['category']=='2'? 'selected' : '';?>>EWS</option>
            <option value="3" <?php echo $row['category']=='3'? 'selected' : '';?>>SC/ST</option>
            <option value="4" <?php echo $row['category']=='4'? 'selected' : '';?>>OBC</option>
            <option value="5" <?php echo $row['category']=='5'? 'selected' : '';?>>PWD</option>
            <option value="6" <?php  echo $row['category']=='6'? 'selected' : '';?>>Ex-servicemen </option>
        </select>
        </div>

        <label class="all">DOB:</label>
        <input type="text" id="datepicker" onchange="ageCount()" value ="<?= date('d-m-Y ',strtotime($row['dob'])); ?>"required >
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label class="all">Age:</label><input type="text" name="agecounted" id="agecounted" value="" >

        <div class="col-md-4" id="ff" style="display: none">
            <label class="all" style="margin-left: -28%;">Cast Certificate:</label>
            <input type="file" id ="ff" name="upload"  />
        </div>
    </div>
    </br></br>
    <div>
        <label class="all">E-mail:</label>
        <input type="text" name="email" placeholder="Email id for login" value ="<?= $row['email'] ?>"required />

        <label class="all">Phone:</label>
        <input type="tel" name="phn" value ="<?= $row['phone_no'] ?>" required />&nbsp;&nbsp;

        <label class="all">Address:</label>
        <textarea name="addr" ><?= $row['address'] ?></textarea></br></br>

        <label class="all">Nationality:</label>
        <select name="nation" id="nationselected" onchange="nationofpeople()">
            <option value="" disabled selected></option>
            <option value="1" <?php echo $row['nationality']=='1'?'selected':''; ?>  >Citizen of India</option>
            <option value="2" <?php echo $row['nationality']=='2'?'selected':''; ?>  >Subject of Nepal or Bhutan</option>
            <option value="3" <?php echo $row['nationality']=='3'?'selected':''; ?>  >Tibetan Refugee</option>
            <option value="4" <?php echo $row['nationality']=='4'?'selected':''; ?>  >Pakistan</option>
        </select>

        <label class="all">Qualification:</label>
        <select name="edu" >
            <option value="" disabled selected></option>
            <option value="b.tech" <?php echo $row['qualification']=='b.tech'?'selected':''; ?> >B.tech</option>
            <option value="msc" <?php echo $row['qualification']=='msc'?'selected':''; ?> >MSC</option>
            <option value="ece" <?php echo $row['qualification']=='ece'?'selected':''; ?> >Electronics and Communication Engineering</option>
            <option value="et" <?php echo $row['qualification']=='et'?'selected':''; ?> >Electronics and Telecommunication</option>
            <option value="ei" <?php echo $row['qualification']=='ei'?'selected':''; ?> >Electronics and Instrumentation</option>

        </select>
    </div>

    </br></br>

    <label><b><u>Document upload:</u></b></label><br><br>
    <style>
        .dd,th,td{
            border:2px solid black;
            border-collapse:collapse;
            margin-left: auto;
            margin-right: auto;
            padding:10px;
            color:black;
            font-weight:normal;
        }
        .tt th{
            background-color:#AEDBCE;

        }
    </style>
    <table class='dd' >
        <tr>
            <th class='tt'>S.no</th>
            <th>Required Document</th>
            <th>Document Specification</th>
            <th>Upload</th>
        </tr>
        <tr>
            <td>1.</td>
            <td><label >Photograph:</label></td>
            <td><b>Document Format:</b>  JPG<br>
                <b>Min Size(KB):</b> 10<br>
                <b>Max Size(KB):</b> 50
            </td>
            <td> <input type="file" name="photo"  /></td>
        </tr>
        <tr>
            <td>2.</td>
            <td><label >Signature:</label></td>
            <td><b>Document Format:</b>  JPG<br>
                <b>Min Size(KB):</b> 10<br>
                <b>Max Size(KB):</b> 50</td>
            <td> <input type="file" name="sign"  /></td>
        </tr>
        <tr>
            <td>3.</td>
            <td><label >Nationality Certificate:</label></td>
            <td><b>Document Format:</b>  JPG<br>
                <b>Min Size(KB):</b> 10<br>
                <b>Max Size(KB):</b> 50</td>
            <td> <input type="file" name="nat_doc" id="nationality_doc"  onchange="nationofpeople()"/></td>
        </tr>
        <tr>
            <td>4.</td>
            <td><label >Qualification Certificate:</label></td>
            <td><b>Document Format:</b>  JPG<br>
                <b>Min Size(KB):</b> 10<br>
                <b>Max Size(KB):</b> 50</td>
            <td> <input type="file" name="qualify"  /></td>
        </tr>
        <tr>


    </table>
    <br><br><br>
    <!-- <a href="/bank_form/update/index.php" > -->
    <button type="button" name= "register_user" id="saveuser" value="reg_user_db" style="background-color: #008CBA;border-radius: 12px; cursor: pointer;">Save</button>
    <!-- </a> -->
    &
    <a href="/bank_form/layouts/form/preview.view.php" >
        <button type="button" name= "preview_user" value="preview_user_db" style="background-color: #008CBA;border-radius: 12px; cursor: pointer;">Next</button>
    </a>
</form>

  <script>
//   $( function() {
//    alert("checking");
//   } );
  </script>

<script>
    $( function() {
        $( "#datepicker" ).datepicker({dateFormat:'dd-mm-yy',autoClose: true});
    } );
</script>
<script>
//    window.onload =ageCount();
    function ageCount() {

        var userinput = document.getElementById("datepicker").value;
        alert(typeof(userinput)+"@@@"+userinput);

        var dob = new Date(userinput);
        alert(dob+">>>>>>"+userinput);
      
        return false;

        if(userinput.length==10)
        {

            // if(userinput==null || userinput=='') {
            //     document.getElementById("message").innerHTML = "**Choose a date please!";
            //     return false;
            // } else {

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
                $("#agecounted").val(age);

            // }

        }

    }

</script>

<script type="text/javascript">
    function categoryselected(str)
    {
        var sel=str.value;

        if(sel==1)
        {
            document.getElementById("ff").style.display = 'none';
        }
        else{
            document.getElementById("ff").style.display ='block';

        }

    }
</script>

<!-- conditions for nationality -->
<script>

    $(window).on('load', function() {
        nationofpeople();
    });

    function nationofpeople(){

// var e = document.getElementById("nationselected");
// var value = e.value;
// var text = e.options[e.selectedIndex].text;
// alert(value+" ****** "+text);

        var option_value = $('#nationselected').find(":selected").val();
        var option_text = $('#nationselected').find(":selected").text();
      //  alert(option_value+" and "+option_text);

        if(option_value === '1'){
          //  alert('ifpart');
            $('#nationality_doc').attr('disabled', true);

        }else{
          //  alert('elsepart');
            $('#nationality_doc').attr('disabled', false);
        }


    }

</script>

    </body>
</html>