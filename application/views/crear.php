<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--CSS -->
    <?php
       $this->load->view("comun/css");
     ?>

    <title>Crear Registro</title>
  </head>
  <body>
    <?php
      $this->load->view("comun/menu");
    ?>
    <div class="container sombra" style="margin-top: 10px;">
      <div class="row">
          <div class="col-md-12 text-left">
            <?php
              if ($this->session->userdata('mensaje')!=null) {
                 ?> 
                    <div class="alert alert-success" role="alert">
                      <?=$this->session->userdata('mensaje')?>
                    </div>
                 <?php
                 $this->session->unset_userdata('mensaje');
              }
            ?>
            <br>
            <h1>Ingresar registro</h1>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
            <form method="post" action="<?=base_url()?>index.php/registro/add_registro">
                <div class="form-group">
                    <label>Ingrese su registro</label>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Ingrese su registro" name="registro" required>
                    <input type="email" class="form-control" autocomplete="off" placeholder="Ingrese su correo" name="correo" required>
                </div>
                <div class="form-group">
                    
                    <button type="button" onclick="getData()" class="btn btn-primary">Buscar data</button>
                </div>
           </form>
          </div>
      </div>

              <div id="datosEmpresa">

              </div></br>
              <div id="datosRepresentante_legal">

              </div></br>

              <button onclick='addSocio()'> + SOCIO</button>
              <div id="datosSocios">


              </div>
              <div style="text-align: center;">
              <button class="btn btn-success" id="crearSociedad" onclick="generarData()">Crear Sociedad</button>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!--JS-->
     <?php
       $this->load->view("comun/js");
     ?>


            <script>
     $( document ).ready(function() {
      $("#crearSociedad").hide();
              });
              function addSocio() {


                var divsSocios = $("[id^='socio']");

                console.log(divsSocios);

                var index= divsSocios.length + 1;
                var contenidoSocios = "";
                contenidoSocios += "<hr/>";
                contenidoSocios += "<div id='socio" + (index) +"'>";
                contenidoSocios += "<div class='row'>";
                contenidoSocios += "<label class='col-lg-2'>Nombre Socio :</label>";
                contenidoSocios += "<input class='form-control col-lg-4' value=''></br>";
                contenidoSocios += "</div>";
                contenidoSocios += "<div class='row'>";
                contenidoSocios += "<label class='col-lg-2'>Rut Socio :</label>";
                contenidoSocios += "<input class='form-control col-lg-4' value=''></br>";//rut
                contenidoSocios += "</div>";
                contenidoSocios += "<div class='row'>";
                contenidoSocios += "<label class='col-lg-2'>Acciones Socio :</label>";
                contenidoSocios += "<input class='form-control col-lg-4' value=''></br>";
                contenidoSocios += "</div>";
                contenidoSocios += "<button onclick='deleteThis(this)'> - Socio</button>";
                
                contenidoSocios += "</div>";
                
               
                $('#datosSocios').html($('#datosSocios').html() + contenidoSocios);

              }
              function deleteThis(button){

                $(button).parent().remove();
                
              }
            function getData() {

              $.ajax({
                url: 'crear/get_datos',
                data: { a: ''},
                type: "POST",
                success: function(respuesta) {
                    console.log(respuesta);
                   

                    var contenidoEmpresa = "";
                    contenidoEmpresa += "<div class='row'>";
                    contenidoEmpresa += "<label class='col-lg-2'>Rut :</label>";
                    contenidoEmpresa += "<input id='RutEmpresa' class='form-control col-lg-4' value='" + respuesta.rut + "'></br>";
                    contenidoEmpresa += "</div>";
                    contenidoEmpresa += "<div class='row'>";
                    contenidoEmpresa += "<label class='col-lg-2'>Razon Social :</label>";
                    contenidoEmpresa += "<input id='RazonSocial' class='form-control col-lg-4' value='" + respuesta.razon_social + "'></br>";
                    contenidoEmpresa += "</div>";
                    contenidoEmpresa += "<div class='row'>";
                    contenidoEmpresa += "<label class='col-lg-2'>Fecha Constitucion Empresa :</label>";
                    contenidoEmpresa += "<input id='ConstitucionEmpresa' class='form-control col-lg-4' value='" + moment.unix(respuesta.fecha_constitucion).format("DD/MM/YYYY") + "'></br>";
                    contenidoEmpresa += "</div>";
                    contenidoEmpresa += "<div class='row'>";
                    contenidoEmpresa += "<label class='col-lg-2'>Fecha Inicio Actividades :</label>";
                    contenidoEmpresa += "<input id='InicioActividades' class='form-control col-lg-4' value='" + moment.unix(respuesta.fecha_inicio_actividades).format("DD/MM/YYYY") + "'></br>";
                    contenidoEmpresa += "</div>";
     
                    var contenidoRepresentante_legal="";
                    contenidoRepresentante_legal += "<div class='row'>";
                    contenidoRepresentante_legal += "<label class='col-lg-2'>Nombre Representante :</label>";
                    contenidoRepresentante_legal += "<input id='NombreRepresentante' class='form-control col-lg-4' value='" + respuesta.rep_nombre + "'></br>";
                    contenidoRepresentante_legal += "</div>";
                    contenidoRepresentante_legal += "<div class='row'>";
                    contenidoRepresentante_legal += "<label class='col-lg-2'>Rut Representante :</label>";
                    contenidoRepresentante_legal += "<input id='RutRepresentante'  class='form-control col-lg-4' value='" + respuesta.rep_rut + "'></br>";
                    contenidoRepresentante_legal += "</div>";
                   
                    var divsnSocios = $("[id^='nsocio']");
                    var index= divsnSocios.length + 1;
                    var contenidoSocios = "";
                    
                    contenidoSocios += "<div id='socio" + (1) +"'>";
                    contenidoSocios += "<div class='row'>";
                    contenidoSocios += "<label class='col-lg-2'>Nombre :</label>";
                    contenidoSocios += "<input id='nsocio" + (index) +"' class='form-control col-lg-4' value=''></br>";
                    contenidoSocios += "</div>";
                    contenidoSocios += "<div class='row'>";
                    contenidoSocios += "<label class='col-lg-2'>Rut :</label>";
                    contenidoSocios += "<input id='nsocio" + (index) +"' class='form-control col-lg-4' value=''></br>";
                    contenidoSocios += "</div>";
                    contenidoSocios += "<div class='row'>";
                    contenidoSocios += "<label class='col-lg-2'>Acciones :</label>";
                    contenidoSocios += "<input id='nsocio" + (1) +"' class='form-control col-lg-4' value=''></br>";
                    contenidoSocios += "</div>";
                    contenidoSocios += "</div>";
                    

                    /*
                    contenidoSocios += "<input value='" + respuesta.socios[0].nombre + "'>";
                    contenidoSocios += "<input value='" + respuesta.socios[0].rut + "'>";
                    contenidoSocios += "<input value='" + respuesta.socios[1].acciones + "'></br>";
                    contenidoSocios += "<input value='" + respuesta.socios[1].nombre + "'>";
                    contenidoSocios += "<input value='" + respuesta.socios[1].rut + "'>";
                    contenidoSocios += "<input value='" + respuesta.socios[1].acciones + "'>";

                    */
                  $.each(respuesta.socios, function(index, socio) {
                    

                    console.log(socio.nombre);
                  });


                  $('#datosEmpresa').html(contenidoEmpresa);
                  $('#datosRepresentante_legal').html(contenidoRepresentante_legal);
                  $('#datosSocios').html(contenidoSocios);
                  $("#crearSociedad").show();
                 


                },
                error: function() {
                    console.log("No se ha podido obtener la información");
                }
              });

            }
            function generarData(){
              var rut= $("#RutEmpresa").val();
              var razonSocial= $("#RazonSocial").val();
              var constitucionEmpresa= $("#ConstitucionEmpresa").val();
              var inicioActividades= $("#InicioActividades").val();
              var nombreRepresentante= $("#NombreRepresentante").val();
              var rutrepresentante= $("#RutRepresentante").val();
              if (rut=== undefined || rut === null || rut.trim() === ""){
                alert("Falta Rut");
                return;
              }
              if (razonSocial=== undefined || razonSocial === null || razonSocial.trim() === ""){
                alert("Falta Razon Social");
                return;
              }
              if (constitucionEmpresa=== undefined || constitucionEmpresa === null || constitucionEmpresa.trim() === ""){
                alert("Falta Fecha Constitucion Empresa");
                return;
              }
              if (inicioActividades=== undefined || inicioActividades === null || inicioActividades.trim() === ""){
                alert("Falta Fecha Inicio actividades");
                return;
              }
              if (nombreRepresentante=== undefined || nombreRepresentante === null || nombreRepresentante.trim() === ""){
                alert("Falta Nombre del Representante");
                return;
              }
              if (rutRepresentante=== undefined || rutRepresentante === null || rutRepresentante.trim() === ""){
                alert("Falta Rut del Representante");
                return;
              }
              
            }
            
            </script>

  </body>
  <?php
       $this->load->view("comun/footer");
     ?>
</html>