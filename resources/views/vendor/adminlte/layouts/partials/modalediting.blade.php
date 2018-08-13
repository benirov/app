
<div class="modal fade" id="modalEditingForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header box-primary">
        <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form id="editing">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="bodyeditting">

            </div>
        </form>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary editingForm">Guardar Cambios</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>