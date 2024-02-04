let name = document.getElementById('username');
let pass = document.getElementById('password');
let form = document.getElementById('form');
form.addEventListener('submit', (e) =>{
    let error = 0;
    if(name.value == '' || name.value == null){
        document.getElementById('nameError').style.display = 'block';
        error++;
    }else{
        document.getElementById('nameError').style.display = 'none';
    }
    if(pass.value == '' || pass.value == null){
        document.getElementById('passError').style.display = 'block';
        error++;
    }else{
        document.getElementById('passError').style.display = 'none';
    }
    if(error > 0){
        e.preventDefault()
    }
})