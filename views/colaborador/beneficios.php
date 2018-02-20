<div class="col-sm-10 col-md-12 tare">   
                                         <h2 tarea><p class="tareas">Mis Tareas</p></h2>
                                        <table class="table table-responsive table-striped carla">
                                            <thead>
                                             <tr>
                                              <th>Actividad</th>
                                               <th>Fecha de Vencimiento</th> 
                                               <th>Estado</th> 
                                               <th> </th>
                                             </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach ($beneficio as $t) {
                                                    ?>      
                                                    <tr>
                                                        <td><?php echo $t["bNombre"]; ?></td>
                                                        <td><?php echo $t["bValorBeneficio"]; ?></td>
                                                        <td><?php echo $t["bimagen"]; ?></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                } ?>
                                             </tbody>
                                            
                                        </table>
                                         
                                          </div>   
                                        <br>