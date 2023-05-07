import Dropzone from "dropzone";


Dropzone.autoDiscover = false;

var dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles : ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar Archivo",
    maxFiles: 1,
    uploadMultiple: false,
});


dropzone.on('sending', function(file, xhr, formData) {
    console.log(formData);
});

dropzone.on('success', function(file, response) {
    console.log(response);
   
});

dropzone.on('error', function(file, response) {
    console.log(response);
    //document.querySelector('#error').textContent = response.errors.file[0];
})

