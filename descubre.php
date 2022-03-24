<?php

  include('config/setup.php');
  include('config/data.php');
 
  $slabId = $_COOKIE["s_slab_id"];
  //Obtener los datos generales que se ocupan en el slab
  //según el id del slab
  getAllSlabsData($slabId);
  $slabProgress = $_SESSION["slab_progress"];
  $slabNum = $_SESSION["slab_num"];
  $progress = $_SESSION["progress"];
  $act1 = $_SESSION["act_1"];

  
  //echo "<br>Slab ID: ".$slabId;
  //echo  "<br> El número de instrucciones es: ".count($act1_Instructions[$slabNum-1]);

  if(isset($_POST["submit"])){
    //echo "<br>Se le dio clic a Continuar";
    //function addProgress($table, $column, $tableId, $inputId, $currentProgress, $value){
    if($act1 == 0){
      $progress = addProgress("metrics", "progress", "slab_id", $slabId, $progress, 33);
      $_SESSION["progress"] = $progress;
      //echo "<br>El nuevo progreso es: ".$progress;
      $slabProgress = addProgress("slab", "slab_progress", "id", $slabId, $slabProgress, 33);
      $_SESSION["slab_progress"] = $slabProgress;
      $act1 = finishAct(1, $slabId);
      $_SESSION["act_1"] = $act1;
      header("Location: demuestra.php");
    } else {
      //echo "<br> La act ya fue terminada";
      header("Location: demuestra.php");
    }
    
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Descubre</title>
    <!--Bootsrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!--CSS-->
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/actividades.css" />
  </head>
  <body>
    <header class="pb-5">
      <div class="container w-75 menu">
        <nav>
          <a href="slab.php" class="logo">
            <img src="img/logos/lxlab.png" alt="Logo" />
          </a>
        </nav>
      </div>
      <div class="container w-75">
        <!--BEGIN: Status-->
        <div class="status d-flex align-items-center justify-content-between row">
          
          <a class="w-70 regresar" href="slab.php">Regresar</a>
          
          <div class="progreso d-flex align-items-center justify-content-end w-30 row">
            <div class="col">
              <!--Barra de progreso-->
              <div class="progress mt-0">
                <div
                class="progress-bar"
                  role="progressbar"
                  style="width: <?php echo $slabProgress;?>%"
                  aria-valuenow="<?php echo $slabProgress;?>"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>
            <div class="col-1 pl-0 pr">
              <p class="porcentaje m-0"><?php echo $slabProgress;?>%</p>
            </div>
          </div>
        </div>
        <!--END: Status-->
      </div>
    </header>
    <main class="container w-75">
      <h2 class="heading">Descubre</h2>
      <div class="instrucciones">
        <h3 class="subtiitle">Instrucciones</h3>
        <ol class="mb-5">
          <?php for($i = 0; $i<count($act1_Instructions);$i++){?>
            <li><?php echo $act1_Instructions[$i]?></li>
          <?php }?>
        </ol>
      </div>
      <div class="puzzle">
        <?php echo $act1_tool?>
      </div>
      <div class="d-flex justify-content-center align-items-center my-4">
        <form action="descubre.php" method="POST">
          <input value="Continuar" type="submit" name="submit" class="btn btn-primary"></input>
        </form>
        
      </div>
    </main>
    <footer class="p-4 mt-3 d-flex justify-content-center align-items-center">
      Copyright 2021. Tecmilenio.
    </footer>
    <!--Scripts-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
