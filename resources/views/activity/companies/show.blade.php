<div class="modal fade text-dark" id="companyShow{{ $company->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Empresas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">

                <dt class="col-sm-4">Nombre</dt>
                <dd class="col-sm-8">
                    {{ $company->name }}
                </dd>
                <dt class="col-sm-4">Cargo que desempeña</dt>
                <dd class="col-sm-8">
                    {{ $company->post }}
                </dd>
                <dt class="col-sm-4">Antiguedad (años) </dt>
                <dd class="col-sm-8">
                    {{ $company->antiquity }}
                </dd>
                <dt class="col-sm-4">Liquido pagable</dt>
                <dd class="col-sm-8">
                    {{ $company->salary }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $company->frequency }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
