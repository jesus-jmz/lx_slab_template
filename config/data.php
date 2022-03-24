<?php 

//Datos dinámicos - NO SE TOCAN -
$slab_progress = getSlabsData("slab_progress"); 
$slab_act1 = getSlabsData("act_1");
$slab_act2 = getSlabsData("act_2");
$slab_act3 = getSlabsData("act_3");

//-- Título del slab --
$slabTitle = "Agilidad"; //Título slab 1;

//-- Metas de aprendizaje --
$slabGoal = "Identifica la agilidad, principios y valores para su posible aplicación en proyectos.";

//Videos de introducción
/* 
   FORMATO: 
   * Ruta del archivo -> assets/videos/
*/ 
$slabIntroVideo = "assets/videos/SCRUM_S1.mp4";

//-- Tipos de Materiales --
/* 
   FORMATO:
   * Indicar tipo de material -> audio o video
*/ 
$slabMaterialType = "audio";

//-- Materiales --
$slabMaterial = "https://player.simplecast.com/445b23b6-bc27-4e74-a276-df3b2d0a89fd?dark=true";

//-- Transcripciones --
/* 
   FORMATO:
   * Texto de la transcripción (en caso de haber)
 */
$slabTranscriptions = "";

//-- Documento de transcripción --
/* 
   FORMATO:
   * Ruta del archivo -> assets/docs/transcripts/nombre-del-archivo
*/ 
$slabTranscriptionDoc = "assets/docs/transcripts/SCRUM_S1.pdf"; 

//ACTIVIDADES

//-- Instrucciones Descubre --
$act1_Instructions = [
    "Lee con atención la información que se presenta.",
    "Selecciona el concepto que corresponda en cada caso.",
    "Completa correctamente los espacios en blanco.",
    "Realiza una captura de pantalla con el resultado de tu actividad y guárdala.",
];

//-- Herramienta Actividad Descibre --
$act1_tool = '<iframe src="https://lxlab.h5p.com/content/1291502599954061738/embed" width="1088" height="637" frameborder="0" allowfullscreen="allowfullscreen" allow="autoplay *; geolocation *; microphone *; camera *; midi *; encrypted-media *"></iframe><script src="https://lxlab.h5p.com/js/h5p-resizer.js" charset="UTF-8"></script>';

//-- Instrucciones Actividad Demuestra --
/*
    FORMATO:
   * Cada paso completo es un arreglo
   * Un paso está compuesto por:
        * "instruction" -> La instrucción principal
        * "list" -> (Opcional) Una lista compuesta por items 
                 ->  Es un arreglo de arreglos de "item"
        * "subinstruction_list" -> (Opcional) Lista de subpasos individuales
                                -> Cada subaso es un arreglo, que tiene un elemento "subinstruction"
                                -> (Opcional) Los subpasos pueden tener extras, como botones o enlaces, marcados como "subinstruction_extra"
        * "instruction_extra" -> (Opcional) Enlaces, botones, imágenes o videos
                              -> Se necesita agregar el elemento HTML completo
                              -> Cada "instruction_extra" que se agregue necesitará la clase "tracker" como atributo
                              -> Si el "instruction_extra" es un botón, necesitará la clase "btn btn-outline-primary"
                              -> Si el botón es imagen, necesita especificar la ruta -> img/logos/nombre-del-archivo
    
 */    
$act2_instructions = [
    "instruction_list" => 
        [
            //Paso 1
            [
                "instruction" => "Elabora un cuadro sinóptico en el que:",
                "list" => [
                    ["item" => "Expliques qué es el enfoque Agile"],
                    ["item" => "Menciones cuáles son los valores y los principios que lo sustentan."],
                    ["item" => "Describas cómo la Agilidad contribuye a la optimización de los proyectos."],
                    ["item" => "Añades al menos un ejemplo concreto."],
                ],
                "subinstruction_list" => []
            ],
            //Paso 2
            [
                "instruction" => "Para guiarte en la elaboración de este esquema visual, te sugerimos descargar la guía para elaborar un cuadro sinóptico.", 
                "instruction_extra" => '<a href="assets/docs/tools/demuestra/G_Cuadro_Sinoptico.pdf" targer="_blank" class="tracker btn btn-outline-primary">Guía para cuadro sinóptico</a>',
                "subinstruction_list" => []
            ],
            //Paso 3
            [
                "instruction" => "Utiliza la herramienta digital de tu preferencia para desarrollar tu infografía. Te sugerimos explorar:",
                "instruction_extra" =>  '<a class="tracker text-center" href="https://app.diagrams.net" target="_blank"><img src="img/logos/drawio.png" alt="Logo drawio"/></a>',
                "subinstruction_list" => []
            ],
            //Paso 4
            [
                "instruction" => "Guarda el enlace con el resultado de la actividad.",
                "subinstruction_list" => []
            ],
        ]
];


//-- Instrucciones Actividad Autovaloración --
/*
    FORMATO:
   * Cada paso completo es un arreglo
   * "introduction" -> Un párrafo de introducción a la actividad (opcional)
   * "text" -> Determina si el texto es normal o negritas
   * "type" -> Determina el tipo de inciso (letra o número)
   * "extra" -> Agrega un hipervínculo después del paso
   * "list" -> Si no se utiliza una lista, se deja un arreglo vacío
   * "extra_element" -> Agreaga una lista extra de instrucciones
   *                 -> Está compuesta de los siguientes elementos:
   *                    -> "extra_intro" -> Introducción a la sección
   *                    -> "extra_instruction_list" -> Lista de instrucciones
   *                    -> "extra_instruction" -> Instrucción extra
   
*/
$act3_instructions = [
        //Type: nada o letter

        //Bold or nomral
        "text" => "normal",
        //Instrucciones
        "instruction_list" => 
        //Slab 1
        [   
            //Paso 1
            [   
                "instruction" => 'Utiliza el Semáforo de Autovaloración para analizar tu nivel de desempeño de acuerdo con la actividad de la sección "Demuestra".',
                "list" => []
                 
            ],
            //Paso 2
            [
                "instruction" => "Lee con detenimiento cada uno de los elementos.",
                "list" => []
            ],
            //Paso 3
            [
                "instruction" => "Realiza un ejercicio de reflexión que te permita reconocer el grado de desempeño que demuestras a partir de los requerimientos que te solicitaron para realizar la actividad.",
                "list" => []
            ],
            //Paso 4
            [
                "instruction" => "Comparte tus reflexiones sobre la experiencia de aprendizaje que acabas de realizar en el recuadro que aparece al final.",
                "list" => []
            ],
            //Paso 4
            [
                "instruction" => "Guarda y conserva el archivo PDF con tus respuestas.",
                "list" => []
            ],
            
        ],
];

//-- Herramientas autovaloración --
/* 
   FORMATO:   
   * "type" -> Indica la visualización de las herramientas:
        * "row" -> Visualización simple. La herramienta se muestra con botón
        * "col" -> Visualización alternativa. La herramienta se muestra con imagen  

   * "tool" -> Indica el link o la ruta de la herramienta
        * Ruta del archivo -> assets/docs/tools/autoval/nombre-del-archivo

   * "img" -> Indica la ruta de la imagen
        * Ruta del archivo -> img/act/nombre-del-archivo

   * "instruction" -> Breve indicación de la imagen
    */
$act3_finalization = 
[    
        "type" => "row",
        "tool" => 'assets/docs/tools/autoval/Semaforo_S1.pdf',   
];

//-- Cierre SLAB --
$act3_final_message = "Finalizamos este slab ¡Lo has hecho muy bien!";

//-- Formulario autoevaluación --
/* 
   FORMATO:
   * Agregar el código embebido del formulario
*/
$act3_forms = '<div data-tf-widget="b5MLz3yx" data-tf-iframe-props="title=Formulario_SCRUM_S1" style="width:100%;height:400px;"></div><script src="//embed.typeform.com/next/embed.js"></script>';

?>