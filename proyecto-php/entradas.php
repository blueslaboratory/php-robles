<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>
<!-- 
CONTENEDOR: se queda en la pagina ppal, el resto lo encapsulo con includes,
            lo encapsulo bien de forma que queda bien encapsulado xD
-->

            <!-- CAJA PRINCIPAL -->
            <div id="principal">
                <h1>Todas las entradas</h1>
                
                <?php
                    $entradas = conseguirEntradas($db, null);
                    if(!empty($entradas)):
                        while($entrada = mysqli_fetch_assoc($entradas)):
                ?>            
                
                        <article class="entrada">
                            <?php // var_dump($entrad); ?>
                            <a href="entrada.php?id=<?=$entrada['id']?>">
                                <h2><?=$entrada['titulo']?></h2>
                                <span class="fecha">
                                    <?=$entrada['categoria'].' | '.$entrada['fecha']?>
                                </span>
                                <p>
                                    <?= substr($entrada['descripcion'], 0, 199) . "..." ?>
                                </p>
                            </a>
                        </article>
                
                <?php
                        endwhile;   
                    endif;
                ?>
                
            </div> <!-- fin principal -->
            
                
<?php require 'includes/pie.php'; ?>