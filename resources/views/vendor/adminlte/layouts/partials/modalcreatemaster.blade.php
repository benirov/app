
<div class="modal fade" id="modalCreateForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header box-primary">
        <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form id="createMaster">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
              <div class=col-md-6 col-sm-6 col-xs-12>
                    <div class="form-group">
                    <label for="txtname"><b>name</b></label>
                        <div class="input-group">
                            <input id="txtname" type="text" class="form-control  Requerido"  name="name" maxlenght="15"/>
                        </div>
                    </div>
                </div>
                <div class=col-md-6 col-sm-6 col-xs-12>
                    <div class="form-group">
                    <label for="txtstatus"><b>status</b></label>
                        <div class="input-group">
                            <select id="txtstatus" class="form-control  Requerido"  name="status" maxlenght="15">
                                <option value="0">inactivo</option>
                                <option value="1">activo</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary createMaster">Guardar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>