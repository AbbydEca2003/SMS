//check for 1 word
const oneWord =  /^[a-zA-Z]+$/;
//check optional 1 word
const optionalWord = /^$|^\w+$/;
//check phone number
const phoneNumber = /^9\d{9}$/;
//check bloodgroup type
const bloodGroupType = /^(A|B|AB|O)[\+-]$/;
//check citizen number only
const citizenIdType = /^[\d-]+$/;
const citizenIdTypeOptional = /^$|^\d+$/;
//check for full anme 1 to 3 words
const fullName = /^\s*\w+(\s+\w+){0,2}\s*$/;

function reg(regex, input, error){
    if(regex.test(input.value) == false){
        input.focus();
        input.style = "border-color: red"; 
        input.style.borderRadius = "5px";
        error.value++;
    }
}