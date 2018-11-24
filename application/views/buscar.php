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

    <title>Buscar Registro</title>
  </head>
  <body onload="getData()">
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
              <h1>Datos De Empresa</h1>
              <div id="datosEmpresa">

              </div></br>
              <h1>Datos Representante</h1>
              <div id="datosRepresentante_legal">

              </div></br>
              <h1>Datos Socios</h1>
              <div id="datosSocios">

              </div>
      
    </div>
    <!-- Optional JavaScript -->
    <!--JS-->
     <?php
       $this->load->view("comun/js");
     ?>


            <script>
            

            function getData() {

              $.ajax({
                url: 'crear/get_datos',
                data: { a: ''},
                type: "POST",
                success: function(respuesta) {
                    console.log(respuesta);
                   

                    var contenidoEmpresa = "";
                    contenidoEmpresa += "<div class='row'>";
                    contenidoEmpresa += "<h5>Rut : "+ respuesta.rut +"</h5>";
                    contenidoEmpresa += "</div>";
                    contenidoEmpresa += "<h5>Razon Social :" + respuesta.razon_social + "</h5>";
                    contenidoEmpresa += "<h5>Fecha de Constitucion :" + moment.unix(respuesta.fecha_constitucion).format("DD/MM/YYYY") + "</h5>";
                    contenidoEmpresa += "<h5>Fecha de Inicio de Actividades :" + moment.unix(respuesta.fecha_inicio_actividades).format("DD/MM/YYYY")  + "</h5>";
                    var contenidoRepresentante_legal="";
                    contenidoRepresentante_legal += "<input value='" + respuesta.rep_nombre + "'>";
                    contenidoRepresentante_legal += "<input value='" + respuesta.rep_rut + "'></br>";
                    var contenidoSocios = "";
                    
                    contenidoSocios += "<input value='" + respuesta.socios[0].nombre + "'>";
                    contenidoSocios += "<input value='" + respuesta.socios[0].rut + "'>";
                    contenidoSocios += "<input value='" + respuesta.socios[1].acciones + "'></br>";
                    contenidoSocios += "<input value='" + respuesta.socios[1].nombre + "'>";
                    contenidoSocios += "<input value='" + respuesta.socios[1].rut + "'>";
                    contenidoSocios += "<input value='" + respuesta.socios[1].acciones + "'>";
                  $.each(respuesta.socios, function(index, socio) {
                    

                    console.log(socio.nombre);
                  });


                  $('#datosEmpresa').html(contenidoEmpresa);
                  $('#datosRepresentante_legal').html(contenidoRepresentante_legal);
                  $('#datosSocios').html(contenidoSocios);
                 


                },
                error: function() {
                    console.log("No se ha podido obtener la información");
                }
              });

            }
            
            
            </script>

  </body>
  <?php
       $this->load->view("comun/footer");
     ?>
</html>