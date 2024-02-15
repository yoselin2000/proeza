<div class="modal fade text-dark" id="businessAddressShow{{ $businessAddress->id }}">
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
                <dt class="col-sm-4">Participante</dt>
                <dd class="col-sm-8">
                    {{ $businessAddress->activity->evaluation->participant->application->id }}.- {{ $businessAddress->activity->evaluation->participant->category->name }}.- {{ $businessAddress->activity->evaluation->participant->client->lastName }} {{ $businessAddress->activity->evaluation->participant->client->secondLastName }} {{ $businessAddress->activity->evaluation->participant->client->name }} {{ $businessAddress->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-md-4">Tipo de Propiedad</dt>
                <dd class="col-md-8">{{ $businessAddress->property }}</dd>
                <dt class="col-md-4">Tiempo que reside en el lugar</dt>
                <dd class="col-md-8">{{ $businessAddress->time }}</dd>
                <dt class="col-md-4">Dir. Domicilio</dt>
                <dd class="col-md-8">{{ $businessAddress->direction }}</dd>
                <dt class="col-md-4">No.</dt>
                <dd class="col-md-8">{{ $businessAddress->number }}</dd>
                <dt class="col-md-4">Zona/Barrio</dt>
                <dd class="col-md-8">{{ $businessAddress->zone }}</dd>
                <dt class="col-md-4">Teléfono</dt>
                <dd class="col-md-8">{{ $businessAddress->mobile }}</dd>
                <dt class="col-md-4">Provincia/Municipio/Comunidad</dt>
                <dd class="col-md-8">{{ $businessAddress->province }}</dd>
                <dt class="col-md-4">Link Google Map</dt>
                <dd class="col-md-8"><a href="{{ $businessAddress->link }}">{{ $businessAddress->link }}</a></dd>
                <dt class="col-md-4">Descripcion</dt>
                <dd class="col-md-8">{{ $businessAddress->description }}</dd>
            </dl>
            <div class="row justify-content-center">
                <div class="img-fluid fa-border">
                    <img src="{{ $businessAddress->file }}" width="300">
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
