<div class="modal fade text-dark" id="participantShow{{ $participant->id }}">
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
          <dt class="col-sm-4">Cliente</dt>
          <dd class="col-sm-8">
              {{ $participant->client->lastName }} {{ $participant->client->twoLastName }} {{ $participant->client->name }}
          </dd>
          <dt class="col-sm-4">Solicitud</dt>
          <dd class="col-sm-8">
              {{ $participant->application->id }}.-{{ $participant->application->amount }}-{{ $participant->application->term }}
          </dd>
          <dt class="col-sm-4">Categoria</dt>
          <dd class="col-sm-8">
              {{ $participant->category->name }}
          </dd>
        </dl>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
