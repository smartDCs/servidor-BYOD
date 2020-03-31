 
 ///////////////////////////////////////////////////////////
 
 
 
 
 function verificarFoco(foco){   //leer de la base de datos las caracteristicas del equipo segun el boton presionado
    var boton=document.getElementById(foco.id);
     var rele=document.getElementById(foco.id).id.toString();
     var datos=rele.split('.');
    var id=datos[1];
    var subnet=datos[0];
    var canal=datos[2];
   var valor=boton.value;
   var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
        //var respuesta=xhttp.responseText;
        //alert(respuesta);
    //document.getElementById("datosUDP").innerHTML = xhttp.responseText;
    var resultado=xhttp.responseText;
    var datos=resultado.split(' ');
    var i=0;
    console.log("estados "+resultado);
        
    for(i=0;i<=datos.length-2;i++){
      
        var canal=i+1;
        var idr=datos[1].toString()+"."+datos[0].toString()+"."+canal.toString();
        var botonp=document.getElementById(idr);
        
     console.log(datos[i+2]);
        // alert("id "+id+" valor "+botonp.value);
        if(datos[i+2]=="0"){
          botonp.setAttribute("value","100");
          // botonp.value="100";
           document.getElementById("img"+idr).src='img/service-icon-02.2.png';
        }
        if(datos[i+2]=="100"){
            botonp.setAttribute("value","0");
            //botonp.value="0";
            document.getElementById("img"+idr).src='img/foco.png';
        }
       // console.log(document.getElementById(id).value);
    }
    }
  };
   console.log("peticion dev_id="+id+"&subnet="+subnet+"&canal="+canal+"&valor="+valor+"");
  xhttp.open("POST", "UDPsocket.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("dev_id="+id+"&subnet="+subnet+"&canal="+canal+"&valor="+valor+"");
  
  //console.log("peticion dev_id="+id+"&subnet="+subnet+"&canal="+canal+"&valor="+valor+"");
    
  
  }
    function mostrarValor(dimmer){
        
        var slider=document.getElementById(dimmer.id);
        var salida=document.getElementById('valor'+dimmer.id);
        salida.innerHTML=slider.value+'% ';//+dimmer.id;
        var valor=slider.value;
        var control=(dimmer.id).toString();
        var datos=control.split('.');
         var id=datos[1];
          var subnet=datos[0];
        var canal=datos[2];
        var xhttp = new XMLHttpRequest();
        
        
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
        
  var resultado=xhttp.responseText;
    var datos=resultado.split(' ');
    var i=0;
  //  console.log("estados "+resultado);
        
    for(i=0;i<=datos.length-2;i++){
      
        var canal=i+1;
        var id=datos[1].toString()+"."+datos[0].toString()+"."+canal.toString();
       // console.log("dispositivo: "+id);
        var sliderd=document.getElementById(id);
       if(datos[i+2]=="0"){
          document.getElementById("img"+id).src='img/service-icon-02.2.png';
        }else{
          document.getElementById("img"+id).src='img/foco.png';
        }
        sliderd.value=datos[i+2];
    }
 
    }
  };
  xhttp.open("POST", "UDPsocket.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("dev_id="+id+"&subnet="+subnet+"&canal="+canal+"&valor="+valor+"");
  
 // console.log("dev_id="+id+"&subnet="+subnet+"&canal="+canal+"&valor="+valor+"");
    }
 