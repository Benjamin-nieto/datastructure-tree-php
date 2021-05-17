<?php
include("arbolBinario.php");

session_start();
if (isset($_SESSION["arbol"]) == false) {
    $_SESSION["arbol"] = new arbolBinario(null);
}
function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function messageDialog($msg)
{

    echo '<script type="text/javascript">
    function print_save1(){
        document.getElementById("danger-div").style.display = "block";
        document.getElementById("danger-div").innerHTML = "' . $msg . '";

    }
    print_save1();
    function desprint_save1(){
        document.getElementById("danger-div").innerHTML = "";
        document.getElementById("danger-div").style.display = "none";
    }
    setTimeout(desprint_save1, 2000);

    </script>';
}
function deleteDialog($msg)
{

    echo '<script type="text/javascript">
    function print_save2(){
        document.getElementById("danger-div").style.display = "block";
        document.getElementById("danger-div").innerHTML = "' . $msg . '";

    }
    print_save2();
    function desprint_save2(){
        document.getElementById("danger-div").innerHTML = "";
        document.getElementById("danger-div").style.display = "none";
    }
    setTimeout(desprint_save2, 2000);

    </script>';
}


?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphs</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="resources/css/general.css">


    <link rel="shortcut icon" type="image/jpg" href="https://www.cuc.edu.co/templates/it_university3/favicon.ico" />
    <script href="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
    <!-- <link rel="stylesheet" href="node_modules/vis/dist/vis.css" type="text/css"> -->


</head>

<body>
    <div class="container-fluid">
        <div class="alert alert-primary" id="danger-div" role="alert" style="display: none;">
        </div>
        <div class="alert alert-danger" id="danger-div" role="alert" style="display: none;">
        </div>

        <div class="row">
            <div class="col-12">
                <div style="position: relative;text-align: center;border-bottom: 1px solid gray;">
                    <div style="display: inline-flex;"><svg xmlns="http://www.w3.org/2000/svg" style="color:#f36d0e;" width="58" height="58" fill="currentColor" class="bi bi-diagram-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 5 7h2.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM3 11.5A1.5 1.5 0 0 1 4.5 10h1A1.5 1.5 0 0 1 7 11.5v1A1.5 1.5 0 0 1 5.5 14h-1A1.5 1.5 0 0 1 3 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 1 9 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                        </svg>
                        <h1>Arboles binarios</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Action Trees-->
            <div class="col-6">
                <div class="row" style="display: block;">
                    <div class="col-12">
                        <form method="post">
                            <p>Crear Arbol</p>
                            <div class="mb-3">
                                <input type="text" class="form-control-sm" placeholder="Nombre de la raiz" aria-label="default input example" id="txt-raiz" name="txt-raiz">
                                <input type="submit" value="Crear Arbol" name="btn-crear-raiz" class="btn btn-outline-dark">
                            </div>
                        </form>

                    </div>
                </div>
                <form method="post">
                    <input type="submit" value="ver arbol" name="ver-arbol">
                    <input type="submit" value="ver arbol-recursivo" name="ver-arbol-recursivo" disabled>
                </form>

                <div class="row">

                    <div class="col-12">
                        <form method="post" style="margin-bottom: 0px;">
                            <div class="mb-3" style="display: inline-flex;">
                                <input type="text" class="form-control-sm" placeholder="Nombre padre" aria-label="default input example" id="txt-padre" name="txt-padre" style="height: 36px;">
                                <!-- <input type="submit" value="Crear Arbol" name="btn-crear-raiz" class="btn btn-outline-dark"> -->
                                <div id="content-radio-block" style="border: 1px solid;border-radius: 4px;margin-left: 10px;">
                                    <div class="form-check" style="margin-left: 8px;margin-right: 8px;">
                                        <input class="form-check-input" type="radio" name="radioDirection" id="radioDerecho" value="D" checked>
                                        <label class="form-check-label" for="radioDerecho">
                                            Derecho
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-left: 8px;margin-right: 8px;">
                                        <input class="form-check-input" type="radio" name="radioDirection" id="radioIzquierdo" value="I">
                                        <label class="form-check-label" for="radioIzquierdo">
                                            Izquierda
                                        </label>
                                    </div>
                                </div>
                                <input type="text" class="form-control-sm" placeholder="Nombre hijo" aria-label="default input example" id="txt-hijo" name="txt-hijo" style="height: 36px;margin-left: 3px;">
                            </div>
                            <input type="submit" value="Agregar Nodo" name="btn-add-nodo" class="btn btn-outline-dark">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="post">
                            <input type="text" class="form-control-sm" placeholder="Nombre nodo" aria-label="default input example" id="txt-node-delete" name="txt-node-delete">
                            <input type="submit" value="Eliminar Nodo" name="btn-detelete-nodo" class="btn btn-outline-dark">

                        </form>
                    </div>
                </div>

                <div class="row" style="display: inline-flex;">
                    <div class="col-6">
                        <form method="post">
                            <input type="submit" value="Contar. Numero Nodos" class="btn btn-outline-dark">
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="post">
                            <input type="submit" value="El Arbol es completo ?" class="btn btn-outline-dark">
                        </form>
                    </div>
                </div>

                <div class="row" style="display: inline-flex;">
                    <div class="col-6">
                        <form method="post">
                            <input type="submit" value="Contar. Numeros pares" class="btn btn-outline-dark">
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="post">
                            <input type="submit" value="Recorrido pos-orden" class="btn btn-outline-dark">
                        </form>
                    </div>
                </div>

                <div class="row" style="display: inline-flex;">
                    <div class="col-6">
                        <form method="post">
                            <input type="submit" value="Recorrido por niveles" class="btn btn-outline-dark">
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="post">
                            <input type="submit" value="Ver nodos hojas" class="btn btn-outline-dark">
                        </form>
                    </div>
                </div>

                <div class="row" style="display: inline-flex;">
                    <div class="col-6">
                        <form method="post">
                            <input type="submit" value="Recorrido Pre-orden" class="btn btn-outline-dark">
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="post">
                            <input type="submit" value="Calcular Altura" class="btn btn-outline-dark">
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form method="post">
                            <input type="submit" value="Recorrido In-orden" class="btn btn-outline-dark">
                        </form>
                    </div>
                </div>
            </div>

            <!-- Preview Tree-->
            <div class="col-6">
                <div class="row">
                    <?php // Crear arbol

                    if (isset($_SESSION["arbol"])) { // simpre existe solo que vacio 
                        if (isset($_POST["ver-arbol"])) {

                            $root = $_SESSION["arbol"]->getRaiz();
                            echo "Padre: ";
                            print_r($root);
                            echo "<br> VerHijos:</br>";
                            $_SESSION["arbol"]->verHijos($root);
                        }
                    }
                    ## CREAR RAIZ
                    if (isset($_POST["btn-crear-raiz"])) {
                        $value = $_POST["txt-raiz"];
                        echo "<br>Crear raiz... con valor" . $value;

                        if ($value != null || $value != "") {
                            $_SESSION["arbol"]->crearArbol(new Nodo($value));
                        } else {
                            echo "<br>No se puede crear raiz o nodo vacio";
                        }
                        ## ADICIONAR NODO A PADRE
                    } elseif (isset($_POST["btn-add-nodo"])) {
                        $direction = $_POST['radioDirection'];
                        $padre = $_POST["txt-padre"];
                        $nodo = $_POST["txt-hijo"];

                        if (!empty($direction)) {
                            if ($nodo != null || $nodo != "") {
                                /// buscar si existe padre
                                echo "nodo nuevo: '".$nodo."' a padre '".$padre."'<br>";
                                $existe =  $_SESSION["arbol"]->buscar($_SESSION["arbol"]->getRaiz(), $padre);

                                if (empty($existe)) {
                                    echo "<br>El padre no existe";
                                } else {
                                    echo 'Se Agregara nodo hijo "' . $nodo . '" en ' . $_POST['radioDirection'] . " con padre " . $padre;
                                    $nodoagregardo = $_SESSION["arbol"]->agregarNodo(new Nodo($nodo), $direction, $padre);
                                   


                                   /* if (!empty($nodoagregardo)) {
                                        echo "<br> nodo agregado a " . $nodoagregardo->getInfo();
                                        if ($nodoagregardo->getDerecho() != null) {
                                            echo "<br> Derecha: " . $nodoagregardo->getDerecho()->getInfo();
                                        }
                                        if ($nodoagregardo->getIzquierdo() != null) {
                                            echo "- Izquierda: " . $nodoagregardo->getIzquierdo()->getInfo();
                                        }
                                    }*/
                                }
                            } else {
                                echo "Debe ingresar valor de nodo hijo!!";
                            }
                        } else {
                            echo 'No puede ser nula la seleccion de la direction';
                        }
                    }elseif (isset($_POST["ver-arbol-recursivo"])) {
                        echo ($_SESSION["arbol"]->verArbol($_SESSION["arbol"]->getRaiz()));

                    }


                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    function generateGrafo($string_node_complete, $split_string_generate_arista)
    {
        echo '<script type="text/javascript">
    var nodos = new vis.DataSet([' . $string_node_complete . ']);
    var aristas = new vis.DataSet([' . $split_string_generate_arista . ']);
    
    var contenedores = document.getElementById("content-grafo");
    var datos = {
        nodes: nodos,
        edges: aristas
    };
    
    var opciones = {
        edges: {
            arrows: {
                to: {
                    enabled: true
                }
            }

        }
    };
    
    var grafo = new vis.Network(contenedores, datos, opciones);
    </script>';
    }

    ?>

</body>

</html>