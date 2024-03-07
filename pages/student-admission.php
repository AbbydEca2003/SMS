<?php
session_start();
include '../connection.php';

if($_SESSION['auth']!=1){
    header("Location: ../index.html");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css" rel="stylesheet" type="text/css"/>
    <title>विद्यार्थी भर्ना SMS</title>
    <style>
        #error{
            color: red;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-2 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <!-- <form action="../admission/student-admission.php" method="post" id="student-admission" enctype="multipart/form-data"> -->
            <form action="../admission/student-admission.php" method="post" id="student-admission" enctype="multipart/form-data">
            <h1 class="h2">विद्यार्थी भर्ना (Student Admission)</h1>
            <div class="h4" id="error">*कृपया सबै विवरणहरू राम्ररी भर्नुहोस् Please fill out all details properly</div>
            
        <!-- name and dob side -->

       <div class="row">
        <div class="col">

             <!-- Name in english -->
             
       <div class="row">
        <div class="col">
            <label for="first-name" >First name:</label><br>
            <input type="text"id="first-name" name="first-name">
        </div>
        <div class="col">
            <label for="middle-name">Middle name:</label><br>
            <input type="text"  id="middle-name" name="middle-name">
        </div>
        <div class="col">
            <label for="last-name" >Last name:</label><br>
            <input type="text" id="last-name" name="last-name">
        </div>
       </div>

       <!-- Name in nepali -->

       <div class="row">
        <div class="col">
            <label for="first-name">नाम:</label><br>
            <input type="text" id="first-name-N" name="first-name-N">
        </div>
        <div class="col">
            <label for="middle-name">बीचको नाम:</label><br>
            <input type="text"  id="middle-name-N"  name="middle-name-N">
        </div>
        <div class="col">
            <label for="last-name">थर:</label><br>
            <input type="text" id="last-name-N" name="last-name-N">
        </div>
       </div>

        <!-- parents name -->

        <div class="row">
            <div class="col">
                <label for="father-name">Father's full name:</label><br>
                <input type="text" placeholder="Ram" id="father-name" name="father-name">
            </div>
            <div class="col">
                <label for="mother-name">Mother's full name:</label><br>
                <input type="text"  placeholder="Bahadur" id="mother-name" name="mother-name">
            </div>
            <div class="col">
                <label for="guardian-name">Guardian's full name:</label><br>
                <input type="text"  placeholder="Shrestha" id="guardian-name" name="guardian-name">
            </div>
           </div>

            <!-- personal details -->

        <div class="row">
            <div class="col">
                <label for="nepali-datepicker">जन्म मिति(BS):</label><br>
                <input type="text" id="nepali-datepicker" placeholder="जन्म मिति" name="nepali-datepicker">
            </div>
            <div class="col">
                <label for="englis-datepicker">Date of birth(AD):</label><br>
                <input type="date" id="englis-datepicker" name="englis-datepicker">
            </div>
            <div class="col">
                <label for="sex" >Sex:</label><br>
                <label for="male"><input type="radio" id="male" value="MALE" name="sex" checked> Male</label>
                <label for="female"><input type="radio" id="female" value="FEMALE" name="sex"> Female</label>
                <label for="Other" ><input type="radio" id="Other" value="OTHER" name="sex"> Other</label>
            </div>
           </div>
        </div>  

        <!-- image side -->

        <div class="col">
            <label for="photo">Photo:</label><br>
            <img id="preview" src="#" alt="Preview Image" width="300px">
            <input type="file" id="photo" accept="image/*" onchange="previewImage(event)" name="photo">
        </div>
       </div>
           <hr>
           <h1 class="h2">अहिलेकाे ठेगाना (Present Address)</h1>

           <!-- address details -->

        <div class="row">
            <div class="col">
                <label for="street">Street:</label><br>
                <input type="text" id="street-T" name="street-T">
            </div>
            <div class="col">
                <label for="city">City:</label><br>
                <input type="text" id="city-T" name="city-T">
            </div>
            <div class="col">
                <label for="district">District:</label><br>
                <input type="text" id="district-T" name="district-T">
            </div>
            <div class="col">
                <label for="province">Province:</label><br>
                <input type="text" id="province-T" name="province-T">
            </div>
            <div class="col">
                <label for="country">Country:</label><br>
                <input type="text" id="country-T" value="Nepal" name="country-T">
            </div>
           </div>
           <hr>
           <h1 class="h2">स्थाई ठेगाना (Permanent Address)</h1>

           <!-- Parmenent address details -->

           <div class="h6"><input type="checkbox" id="address-is-same"> Same as present address</div>
        <div class="row">
            <div class="col">
                <label for="street">Street:</label><br>
                <input type="text" id="street-P" name="street-P">
            </div>
            <div class="col">
                <label for="city">City:</label><br>
                <input type="text" id="city-P" name="city-P">
            </div>
            <div class="col">
                <label for="district">District:</label><br>
                <input type="text" id="district-P" name="district-P">
            </div>
            <div class="col">
                <label for="province">Province:</label><br>
                <input type="text" id="province-P" name="province-P">
            </div>
            <div class="col">
                <label for="country">Country:</label><br>
                <input type="text" id="country-P" value="Nepal" name="country-P">
            </div>
           </div>
           <hr>

           <!-- Additional details -->

           <h1 class="h2">अतिरिक्त विवरणहरू (Additional Details)</h1>
            <div class="row">
                <div class="col">
                <label for="religion" >Religion:</label><br>
                <input type="text" id="religion" name="religion">
            </div>
            <div class="col">
                <label for="citizen-ID">Citizen-ID:</label><br>
                <input type="text"   id="citizen-ID" name="citizen-ID">
            </div>
            <div class="col">
                <label for="blood-group">ब्लड ग्रुप :</label><br>
                <input type="text" id="blood-group" name="blood-group" placeholder="A+">
            </div>
            <div class="col">
                <label for="garduan-phone">Garduan Phone Number:</label><br>
                <input type="text" id="garduan-phone"name="garduan-phone">
            </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="father-occupation" >Father's Occupation:</label><br>
                <input type="text" id="father-occupation" name="father-occupation">
                </div>
            <div class="col">
                <label for="father-phone">Father's Phone Number:</label><br>
                <input type="text"   id="father-phone" name="father-phone">
            </div>
            <div class="col">
                <label for="father-occupation" >Mother's Occupation:</label><br>
                <input type="text" id="mother-occupation" name="mother-occupation">
                </div>
            <div class="col">
                <label for="mother-phone">Mother's Phone Number:</label><br>
                <input type="text"   id="mother-phone" name="mother-phone">
            </div>
            <div class="row">
                <div class="col">
                    <label for="faculty" >Faculty:</label><br>
                    <label for="bca"><input type="radio" id="bca" value="BCA" name="faculty" checked> BCA</label>
                    <label for="csit"><input type="radio" id="csit" value="CSIT" name="faculty"> CSIT</label>
                    <label for="bit" ><input type="radio" id="bit" value="BIT" name="faculty"> BIT</label>
                    <input type="submit">
                </div>
            </div>
        </form>
    </div>
    <script src="../admission/nepali-date.js"></script>
    <script src="../admission/image-validate.js"></script>
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../admission/student-admission.js"></script>
    <script src="../admission/regex.js"></script>
</body>
</html>