<div class="modal fade text-dark" id="evaluationCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('evaluations.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Participante</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="participant_id" required>
                                            @isset($participant)
                                                <option value="{{ $participant->id }}">{{ $participant->application->id }}.- {{ $participant->category->name }}.- {{ $participant->client->lastName }} {{ $participant->client->secondLastName }} {{ $participant->client->name }} {{ $participant->client->thirdLastName }}</option>
                                            @endisset
                                            @isset($participants)
                                                @foreach ($participants as $participant)
                                                    <option value="{{ $participant->id }}">{{ $participant->application->id }}.- {{ $participant->category->name }}.- {{ $participant->client->lastName }} {{ $participant->client->secondLastName }} {{ $participant->client->name }} {{ $participant->client->thirdLastName }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estado Civil</label>
                                    <select class="custom-select form-control-border" name="civil" required>
                                        <option>SOLTERO (A)</option>
                                        <option>CASADO (A)</option>
                                        <option>DIVORCIADO (A)</option>
                                        <option>VIUDO (A)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Telf. Movil</label>
                                    <input type="number" class="form-control form-control-border" placeholder="74851265" name="mobile" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Telf. Fijo</label>
                                    <input type="number" class="form-control form-control-border" placeholder="4458732" name="landline">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Situación Laboral</label>
                                    <select class="custom-select form-control-border" name="employment" required>
                                        <option>INDEPENDIENTE</option>
                                        <option>DEPENDIENTE FORMAL</option>
                                        <option>DEPENDIENTE INFORMAL</option>
                                        <option>RENTISTA</option>
                                        <option>OTRO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
