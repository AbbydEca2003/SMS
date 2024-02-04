<?php
$fName = $_POST['first-name'];
if (!isset($fName)){//prevent page from loading if not posted
    header("Location: ../studentAdmission.html");
}
$mName = $_POST['middle-name'];
$lName = $_POST['last-name'];
$fNameN = $_POST['first-name-N'];
$mNameN = $_POST['middle-name-N'];
$lNameN = $_POST['last-name-N'];
$fatherName = $_POST['father-name'];
$motherName = $_POST['mother-name'];
$guardianName = $_POST['guardian-name'];
$nepaliDOB = $_POST['nepali-datepicker'];
$englishDOB = $_POST['englis-datepicker'];
$streetT = $_POST['street-T'];
$cityT = $_POST['city-T'];
$districtT = $_POST['district-T'];
$provinceT = $_POST['province-T'];
$countryT = $_POST['country-T'];
$streetP = $_POST['street-P'];
$cityP = $_POST['city-P'];
$districtP = $_POST['district-P'];
$provinceP = $_POST['province-P'];
$countryP = $_POST['country-P'];
$religion = $_POST['religion'];
$citizenID = $_POST['citizen-ID'];
$bloodGroup = $_POST['blood-group'];
$guardianPhone = $_POST['garduan-phone'];
$fatherOccupation = $_POST['father-occupation'];
$fatherPhone = $_POST['father-phone'];
$motherOccupation = $_POST['mother-occupation'];
$motherPhone = $_POST['mother-phone'];
$sex = $_POST['sex'];


//image srt
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Student admission Preview</title>   
</head>
<body>
    <div class="container border border-2 p-3">
        <div class="container text-center"><img src="../logo.png" alt="SMS" width="300px"></div>
            <div class="row">
                <div class="col-8 col-md-6">
                    <?php
                        echo("<div class='row border border-2'><div class='col'>Name: $fName $mName $lName</div><div class='col'>Date of Birth(BS): $nepaliDOB</div><div class='col'>Date of Birth(AD): $englishDOB</div></div>");
                        echo("<div class='row border border-2'><div class='col'>नाम: $fNameN $mNameN $lNameN</div></div>");
                        echo("<div class='row border border-2'><div class='col'>Father's Name: $fatherName</div><div class='col'>Phone No: $fatherPhone</div></div>");
                        echo("<div class='row border border-2'><div class='col'>Mother's Name: $motherName</div><div class='col'>Phone No: $motherPhone</div></div>");
                        echo("<div class='row border border-2'><div class='col'>Present address: $streetT, $cityT, $provinceT, $countryT</div></div>");
                        echo("<div class='row border border-2'><div class='col'>Permanent address: $streetP, $cityP, $provinceP, $countryP</div></div>");
                        echo("<div class='row border border-2'><div class='col'>Religion: $religion</div><div class='col'>Citizen-ID: $citizenID</div><div class='col'>Blood Group: $bloodGroup</div><div class='col'>Sex: $sex</div></div>");
                        echo("<div class='row border border-2'><div class='col'>Guardian Name: $guardianName</div><div class='col'>Guardian Phone: $guardianPhone</div></div>");
                        echo("<div class='row border border-2'><div class='col'>Father's Occupation: $fatherOccupation</div><div class='col'>Mother's Occupation: $motherOccupation</div></div>");
                    ?>
                </div>
                <div class="col-md">
                    <?php echo("<img src='$target_file' alt='Uploaded Image' width='300px' class='float-end'>");?>
                </div>
            </div>
            <br><button>Complete Admission</button>
    </div>
</body>
</html>