<?php
foreach ($datos as $detalles){
?>
    <!-- Logout Modal-->
    <div class="modal fade" id="Modaleliminar<?php echo $detalles["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro de eliminar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Seleccione "Eliminar" a continuación si desea eliminar el titulo: <td><?php echo $detalles["titulo"] ?></td></div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="./incluidos/articulo/eliminar?id=<?php echo $detalles["id"]; ?>">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

