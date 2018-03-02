                                       
                                        <table class="table table-responsive table-striped carla c" data-sort-name="date" data-sort-order="asc">
                                            <thead>
                                             <tr>
                                              <th>Nombre de beneficio</th>
                                               <th>Valor del beneficio </th>
                                               <th>Fecha de Canje</th>
                                             </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach ($historial as $h) {
                                                    ?>      
                                                    <tr>
                                                        <td><?php echo $h["bNombre"]; ?></td>
                                                        <td align="center"><?php echo $h["bvalorCanje"]; ?></td>
                                                        <td class="date"><?php echo $h["bfechaCanje"]; ?></td>
                                                    </tr>
                                                    <?php
                                                } ?>
                                             </tbody>
                                            
                                        </table>
                                         
                                