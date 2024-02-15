<div class="modal fade text-dark" id="receptionCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('receptions.store') }}" method="POST">
                {{ csrf_field() }}
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
                                    <label>Tipo de Garantia</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="warranty_id" required>
                                            @foreach ($warranties as $Warranty)
                                                <option value="{{ $Warranty->id }}">{{ $Warranty->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo de Bien</label>
                                    <div class="select2-primary">
                                        <select id="elemento_select" class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="element_id" required>
                                            <option>Seleccionar</option>
                                            @foreach ($elements as $element)
                                                <option value="{{ $element->id }}">{{ $element->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo de Documento</label>
                                    <div class="select2-primary">
                                        <select id="documentos_container" class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="document_id" required>
                                            <option>Seleccionar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">N° Doc</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="N° Doc " name="doc" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">N° de Fojas</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="N° de Fojas " name="fojas" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Documento</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="type" required>
                                            <option>Original</option>
                                            <option>Fotocopia Legalizada</option>
                                            <option>Fotocopia Simple</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Estado</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Estado" name="estate" required>
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


@section('script')
<script>
    $(document).ready(function() {
        $('#elemento_select').change(function() {
            var selectedValue = $(this).val();
            $.get('/obtener-documentos/' + selectedValue, function(data) {
                // Limpiar el contenedor de documentos
                $('#documentos_container').empty();
                $('#documentos_container').append('<option>seleccionar</option>');

                // Iterar sobre los documentos y mostrarlos
                $.each(data, function(index, documento) {
                    $('#documentos_container').append('<option value="'+documento.id+'">' + documento.name + '</option>');
                    // Puedes ajustar la forma en que se muestran los documentos según tus necesidades
                });
            });
        });
    });
</script>
@endsection