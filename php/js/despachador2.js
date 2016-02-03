var READY_STATE_COMPLETE = 4;
var OK = 200;

//variables



var ajax = null;
var btnInsertar = document.querySelector("#insertar");
var precarga = document.querySelector("#precarga");
var respuesta = document.querySelector("#respuesta");
var btnsEliminar = document.querySelectorAll(".eliminar");
var btnsEditar = document.querySelectorAll(".editar");
//funciones
function objetoAJAX()
{
  if(window.XMLHttpRequest)
  {
        return new XMLHttpRequest();
  }
  else if(window.ActiveXOBject)
  {
       return new ActiveXOBject("Microsoft.XMLHTTP");
  }
}
function enviarDatos()
{
       precarga.style.display= "block";
       precarga.innerHTML= "<img src='img/loader.gif' />";
       if (ajax.readyState == READY_STATE_COMPLETE) 
        {

          if(ajax.status ==OK)
          {
             //console.log(ajax);
                //alert("wii");
                //alert(ajax.responseText);
                precarga.innerHTML = null;
                precarga.style.display ="none";
                respuesta.style.display = "block";
                respuesta.innerHTML = ajax.responseText;

                if(ajax.responseText.indexOf("data-insertar")>-1)
                {
                  document.querySelector("#alta-productos").addEventListener("submit",insertarActualizarHeroe);

                }
                 if(ajax.responseText.indexOf("data-editar")>-1)
                {
                  document.querySelector("#editar-productos").addEventListener("submit",insertarActualizarHeroe);

                }
                if(ajax.responseText.indexOf("data-recargar")>-1)
                {
                  setTimeout(window.location.reload(),5000);
                }




             }
            else
             {
              //console.log(ajax);
                //alert("noo");
                alert("El servidor no contesto\nError "+ajax.status+": "+ajax.statusText);
            }
            console.log(ajax);

        }
}
function ejecutarAJAX(datos)
{
 ajax = objetoAJAX();
 ajax.onreadystatechange=enviarDatos;
 ajax.open("POST","php/controlador.php");
 /*
 http://es.wikpedia.org/wiki/Multipurpose_Iternet_Mail_Extensions#MIME-Version
 http://sites.utoronto.ca/webdocs/HTMLdocs/Book/Book-3ed/appb/mimetype.html
 */
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 ajax.send(datos);
}

function insertarActualizarHeroe(evento)
{
  //alert("procesa formulario");
  evento.preventDefault();

  //console.log(evento);
  //console.log(evento.target);
  //console.log(evento.target[0]);
  //console.log(evento.target.length);
  var nombre = new Array();
  var valor = new Array();
  var HijosForm = evento.target;
  var datos = "";
  for( var i=1; i<HijosForm.length; i++)
  {
    nombre [i] = HijosForm[i].name;
    valor[i] = HijosForm[i].value;
    datos += nombre[i]+"="+valor[i]+"&";
    //console.log(datos);

  }

  
  //png&descripcion_txa=blablablablabla&editorial_slc=1";
  ejecutarAJAX(datos);
}
function altaProducto(evento)
{
  evento.preventDefault();
  //alert("funciona");
  var datos ="transaccion=alta";
  ejecutarAJAX(datos);
}

function eliminarPro(evento)
{
  evento.preventDefault();
  //alert(evento.target.dataset.id);
  var idHeroe = evento.target.dataset.id;
  var eliminar = confirm("¿Estas seguro de elminar el producto Con el Id:"+idHeroe);
   if(eliminar)
   {
     var datos= "idHeroe="+idHeroe+"&transaccion=eliminar";
     ejecutarAJAX(datos);
   }
}
function editarProducto(evento)
{
   evento.preventDefault();
  //alert(evento.target.dataset.id)
  var idPro = evento.target.dataset.id;
  var datos ="idPro="+idPro+"&transaccion=editar";
  ejecutarAJAX(datos);

}
function alCargarDocumento()
{
btnInsertar.addEventListener("click",altaProducto);

      for( var i=0 ; i < btnsEliminar.length; i++)
      {
          btnsEliminar[i].addEventListener("click",eliminarPro);
      }
      for( var i=0 ; i < btnsEliminar.length; i++)
      {
          btnsEditar[i].addEventListener("click",editarProducto);
      }

}
     


   
//Eventos
window.addEventListener("load",alCargarDocumento);