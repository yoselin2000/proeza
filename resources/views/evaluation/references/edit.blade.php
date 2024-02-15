<div class="modal fade text-dark" id="referenceEdit{{ $reference->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('references.update', $reference->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Evaluacion</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="evaluation_id" required>
                                            @isset($evaluation)
                                                <option value="{{ $evaluation->id }}">{{ $evaluation->participant->application->id }}.- {{ $evaluation->participant->category->name }}.- {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }}</option>
                                            @endisset
                                            @isset($evaluations)
                                                <option value="{{ $reference->evaluation->id }}">{{ $reference->evaluation->participant->application->id }}.- {{ $reference->evaluation->participant->category->name }}.- {{ $reference->evaluation->participant->client->lastName }} {{ $reference->evaluation->participant->client->secondLastName }} {{ $reference->evaluation->participant->client->name }} {{ $reference->evaluation->participant->client->thirdLastName }}</option>
                                                @foreach ($evaluations as $evaluation)
                                                    <option value="{{ $evaluation->id }}">{{ $evaluation->participant->application->id }}.- {{ $evaluation->participant->category->name }}.- {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }}</option>
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
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Nombre" name="name" value="{{ $reference->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Direccion</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Direccion" name="address" value="{{ $reference->address }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Telf. Movil</label>
                                    <input type="number" class="form-control form-control-border" placeholder="78452136" name="mobile" value="{{ $reference->mobile }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo de Referencia</label>
                                    <select class="custom-select form-control-border" name="type" required>
                                        <option>{{ $reference->type }}</option>
                                        <option>Personal</option>
                                        <option>Comercial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Vinculo</label>
                                    <select class="custom-select form-control-border" name="link" required>
                                        <option>{{ $reference->link }}</option>
                                        <option>Padre</option>
                                        <option>Madre</option>
                                        <option>Esposo (a)</option>
                                        <option>Hijo (a)</option>
                                        <option>Hermano (a)</option>
                                        <option>Primo (a)</option>
                                        <option>Cuñado (a)</option>
                                        <option>Suegro (a)</option>
                                        <option>Tio (a)</option>
                                        <option>Sobrino (a)</option>
                                        <option>Amigo (a)</option>
                                        <option>Colega</option>
                                        <option>OTRO</option>
                                    </select>
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
