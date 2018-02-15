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
                                                 <?php foreach ($tarea as $t) {
                                                    ?>      
                                                    <tr>
                                                        <td><?php echo $t["wnombreTarea"]; ?></td>
                                                        <td><?php echo $t["wfechafin"]; ?></td>
                                                        <td><?php echo $t["westado"]; ?></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                } ?>
                                             </tbody>
                                            
                                        </table>
                                         
                                          </div>   
                                        <br>