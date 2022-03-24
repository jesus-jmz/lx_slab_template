<?php

    function init() {
        createMetric();
        define("USER_ID", getMetricId());
        setcookie("s_user_id", USER_ID, time() + (60 * 60 * 24 * 10)); 
        createSlab(USER_ID);
        updateMetric(USER_ID);
        if(isset($_SESSION["s_slabId"])){
            //echo "<br>Deck Id ya fue inicializado";
            if(setcookie("s_slab_id", $_SESSION["s_slabId"], time() + (60 * 60 * 24 * 30))){
                //echo "<br>Se insertó la cookie de deckId";
            } else {
                //echo "No se insertó la cookie";
            }
            
        } else {
            //echo "No existe el deck ID que buscas";
        }
    }

    //Crea la métrica con valores default
    function createMetric(){
        global $conn;
        $sql = "INSERT INTO metrics(progress) VALUES (0)";
        if(mysqli_query($conn, $sql)){
        } else {
            echo "Query error: " . mysqli_error($conn);
        }
    }

    //Obtener el valor recientemente insertado en la BD
    function getMetricId(){
        global $conn;
        $sql = "SELECT user_id FROM metrics ORDER BY created_at DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $metric = mysqli_fetch_assoc($result);
        return $metric["user_id"];
    }

    //UTIL -> Verifica si eciste un deck con el User ID
    function slabUserExists($userId) {
        global $conn;
        $sql = "SELECT id FROM slab WHERE user_id = $userId";
        $result = mysqli_query($conn, $sql);
        $slab = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if(isset($slab)){ 
            return true;
        } else {
            return false;
        }
    }

    //Crea un deck con el User ID
    function createSlab($userId){
        global $conn;
        //echo "Vamos a crear el deck para el usuario: ".$userId;
        if(!slabUserExists($userId)){
            $sql = "INSERT INTO slab(user_id) VALUES ($userId)";
            if(mysqli_query($conn, $sql)){
                addIdToSession($userId);
            } else {
                echo "Query error: " . mysqli_error($conn);
            }
        } else {
            //echo "Ya existe un deck con con ese ID de usuario";
            addIdToSession($userId);
        }
        
    }

    //Agrega el Deck ID como atributo de sesión
    function addIdToSession($userId){
        global $conn;
        if(!isset($_SESSION["s_slabId"])){
            $sql = "SELECT id FROM slab WHERE user_id = $userId";
            $result = mysqli_query($conn, $sql);
            $slab = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            $_SESSION["s_slabId"] = $slab["id"];
        }
    }

    //Agrega el id del deck a las métricas
    function updateMetric($userId){
        global $conn;
        $slabId = $_SESSION["s_slabId"];
        $sql = "UPDATE metrics SET slab_id = $slabId WHERE user_id = $userId";
        if(mysqli_query($conn, $sql)){
        } else {
            echo "Query error: " . mysqli_error($conn);
        }
    }


?>