// JavaScript Document
$(document).ready(function(){

  main();
  btnSubir();
  var altura = $('#main-menu').offset().top;

  	$(window).on('scroll',function(){
  	  if ($(window).scrollTop() > altura) {
  	    $('#main-menu').addClass('menu-fixed');
  	  }else{
  	    $('#main-menu').removeClass('menu-fixed');
  	  }
  	});

});

//boton subir al inicio
function btnSubir() {
	var btn = $('.btn-subir');

	btn.on('click',function(e){
		$('html, body').animate({
			scrollTop: 0
		},'slow');
		e.preventDefault();
	});
	$(window).on('scroll',function(){
		var scroll = $(this),
			alto = scroll.height(),
			top = scroll.scrollTop();

		if(top > alto){
			if(!btn.is(':visible')){
				btn.fadeIn();
			}
		}else{
			btn.hide();
		}

	});
}
var contador=1;
function main(){
	$('.icon-menu').click(function(){

		if (contador==1) {
			$('.menu-content').animate({
				left: '0'

			});
			$('#icon-menu').removeClass('fa-bars');
			$('#icon-menu').addClass('fa-times');
			contador=0;
		}else{
			contador=1;
			$('.menu-content').animate({
				left: '-100%'
			});
			$('#icon-menu').removeClass('fa-times');
			$('#icon-menu').addClass('fa-bars');
			

		}
	});
}

var clic = 1;
var formu = document.getElementById('mobile');
function activator(){ 
   if(clic==1){
   		formu.classList.add('activar');
   		clic = clic + 1;
   } else{
       	formu.classList.remove('activar');     
    	clic = 1;
   }   
}



