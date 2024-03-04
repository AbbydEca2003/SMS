
//form validation system
let studentError = document.getElementById('error');
let fName = document.getElementById('first-name');
let mName = document.getElementById('middle-name');
let lName = document.getElementById('last-name');
let dobN = document.getElementById('nepali-datepicker');
let dobE = document.getElementById('englis-datepicker');
let fatherName = document.getElementById('father-name');
let motherName = document.getElementById('mother-name');
let guardianName = document.getElementById('guardian-name');
let streetT = document.getElementById('street-T');
let streetP = document.getElementById('street-P');
let cityT = document.getElementById('city-T');
let cityP = document.getElementById('city-P');
let districtT = document.getElementById('district-T');
let districtP= document.getElementById('district-P');
let provinceT = document.getElementById('province-T');
let provinceP = document.getElementById('province-P');
let countryT = document.getElementById('country-T');
let countryP = document.getElementById('country-P');
let religion = document.getElementById('religion');
let citizenID = document.getElementById('citizen-ID');
let bloodGroup = document.getElementById('blood-group');
let guardianPhone = document.getElementById('garduan-phone');
let fatherOccupation = document.getElementById('father-occupation');
let fatherPhone = document.getElementById('father-phone');
let motherOccupation = document.getElementById('mother-occupation');
let motherPhone = document.getElementById('mother-phone');
let addressCheck = document.getElementById('address-is-same');

let form = document.getElementById('student-admission');

form.addEventListener('submit', (e) =>{
    // Select all input elements of type text
const textInputs = document.querySelectorAll('input[type="text"]');

// Loop through the textInputs NodeList
textInputs.forEach(input => {
  // Change border color to black
  input.style.borderColor = 'black';
  input.style.borderRadius = '5px';
});
    let error = {value: 0};//initially error is zero
    //e.preventDefault()
    studentError.style.display='block';
    if(addressCheck.checked){//check if both address are same or not
        streetP.value=streetT.value;
        cityP.value=cityT.value;
        districtP.value=districtT.value;
        provinceP.value=provinceT.value;
        countryP.value=countryT.value;
    }
    CheckEmpty(error);
    reg(oneWord, fName, error);
    reg(optionalWord, mName, error);
    reg(oneWord, lName, error);
    reg(fullName, fatherName, error);
    reg(fullName, motherName, error);
    reg(fullName, guardianName, error);
    reg(oneWord, cityT, error);
    reg(oneWord, cityP, error);
    reg(oneWord, districtT, error);
    reg(oneWord, districtP, error);
    reg(oneWord, provinceT, error);
    reg(oneWord, provinceP, error);
    reg(oneWord, countryT, error);
    reg(oneWord, countryP, error);
    reg(oneWord, religion, error);
    reg(citizenIdTypeOptional, citizenID, error);
    reg(bloodGroupType, bloodGroup, error);
    reg(phoneNumber, guardianPhone, error);
    reg(phoneNumber, fatherPhone, error);
    reg(phoneNumber, motherPhone, error);

    if(error.value > 0){
        e.preventDefault()
        alert("problem");
    } 
    console.log(error);
})

function CheckEmpty(error){

    if(streetT.value == '' || streetT.value == null){
        streetT.focus();
        error.value++;
    }
    if(streetP.value == '' || streetP.value == null){
        streetP.focus();
        error.value++;
    }
    if(dobN.value == ''){
        dobN.focus();
        error.value++;
    }
    if(dobE.value == ''){
        dobE.focus();
        studentError.style.display='block';
        error.value++;
    }
    return error.value;
}