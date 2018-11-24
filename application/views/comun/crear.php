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
            <h1>Mostrando Registros</h1>
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
                      <th scope="col">ID</th>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">CORREO</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  <th scope="col">ID</th>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">CORREO</th>
                    
                  </tbody>
                </table>
          </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!--JS-->
     <?php
       $this->load->view("comun/js");
     ?>

  </body>
</html>