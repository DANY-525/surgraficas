//almacenar slider con una variable
var slider=$('#slider');
var siguiente= $('#btn-next');
var anterior= $('#btn-prev');



$('#slider section:last').insertBefore('#slider section:first');

//mostrar la prma
slider.css('margin-left','-'+100+'%');

function moverD() {
	
	slider.animate({
	  marginleft:'-'+200+'%'
   },700, function(){
	    $('#slider section:first').insertAfter('#slider section:last');
		slider.css('margin-left','-'+100+'%');
   });
}
function moverI() {
	
	slider.animate({
	marginleft:0
	},700, function(){
	  $('#slider section:last').insertAfter('#slider section:first');
    	slider.css('margin-left','-'+100+'%');
	
   });
}

siguiente.on('click',function(){
	moverD();
});
anterior.on('click',function(){
	moverI();
});


function autoplay(){
	interval = setInterval(function(){
		
	moverD();
	},5000);
}
autoplay();