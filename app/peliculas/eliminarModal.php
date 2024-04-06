<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eliminarModalModalLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar el registro?
            </div>
            <div class="modal-footer">
                <form action="eliminar.php" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-trash"></i>Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
