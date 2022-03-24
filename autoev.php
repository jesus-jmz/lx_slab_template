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
  $act3 = $_SESSION["act_3"];
  $rating = $_SESSION["rating"];
  

  //echo "<br>El slab Num de este slab es: ".$slabNum;
  //echo "<br>El current slab es: ".$currentSlab;

  /*if(isset($_POST["cambio"])){
    echo "El slab num ahora es: ".$slabNum;
    header("Location: slab.php");
  }*/

  if(isset($_POST["submit"])){
    //echo "<br>Se le dio clic al botón ".$_POST["submit"];
    
    //function addProgress($table, $column, $tableId, $inputId, $currentProgress, $value){
    if($act3 == 0){
      $progress = addProgress("metrics", "progress", "slab_id", $slabId, $progress, 34);
      $_SESSION["progress"] = $progress;
      //echo "<br>El nuevo progreso es: ".$progress;
      $slabProgress = addProgress("slab", "slab_progress", "id", $slabId, $slabProgress, 34);
      $_SESSION["slab_progress"] = $slabProgress;
      $act3 = finishAct(3, $slabId);
      $_SESSION["act_3"] = $act3;
    }

    //echo "Lo que se recibió del submit fue: ".$_POST["submit"];
    //echo "Lo que yo tengo es: "."Slab ".($slabNum+1);
    $receivedNum = ($slabNum+1);
      
    switch($_POST["submit"]) {
      case "Home":
        header("Location: slab.php");
        break;
      case "Deck de SCRUM":
        $_SESSION["slabId"] = $_POST["next_slab"];
        header("Location: https://cimalxplab.mx/lx_t1/index.php");
        break;
    }
    
  } //END Submit

  $num_instrucciones = count($act3_instructions["instruction_list"]);
  //echo "<br>Número de instrucciones: ".$num_instrucciones;
  $instruction_list = $act3_instructions["instruction_list"];
  $instruction_list = $act3_instructions["instruction_list"];
  //print_r($instruction_list);

  //Trackers
$slabTrackers = getTrackersSlab($slabId);
$ts_7 = $slabTrackers["ts_7"];
$ts_8 = $slabTrackers["ts_8"];
$ts_9 = $slabTrackers["ts_9"];

//echo "<br>El valor inicial de ts_7 es: ".$slabTrackers["ts_7"];

$name = $slabId."_ts_7";
if(isset($_COOKIE[$name])){
  if($slabTrackers["ts_7"]==0){
    setSlabTracker("ts_7", $slabId, $_COOKIE[$name]);
    //Borra la cookie
    unset($_COOKIE[$name]);
    setcookie($name, "", time() - 3600);
  }
}

$name = $slabId."_ts_8";
if(isset($_COOKIE[$name])){
  if($slabTrackers["ts_8"]==0){
    setSlabTracker("ts_8", $slabId, $_COOKIE[$name]);
    //Borra la cookie
    unset($_COOKIE[$name]);
    setcookie($name, "", time() - 3600);
  }
}

$name = $slabId."_ts_9";
if(isset($_COOKIE[$name])){
  if($slabTrackers["ts_9"]==0){
    setSlabTracker("ts_9", $slabId, $_COOKIE[$name]);
    //Borra la cookie
    unset($_COOKIE[$name]);
    setcookie($name, "", time() - 3600);
  }
}

$ratingName = $slabId."_rating";
if(isset($_COOKIE[$ratingName])){
  if($rating != $_COOKIE[$ratingName]){
    setRating($slabId, $_COOKIE[$ratingName]);
  }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Autoevaluación</title>
    <!--Bootsrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <!--CSS-->
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/actividades.css" />
    <link rel="stylesheet" href="css/star.css" />
  </head>
  <body>
    <input type="hidden" id="value_ts_7" value="<?php echo $ts_7?>" name="value_ts_7">
    <input type="hidden" id="value_ts_8" value="<?php echo $ts_8?>" name="value_ts_8">
    <input type="hidden" id="value_ts_9" value="<?php echo $ts_9?>" name="value_ts_9">
    <input type="hidden" id="slabId" value="<?php echo $slabId?>" name="slabId">

    <header class="pb-5">
      <div class="container w-75 menu">
        <nav>
          <a href="slab.php" class="logo">
            <img src="img/logos/lxlab.png" alt="Logo" />
          </a>
        </nav>
      </div>
      <div class="container w-75">
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

      

      <h2 class="heading">Autovaloración</h2>
      <!--Prueba dinámica-->
      <div class="instrucciones">
        <h3 class="subtiitle">Instrucciones</h3>
        <?php if(isset($act3_instructions["introduction"])){?>
          <p><?php echo $act3_instructions["introduction"];?></p>
        <?php }?>
        <!--Lista de Instrucciones-->
        <ol class="instructions">
          <!--Ciclo de instrucciones-->
          <?php for($i = 0; $i < $num_instrucciones; $i++){?>
            <!--Instrucción individual-->
            <li class="<?php
              if($act3_instructions["type"] == "letter") { echo "letter-instructions "; } 
              if($act3_instructions["text"] == "bold") { echo "bold "; }
              ?> 
              instructions"><?php echo $instruction_list[$i]["instruction"]?>
              <?php if(isset($instruction_list[$i]["extra"])){?>
                <span>
                  <a class="tracker" href="<?= $instruction_list[$i]["extra"]["link"]?>" target="_blank">
                    <?= $instruction_list[$i]["extra"]["text"]?>
                  </a>
                </span>
              <?php }?>
            </li>
            <!--Verificar si hay una lista en la instrucción-->
            <?php if(isset($instruction_list[$i]["list"])){?>
              <ul class="subinstructions">
                <!--Ciclo de items de lista-->
                <?php for($k = 0; $k < count($instruction_list[$i]["list"]); $k++){?>
                  <li>
                    <?php echo $instruction_list[$i]["list"][$k]["item"]?>
                  </li>
                <?php }?>
              </ul>
            <?php }?>
          <?php }?>
        </ol>
        <!--END: Lista de instrucciones-->
        <?php if(isset($act3_instructions["extra_element"])){?>
          <p><?php echo $act3_instructions["extra_element"]["extra_intro"];?></p>
          <ol>
            <?php for($i = 0; $i< count($act3_instructions["extra_element"]["extra_instruction_list"]);$i++) { ?>
              <li><?php echo $act3_instructions["extra_element"]["extra_instruction_list"][$i]["extra_instruction"]?></li>
            <?php }?>
        <?php }?>
          </ol>
          <!--Finalización-->
          <div class="container mt-4">
          <?php if($act3_finalization["type"]=="row"){?>
            <!--Finalización por filas-->
            <div class="botones-row d-flex flex-column mx-auto">
              <a href="<?= $act3_finalization["tool"]?>" target="_blank" class="tracker btn btn-primary mb-3">Herramienta <i class="bi bi-box-arrow-up-right"></i></a>
              <div class="text-center">
                <i class="italic-text text-center">Da clic en el botón para anexar<br>los resultados de Demuestra y Autovaloración</i>
              </div>
              
              <!--Botón modal-->
              <button id="subir-evidencias" type="button" class="tracker btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#uploadModal">Subir Evidencias</button>
              <!--Finalizar Slab-->
              <button id="subir-evidencias" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#finalModal">Finalizar Slab</button>
            </div>
          <?php } else {?>
            <!--Finalización por columnas-->
            <div class="row">
              <div class="col-md text-center">
                <?php if(isset($act3_finalization["instruction"])){?>
                  <p class="f-instruction"><?= $act3_finalization["instruction"]?></p>
                <?php }?>
                <?php if(isset($act3_finalization["img"])){?>
                  <a id="diana-link" href="https://www.geogebra.org/m/mqsarxyq" target="_blank">
                    <img class="tracker tool-img" src="<?= $act3_finalization["img"]?>" alt="Diana" />
                  </a>
                <?php }?>
              </div>
              <div class="col-md text-center d-flex flex-column justify-content-center final-col">
                <i class="italic-text">Da clic en el botón para anexar<br>los resultados de Demuestra y Autovaloración</i>
                <div class="botones d-flex flex-column mx-auto">
                  <!--Botón modal-->
                  <button id="subir-evidencias" type="button" class="tracker btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">Subir Evidencias</button>
                  <!--Finalizar Slab-->
                  <button id="subir-evidencias" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#finalModal">Finalizar Slab</button>
                </div>
              </div>
            </div>
          <?php }?>
          </div>



        <!--Modal List-->
          <!-- Modal subir evidencias-->
          <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body typeform-body">
                  <!--Form Typeform-->
                  <?php echo $act3_forms?>  
                </div>
              </div>
            </div>
          </div>
          <!--END: Modal subir evidencias-->
          <!-- Modal finalizar slab-->
          <div class="modal fade" id="finalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog final-modal-dialog">
              <div class="modal-content">
                <div class="modal-body final-modal-body">
                  <h4 class="modal-heading white-text">¡Slab finalizado!</h4>
                  <p class="modal-message white-text"><?= $act3_final_message?></p>

                    <!--Rating-->
                    <h3 class="subtitle white-text star-text mt-2">Valóranos</h3>
                    <form>
                      <fieldset>
                        <span class="star-cb-group">
                          <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
                          <input type="radio" id="rating-4" name="rating" value="4" checked="checked" /><label for="rating-4">4</label>
                          <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                          <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                          <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                          <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
                        </span>
                      </fieldset>
                    </form>
                    <!--Botones-->
                    <div class="botones-modal d-flex flex-column mx-auto">
                      <form action="autoev.php" method="POST">
                        <input value="Home" type="submit" name="submit" class="btn btn-primary w-100"></input>
                      </form>
                      <form action="autoev.php" method="POST">
                        <input type="hidden" name="next_slab" value="<?= ($slabId+1)?>">
                        <p class="text-center white-text small-text mb-h">¿Quieres saber más de SCRUM?</p>
                        <input value="Deck de SCRUM" type="submit" name="submit" class="btn btn-primary w-100"></input>
                      </form>
                    </div>
                    
                  
                </div>
              </div>
            </div>
          </div>
          <!--END: Modal finalizar slab-->
        <!--END: Modal list-->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//embed.typeform.com/next/embed.js"></script>
    <script type="module" src="js/autoev.js" ></script>
    <script type="module" src="js/rating.js" ></script>
  </body>
</html>
