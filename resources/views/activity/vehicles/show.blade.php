<div class="modal fade text-dark" id="vehicleShow{{ $vehicle->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Vehiculo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Tipo</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->type }}
                </dd>
                <dt class="col-sm-4">Estado</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->state }}
                </dd>
                <dt class="col-sm-4">Marca</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->brand }}
                </dd>
                <dt class="col-sm-4">Placa</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->plate }}
                </dd>
                <dt class="col-sm-4">Color</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->color }}
                </dd>
                <dt class="col-sm-4">Cilindrada</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->cylinder }}
                </dd>
                <dt class="col-sm-4">Combustible</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->fuel }}
                </dd>
                <dt class="col-sm-4">Año de fabricacion</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->manufacturing }}
                </dd>
                <dt class="col-sm-4">soat</dt>
                <dd class="col-sm-8">
                    {{ $vehicle->soat }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
