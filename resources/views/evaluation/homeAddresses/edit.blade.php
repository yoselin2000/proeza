<div class="modal fade text-dark" id="homeAddressEdit{{ $homeAddress->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('home_addresses.update', $homeAddress->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                            <option value="{{ $homeAddress->evaluation->id }}">{{ $homeAddress->evaluation->participant->application->id }}.- {{ $homeAddress->evaluation->participant->category->name }}.- {{ $homeAddress->evaluation->participant->client->lastName }} {{ $homeAddress->evaluation->participant->client->secondLastName }} {{ $homeAddress->evaluation->participant->client->name }} {{ $homeAddress->evaluation->participant->client->thirdLastName }}</option>
                                            @isset($evaluations)
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo de Propiedad</label>
                                    <select class="custom-select form-control-border" name="property" required>
                                        <option>{{ $homeAddress->property }}</option>
                                        <option>PROPIO</option>
                                        <option>ALQUILER</option>
                                        <option>ANTICRETICO</option>
                                        <option>PRESTADO FAMILIAR</option>
                                        <option>PRESTADO</option>
                                        <option>CUIDADOR</option>
                                        <option>PAPAS</option>
                                        <option>HERMANOS</option>
                                        <option>ABUELOS</option>
                                        <option>TIOS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Tiempo que Reside (meses)</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Tiempo que Reside" name="time" value="{{ $homeAddress->time }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Dir. Domicilio</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Dir. Domicilio" name="direction" value="{{ $homeAddress->direction }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">N°</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="N°" name="number" value="{{ $homeAddress->number }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">Zona</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Zona" name="zone" value="{{ $homeAddress->zone }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Telefono</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Telefono" name="mobile" value="{{ $homeAddress->mobile }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Provincia/Municipio/Comunidad</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Provincia" name="province" value="{{ $homeAddress->province }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Link Google Map</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Link Google Map" name="link" value="{{ $homeAddress->link }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-input">Imagen</label>
                                    <input id="my-input" class="form-control-file" type="file" name="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-textarea">Descripción</label>
                                    <textarea id="my-textarea" class="form-control form-control-border"
                                    name="description" rows="3">{{ $homeAddress->description }}</textarea>
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
