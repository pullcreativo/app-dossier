// JavaScript Document
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


