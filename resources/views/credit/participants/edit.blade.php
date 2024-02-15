<div class="modal fade text-dark" id="participantEdit{{ $participant->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('participants.update', $participant->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Solicitud</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="application_id" required>
                                            <option value="{{ $participant->application->id }}">{{ $participant->application->id }}.-{{ $participant->application->amount }}-{{ $participant->application->term }}</option>
                                            @isset($applications)
                                                @foreach ($applications as $application)
                                                    <option value="{{ $application->id }}">{{ $application->id }}.-{{ $application->amount }}-{{ $application->term }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="client_id" required>
                                            <option value="{{ $participant->client->id }}">{{ $participant->client->lastName }} {{ $participant->client->secondLastName }} {{ $participant->client->name }} {{ $participant->client->thirdLastName }}</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->lastName }} {{ $client->secondLastName }} {{ $client->name }} {{ $client->thirdLastName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo de participacion</label>
                                    <div class="select2-primary">
                                      <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="category_id" required>
                                        <option value="{{ $participant->category->id }}">{{ $participant->category->name }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
