<?php
    use App\Models\Board;

    //Instanciando el Objeto $pizarra de la clase Board
    $pizarra = new Board;
    //Capturamos el último registro de la tabla
    $ultimo=$pizarra::orderBy('id','desc')->first();

    //Rutina para mostrar fecha en letras (pizarra->seccion "precios")
    $meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $dia=date('d');
    $mes=$meses[date('n')-1];
    $año=date('Y');
    $fecha=$dia.' de '.$mes.' de '.$año;

    //Asignamos valores a variables para ser mostradas en la vista
    $precioMaiz=$ultimo['precioProductoUno'];
    $precioSecado=$ultimo['precioProductoDos'];
    $precioAlmacenaje=$ultimo['precioProductoTres'];
    $precioInOut=$ultimo['precioProductoCuatro'];
    $fechaInicio=$ultimo['fecha'];
    $fechaCambio=$ultimo['fechaCambio'];
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="sgmfniquen, arrocera, parral, ñiquen"/>
        <title>Portal SGM - Sistema de Gestión Maíz </title>
        <link rel="icon" href="./src/img/logofn2.png" type="image/x-icon">

        <link rel="stylesheet" href="./css/style.css">
        <link rel="icon" type="image/x-icon" href="./src/img/logofn2.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    
    <body>
        
        <div class="container-fluid content">
            <div class="row justify-content-around bg-dark py-2">
                <div class="col-12 col-md-3 my-auto text-white">
                  <a href="{{route('home')}}" style="font-size:1em;text-decoration:none;" class="text-warning">
                      <i class="bi bi-house text-warning"></i> Ir al Inicio
                  </a>
                </div>
                <div class="col-3 col-md-1 my-auto">
                    <img class="img img-fluid" src="./src/img/logofn2.png" alt="Logo Compañia">
                </div>
                <div class="col-9 col-md-7 text-white py-2" style="font-family:'Curier'">
                    <h1>Arrocera Flor de Ñiquen Ltda.</h1>
                </div>
            </div>
            <hr class="text-primary bg-dark m-0 py-0">
            <div class="row index-bg">
                <div class="col-12 col-md-7 mt-4 my-2">    
                    <div class="card">
                      <div class="card-header text-center">
                       <span class="fw-bold text-primary"> PIZARRA DE PRECIOS </span><span class="fw-bold" style="color:rgb(52,73,94);">GRANOS</span>
                      </div>
                      <div class="card-body my-0 py-0">
                        <nav>
                              <div class="nav nav-tabs row text-nav" id="nav-tab" role="tablist">
                                <button class="nav-link active col-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Precios</button>
                                <button class="nav-link col-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cálculos</button>
                                <button class="nav-link col-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Rechazo</button>
                                <button class="nav-link col-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-arbitre" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Arbitraje</button>
                              </div>
                            </nav>
                        <div class="tab-content my-3" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <h5 class="card-title mb-2">Parral, <?php echo $fecha;?></h5>
                                <div class="row bg-light text-primary mb-1 justify-content-end pt-3" style="font-size:1em;">
                                    <div class="col text-end">Válido desde: <?php echo date('d-m-Y', strtotime($fechaInicio));?></div>
                                </div>
                                <div class="row card-services bg-light mb-1 pt-3">
                                    <div class="col-8 col-md-9 card-text">VALOR CONTADO:</div>
                                    <div class="col-4 col-md-3 card-text text-success"><?php echo $precioMaiz;?>  <span class="fw-bold text-danger"> $/Kg</span></div>
                                </div>
                                <div class="row card-services bg-light mb-1 py-2">
                                    <div class="col-8 col-md-9 card-text">SERVICIO DE SECADO:</div>
                                    <div class="col-4 col-md-3 card-text text-success"><?php echo "$ ".$precioSecado;?>  <span class="fw-bold text-danger"> °/Kg</span> </div>
                                </div>
                                <div class="row card-services bg-light mb-1 py-2">
                                    <div class="col-8  col-md-9 card-text">ALMACENAJE:</div>
                                    <div class="col-4 col-md-3 card-text text-success"><?php echo $precioAlmacenaje;?><span class="text-danger fw-bold"> % Mensual $/Kg </span></div>
                                </div>
                                <div class="row card-services bg-light mb-1 py-2">
                                    <div class="col-8  col-md-9 card-text">IN-OUT (Laboratorio, descarga y carga)</div>
                                    <div class="col-4 col-md-3 card-text text-success"><?php echo $precioInOut;?> <span class="text-danger fw-bold"> $/Kg</span></div>
                                </div>
                                
                                 <div class="row bg-light mb-1 pt-5" style="font-size:1em;">
                                    <div class="col text-end text-primary card-text">Próximo ajuste precio: <span class="text-success fw-bold"> <?php echo date('d-m-Y', strtotime($fechaCambio));?></span></div>
                                </div>
                              </div>
                              <div class="tab-pane fade my-0 py-0" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                  
                                  <p class="pane-text my-0 py-0">El precio de referencia corresponde a un maíz estándar, con las tolerancias que se muestran en la siguiente tabla. Sobre dichas tolerancias se aplican los descuentos que, en la misma se señalan:</p>
                                  <div class="row">
                                      <table class="table pane-text table-responsive table-bordered border-secondary table-sm m-0 p-0">
                                          <thead>
                                            <tr>
                                              <th class="col-1" scope="col">Parámetro</th>
                                              <th class="col-2" scope="col">Estándar (%)</th>
                                              <th class="col-8" scope="col">Descuento (sobre Kg recibidos)</th>        </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Humedad (%)</th>
                                              <td class="fw-bold">14.5</td>
                                              <td>Sobre 14.5, rechazo o secado.</td>
                                            </tr>
                                            <tr>
                                              <td>Impurezas (%)</th>
                                              <td class="fw-bold">0.5</td>
                                              <td>100% del porcentaje que  supere el 0.5%</td>
                                            </tr>
                                            <tr>
                                              <td>Grano partido (%)</th>
                                              <td class="fw-bold">1.5</td>
                                              <td>100% del porcentaje que supere el 1.5%</td>
                                            </tr>
                                            <tr>
                                              <td>Grano dañado por calor (%)</th>
                                              <td class="fw-bold">0.0</td>
                                              <td>Sin tolerancia</td>
                                            </tr>
                                            <tr>
                                              <td>Grano atacado por hongos(moho) (%)</th>
                                              <td class="fw-bold">0.0</td>
                                              <td>Sin tolerancia</td>
                                            </tr>
                                          </tbody>
                                      </table>
                                  </div>
                                  <div class="row">
                                      <p class="card-note"><strong>Nota:</strong>La suma de los descuentos determina el porcentaje de descuento total que se aplicará sobre los kilos recibidos.</p>
                                  </div>
                                  <p class="card-formule">El ajuste para el exceso de humedad sobre un <span class="text-primary">14,5%</span>, se realizará utilizando la siguiente fórmula:</p>
                                  <div class="row my-0 py-0 card-formule justify-content-center">
                                      <div class="col-4 col-md-2 text-center my-0 py-0" style="margin-top:10px;">
                                          <span class="text-success text-start">Valor ajuste %=</span>
                                      </div>
                                      <div class="col-8 col-md-4 my-0 py-0">
                                          <div class="row mb-0 pb-0">
                                              <span class="text-primary text-start">( 14,5 - humedad grano (b.h.) ) x 100</span>
                                          </div>
                                          <hr class="my-0 py-0 text-danger">
                                          <div class="row w-100 justify-content-center text-danger fw-bold my-0 py-0">
                                              85,50
                                          </div>
                                      </div>
                                      
                                  </div>
                              </div>
                            <div class="tab-pane fade pane-text" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <p class="fw-bold">Condiciones de rechazo:</p>
                                <ul>
                                      
                                    <li>Humedad superior a <span class="text-danger">20%</span>, se rechaza o se recibe condicionalmente.</li>
                                    <li>Impurezas que superen el <span class="text-danger">5%</span>.</li>
                                    <li>Granos partidos (partidos,quebrados y chupados) que superen el <span class="text-danger">11%</span>.</li>
                                    <li>Granos dañados por hongos(moho), tiene tolerancia <span class="text-danger">0%</span>.</li>
                                    <li>Granos dañados por calor, tiene tolerancia <span class="text-danger">0%</span>. </li>
                                </ul>
                                <p class="fw-bold">Otras condiciones de rechazo:</p>
                                <ul>
                                    <li>Olores objetables como rancio, fermentado, enmohecido u otros</li>
                                    <li>Ataque visible y presencia de insectos vivos dañinos para el grano, como gorgojos u otros</li>
                                    <li>Pelos de roedores u otros animales.</li>
                                    <li>Más de una excreta sólida de roedores u otros animales, por cada dos kilogramos de maíz en grano seco.</li>
                                    <li>El producto no deberá contener elementos contaminantes, residuos de plaguicidas, micotoxinas u otros, en cantidades superiores a las autorizadas en las disposiciones vigentes del Servicio Agrícola y Ganadero.</li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="nav-arbitre" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <p class="fw-bold">Laboratorio Arbitrador:</p>
                                  
                                <h4><span class="text-primary fw-bold">COTRISA</span></h4>
                                <h6 class="mb-2">Km 521,6 - Ruta 5 Sur - Los Angeles - Bio Bio</h6><br>
                                <h6 class="fw-bold">Cotización : <span class="text-danger">111/2024</span>.</h6>
                                <h6 class="fw-bold">Costo servicio arbitraje: <span class="text-success">$ 43.000 + IVA</span></h6>
                                <h6 class="fw-bold"> Costo Traslado: <span class="fw-normal text-secondary">(Según urgencia y proveedor de servicio contratado)</span></h6>
                            </div>
                        
                      </div>
                      </div>
                      <div class="card-footer row">
                          <div class="col-2 col-md-1 text-center">
                            <img src="./src/img/logofn2.png" style="width:3em;height:3em;">
                          </div>
                          <div class="col-9">
                              <h6 class="fw-bold text-success mt-1 px-2 board-title">Arrocera Flor de Ñiquen Ltda.</h6>
                          </div>
                      </div>
                    </div>
                
                </div>
                <div class="col-12 col-md-5 mr-1 pb-2 index-rigth my-0">
                
                    <div class="row justify-content-around">
                        
                        <h2 class="text-center my-1"> Portal <span class="text-warning fw-bold">SGM</span></h2>
                        
                         <div class="col m-1 col-md-4">
                            <a href="./login_agricultor.php" class="link-underline-light">
                            <div class="card bg-success zoom" style="border-radius:40px">
                                <img class="card-img-top mx-auto mt-2" src="./src/img/agricultor.png" style="border-radius:40px;width:5em;height:6em;" alt="Logo Agricultor">
                                <div class="card-body text-white mx-auto text-center">
                                    <h4 class="card-title link-underline-primary mb-0 pb-1">Zona</h4>
                                    <h4 class="card-title link-underline-primary mt-0 pt-0">Proveedor</h4>
                                    <p class="card-text" style="text-decoration:none;">SGM - Flor de Ñiquen</p>
                                    
                                </div>
                            </div>
                            </a>
                        </div>
    
                        <div class="col-6 m-1 col-md-4 pb-5" >
                        <a href="/loginUser">
                            <div class="card zoom" style="border-radius:40px;background-color:#94BC9C;">
                                <img class="card-img-top mx-auto mt-2" src="./src/img/logofn2.png" style="border-radius:40px;width:5em;height:6em;" alt="Logo FNiquen">
                                <div class="card-body mx-auto text-white text-center">
                                    <h4 class="card-title link-underline-primary mb-0 pb-1">Zona</h4>
                                    <h4 class="card-title link-underline-primary mt-0 pt-0">Usuarios</h4>
                                    <p class="card-text">SGM - Flor de Ñiquen</p>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <footer class=" bg-dark p-3">
            <div class="row">
                <div class="col-12 col-md-3 text-center" style="font-family:'Times';font-size:0.8em;">
                    <span class="text-warning fw-bold">SGM</span> - <span class="text-white">Flor de Ñiquen</span>
                </div>
                <div class="col-12 col-md-9 text-center" style="font-family:'Times';font-size:0.8em;">
                    <span class="text-success">Copyrigth</span> <span class="text-white"> 2023 </span> - <span class="text-warning">DXA Solutions</span>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>