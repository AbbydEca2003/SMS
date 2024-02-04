
function previewImage(event) {
    //script to display uploaded iamge
    var input = event.target;
    const image = input.files[0]; 
    const maxSize = 5 * 1024 * 1024; // 5MB in bytes

    //allowed file type
    const allowedtype = ['image/jpeg','image/png'];
    if(!allowedtype.includes(image.type)){
        alert("File not supported");
        document.getElementById('photo').reset();
        return;
    }else if(image.size > maxSize){
        alert("File size exceeds 5MB");
        return;
    }else{
        var reader = new FileReader();
        reader.onload = function(){
            var preview = document.getElementById('preview');
            preview.src = reader.result;
        };
    
        reader.readAsDataURL(image);
        //test
    }
}
