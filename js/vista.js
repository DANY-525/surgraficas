 $(function(){
   	$("#foto").on("change", function(){
      /*limpiar la vista previa */
      $("#vista-previa").html('');
      var archivos = document.getElementById('foto').files;
      var navegador = window.URL || window.webkitURL; 
      
      /* recorrer los archivos */
      for (x=0; x<archivos.length; x++) 
      {
           /* validar el tamaño y tipo archivo */
           var size = archivos[x].size;
           var type = archivos[x].type;
           var name = archivos[x].name;
           if (size  > 1024*1024)
           {
            $("#vista-previa").append("<p style='color: red'>El archivo"+name+"supera el maximo permitido 1 mb</p>");
           }
           else if(type != 'image/jpg' && type != 'image/jpeg' && type !='image/png' && type !='image/gif')
           {
             $("#vista-previa").append("<p style='color:red'>El archivo"+name+"no es del tipo permitido </p>");
           }
           else
           {
            var objeto_url = navegador.createObjectURL(archivos[x]);
            $("#vista-previa").append("<img src="+objeto_url+" width='250' height='250'>");
           }
         }
    
   });
 });
 $(function(){
    $("#foto2").on("change", function(){
      /*limpiar la vista previa */
      $("#vista-previa2").html('');
      var archivos = document.getElementById('foto2').files;
      var navegador = window.URL || window.webkitURL; 
      
      /* recorrer los archivos */
      for (x=0; x<archivos.length; x++) 
      {
           /* validar el tamaño y tipo archivo */
           var size = archivos[x].size;
           var type = archivos[x].type;
           var name = archivos[x].name;
           if (size  > 1024*1024)
           {
            $("#vista-previa2").append("<p style='color: red'>El archivo"+name+"supera el maximo permitido 1 mb</p>");
           }
           else if(type != 'image/jpg' && type != 'image/jpeg' && type !='image/png' && type !='image/gif')
           {
             $("#vista-previa2").append("<p style='color:red'>El archivo"+name+"no es del tipo permitido </p>");
           }
           else
           {
            var objeto_url = navegador.createObjectURL(archivos[x]);
            $("#vista-previa2").append("<img src="+objeto_url+" width='250' height='250'>");
           }
         }
    
   });
 });

 $(function(){
    $("#foto3").on("change", function(){
      /*limpiar la vista previa */
      $("#vista-previa3").html('');
      var archivos = document.getElementById('foto3').files;
      var navegador = window.URL || window.webkitURL; 
      
      /* recorrer los archivos */
      for (x=0; x<archivos.length; x++) 
      {
           /* validar el tamaño y tipo archivo */
           var size = archivos[x].size;
           var type = archivos[x].type;
           var name = archivos[x].name;
           if (size  > 5000*5000)
           {
            $("#vista-previa3").append("<p style='color: red'>El archivo"+name+"supera el maximo permitido 5 mb</p>");
           }
           else if(type != 'image/jpg' && type != 'image/jpeg' && type !='image/png' && type !='image/gif')
           {
             $("#vista-previa2").append("<p style='color:red'>El archivo"+name+"no es una foto </p>");
           }
           else
           {
            var objeto_url = navegador.createObjectURL(archivos[x]);
            $("#vista-previa3").append("<img src="+objeto_url+" width='250' height='250'>");
           }
         }
    
   });
 });




 