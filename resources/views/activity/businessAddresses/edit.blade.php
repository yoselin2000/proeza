<div class="modal fade text-dark" id="businessAddressEdit{{ $businessAddress->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('business_addresses.update', $businessAddress->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Actividad Economica</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="activity_id" required>
                                            <option value="{{ $businessAddress->activity->id }}">{{ $businessAddress->activity->evaluation->participant->application->id }}.- {{ $businessAddress->activity->evaluation->participant->category->name }}.- {{ $businessAddress->activity->evaluation->participant->client->lastName }} {{ $businessAddress->activity->evaluation->participant->client->secondLastName }} {{ $businessAddress->activity->evaluation->participant->client->name }} {{ $businessAddress->activity->evaluation->participant->client->thirdLastName }}</option>
                                            @isset($activities)
                                                @foreach ($activities as $activity)
                                                    <option value="{{ $activity->id }}">{{ $activity->evaluation->participant->application->id }}.- {{ $activity->evaluation->participant->category->name }}.- {{ $activity->evaluation->participant->client->lastName }} {{ $activity->evaluation->participant->client->secondLastName }} {{ $activity->evaluation->participant->client->name }} {{ $activity->evaluation->participant->client->thirdLastName }}</option>
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
                                        <option>{{ $businessAddress->property }}</option>
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
                                    placeholder="Tiempo que Reside" name="time" value="{{ $businessAddress->time }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Dir. Domicilio</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Dir. Domicilio" name="direction" value="{{ $businessAddress->direction }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">N°</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="N°" name="number" value="{{ $businessAddress->number }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">Zona</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Zona" name="zone" value="{{ $businessAddress->zone }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Telefono</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Telefono" name="mobile" value="{{ $businessAddress->mobile }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Provincia/Municipio/Comunidad</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Provincia" name="province" value="{{ $businessAddress->province }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Link Google Map</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Link Google Map" name="link" value="{{ $businessAddress->link }}">
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
                                    name="description" rows="3">{{ $businessAddress->description }}</textarea>
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
