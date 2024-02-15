<div class="modal fade" id="assignShow{{ $assign->id }}">
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
                        @if ($assign->application->debtor())
                            {{ $assign->application->debtor()->lastName }} {{ $assign->application->debtor()->secondLastName }} {{ $assign->application->debtor()->name }} {{ $assign->application->debtor()->thirdLastName }}
                        @else
                            Solicitud sin Deudor
                        @endif
                    </dd>
                    <dt class="col-sm-4">Nombre de Asesor</dt>
                    <dd class="col-sm-8">
                        {{ $assign->application->user->name }}
                    </dd>
                    <dt class="col-sm-4">Nombre de Encargado</dt>
                    <dd class="col-sm-8">
                        {{ $assign->user->name }}
                    </dd>
                </dl>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
