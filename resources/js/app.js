import Dropzone from "dropzone";


Dropzone.autoDiscover = false;

var dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles : ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
        if(document.querySelector('[name="imagen"]').value.trim()){
            let imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success');
            imagenPublicada.previewElement.classList.add('dz-complete');
        }
    }
});



dropzone.on('success', function(file, response) {
    console.log(response);
   document.querySelector('[name="imagen"]').value = response.imagen;

});

dropzone.on('error', function(file, response) {
    console.log(response);
    //document.querySelector('#error').textContent = response.errors.file[0];
})

dropzone.on('removedfile', function(file, response) {
    document.querySelector('[name="imagen"]').value = "";
});
