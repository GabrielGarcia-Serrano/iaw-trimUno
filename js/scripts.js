function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
  }
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  function openLog() {
    document.getElementById("sidenavLog").style.width = "100%";
  }
  function closeLog() {
    document.getElementById("sidenavLog").style.width = "0";
  }
  function showPassLog() {
      var x = document.getElementById("pswdlog");
      var y = document.getElementById("eyePass");
      if (x.type === "password") {
          x.type = "text";
          y.className = "glyphicon glyphicon-eye-open";
      } else {
          x.type = "password";
          y.className = "glyphicon glyphicon-eye-close";
      }
  }


  function openTables() {
    document.getElementById("tablas").style.width = "100vw";
  }
  function closeTables() {
    document.getElementById("tablas").style.width = "0";
  }

  function mostrarCaros() {
    var boton = document.createElement("button");
    boton.type = "button";
    boton.className = "btn btn-info";
    boton.innerHTML = "Ocultar caros";
    boton.onclick = ocultarCaros;
    var child = document.getElementById("precios").lastElementChild;
    while (child) {
      document.getElementById("precios").removeChild(child);
      var child = document.getElementById("precios").lastElementChild;  
    }
    document.getElementById("precios").appendChild(boton);
    var texto = document.createElement("br");
    document.getElementById("precios").appendChild(texto);
    /* Parte de la tabla */
    var tabla = document.createElement("object");
    tabla.data = "caros.php";
    document.getElementById("precios").appendChild(tabla);
  }
  function ocultarCaros() {
    var boton = document.createElement("button");
    boton.type = "button";
    boton.className = "btn btn-info";
    boton.innerHTML = "Mostrar caros";
    boton.onclick = mostrarCaros;
    var child = document.getElementById("precios").lastElementChild;
    while (child) {
      document.getElementById("precios").removeChild(child);
      var child = document.getElementById("precios").lastElementChild;  
    }
    document.getElementById("precios").appendChild(boton);
  }