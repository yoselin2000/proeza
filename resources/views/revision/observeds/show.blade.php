<div class="modal fade text-dark" id="observedShow{{ $observed->id }}">
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
                <dt class="col-sm-4">Nombre de cliente</dt>
                <dd class="col-sm-8">
                  @if ($observed->application->debtor())
                    {{ $observed->application->debtor()->lastName }} {{ $observed->application->debtor()->secondLastName }} {{ $observed->application->debtor()->name }} {{ $observed->application->debtor()->thirdLastName }}
                  @else
                      Solicitud sin Deudor
                  @endif
                </dd>
                <dt class="col-sm-4">Nombre de Asesor</dt>
                <dd class="col-sm-8">
                    {{ $observed->application->user->name }}
                </dd>
                <dt class="col-sm-4">Nombre de Encargado</dt>
                <dd class="col-sm-8">
                    {{ $observed->user->name }}
                </dd>
                <dt class="col-sm-4">Descripcion</dt>
                <dd class="col-sm-8">
                    {{ $observed->description }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
