
$(document).ready(function(){
	buscador();
});

/*var counter=1;*/
function buscador(){
 $('.fa-search').click(function(){
 	/*if(counter==1){
 		$('.buscador-desktop').animate({
 			bottom: '90%'
 		});
 		counter=0;
 	}else{
 		counter=1;
 		$('.buscador-desktop').animate({
 			bottom: '100%'
 		});
 	}*/
 	$('.buscador-desktop').toggle('slow');
 	$('#buscador').focus();
 });
}
//DE AQUI PARA ABAJO SON FUNCIONES PARA EL PANEL ADMINISTRATIVO
//Funcion para motrar el nombre de la foto en el boton de seleccion de foto
function getNameImage(input){
	var nameimg =input.files[0].name;
	document.getElementById('img-name').innerHTML = nameimg;
}
//Funcion para leer la foto seleccionado y mostrar en pantalla
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('#blah').show();
        }

        reader.readAsDataURL(input.files[0]);
    }
}
//ejecutando la funcion readURL cuando el usuario elige una foto 
$("#portada").change(function(){
    readURL(this);
});
//funcion para preview de varia fotos
function imagesPreview(input, placeToInsertImagePreview){
	if (input.files) {
       var filesAmount = input.files.length;

       for (i = 0; i < filesAmount; i++) {
           var reader = new FileReader();

           reader.onload = function(event) {
               $($.parseHTML('<img class="img-thumbnail" width="200">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
           }

           reader.readAsDataURL(input.files[i]);
       }
   }
}
//Lamando a la function imagesPreview
$('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });


