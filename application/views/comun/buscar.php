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



<form method="post" action="<?=base_url()?>index.php/registro/buscar_sociedad">
                <div class="form-group">
                    <label>Ingrese Datos a Buscar</label>
                    <div class="row col-md-9">
                    <input type="text" class="form-control col-lg-3 col-md-3 col-sm-3 col-xs-3" autocomplete="off" placeholder="Ingrese Rut" name="registro" required>
                    <input type="text" class="form-control col-lg-3 col-md-3 col-sm-3 col-xs-3" autocomplete="off" placeholder="Ingrese PrivKey" name="correo" required>
                    </div>
                </div>
                <div class="form-group">
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
           </form>
            <br>
            <h1>Datos Empresa</h1>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
           
                <div class="form-group">
                </div>
                <div class="form-group">
                    
  
                </div>
           </form>
          </div>
      </div>

      <div class="row">
          <div class="col-md-12">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Rut</th>
                      <th scope="col">Razon Social</th>
                     
                     
                    </tr>
                  </thead>
                  <tbody>
                  <td scope="col">ID</td>
                      <td scope="col">NOMBRE</td>
                      
                    
                  </tbody>
                </table>
          </div>
      </div>
      <h1>Socios Empresa</h1>
    <div class="row">
          <div class="col-md-12">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Rut</th>
                      <th scope="col">Participacion</th>
                      <th scope="col">Incorporacion</th>
                     
                     
                    </tr>
                  </thead>
                  <tbody>
                  <td scope="col">ID</td>
                  <td scope="col">NOMBRE</td>
                  <td scope="col">ID</td>
                  <td scope="col">NOMBRE</td>
                      
                    
                  </tbody>
                </table>
          </div>
      </div>
    </div>
    </div>
    <br>

    <!-- Optional JavaScript -->
    <!--JS-->
     <?php
       $this->load->view("comun/js");
     ?>

  </body>
</html>