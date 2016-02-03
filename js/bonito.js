//almacenar slider con una variable
var slider= $('#slider');
//almacenar botones
var siguiente = $('#btn-next');
var anterior = $('#btn-prev');

// mover ultima imgen al primer lugar
$('#slider section:last').insertBefore('#slider section:first');

slider.css('margin-left','-'+100+'%');

function moverD(){
  slider.animate({
  marginleft:'-'+200+'%'
  } ,700, function(){

  	});

}
siguiente.on('click'),function(){
	moverD();
};