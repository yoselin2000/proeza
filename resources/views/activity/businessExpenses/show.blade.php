<div class="modal fade text-dark" id="businessExpenseShow{{ $businessExpense->id }}">
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
                    {{ $businessExpense->activity->evaluation->participant->application->id }}.- {{ $businessExpense->activity->evaluation->participant->category->name }}.- {{ $businessExpense->activity->evaluation->participant->client->lastName }} {{ $businessExpense->activity->evaluation->participant->client->secondLastName }} {{ $businessExpense->activity->evaluation->participant->client->name }} {{ $businessExpense->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Item</dt>
                <dd class="col-sm-8">
                    {{ $businessExpense->expenseType->name }}
                </dd>
                <dt class="col-sm-4">valor</dt>
                <dd class="col-sm-8">
                    {{ $businessExpense->amount }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
