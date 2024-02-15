<div class="modal fade text-dark" id="clientShow{{ $client->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalles</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <dl class="row">
          <dt class="col-sm-4">Nombres</dt>
          <dd class="col-sm-8">
              {{ $client->name }}
          </dd>
          <dt class="col-sm-4">Apellido Paterno</dt>
          <dd class="col-sm-8">
              {{ $client->lastName }}
          </dd>
          <dt class="col-sm-4">Apellido Materno</dt>
          <dd class="col-sm-8">
              {{ $client->secondLastName }}
          </dd>
          <dt class="col-sm-4">Apellido de casado</dt>
          <dd class="col-sm-8">
              {{ $client->thirdLastName }}
          </dd>
          <dt class="col-sm-4">Sexo</dt>
          <dd class="col-sm-8">
              {{ $client->gender }}
          </dd>
          <dt class="col-sm-4">Fecha de nacimiento</dt>
          <dd class="col-sm-8">
              {{ $client->birth }}
          </dd>
          <dt class="col-sm-4">Nacionalidad</dt>
          <dd class="col-sm-8">
              {{ $client->nacionality }}
          </dd>
          <dt class="col-sm-4">Documento de Identidad</dt>
          <dd class="col-sm-8">
              {{ $client->identification }}
          </dd>
          <dt class="col-sm-4">N° de Documento</dt>
          <dd class="col-sm-8">
              {{ $client->number }}
          </dd>
          <dt class="col-sm-4">Complemento</dt>
          <dd class="col-sm-8">
              {{ $client->complement }}
          </dd>
          <dt class="col-sm-4">Extensión</dt>
          <dd class="col-sm-8">
              {{ $client->extension }}
          </dd>
        </dl>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
