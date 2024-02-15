<div class="modal fade text-dark" id="paymentPlanEdit{{ $paymentPlan->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('paymentPlans.update', $paymentPlan->id) }}" method="POST">
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
                                            <option value="{{ $paymentPlan->id }}">{{ $paymentPlan->credit->application->id }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Numero de Cuota</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Numero de Cuota" name="numero" value="{{ $paymentPlan->numero }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Capital</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Capital" name="capital" value="{{ $paymentPlan->capital }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Interes</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Interes" name="interes" value="{{ $paymentPlan->interes }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Cuota</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Cuota" name="cuota" value="{{ $paymentPlan->cuota }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Saldo</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Saldo" name="saldo" value="{{ $paymentPlan->saldo }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Fecha</label>
                                    <input type="date" class="form-control form-control-border" placeholder="Fecha" name="fecha" value="{{ $paymentPlan->fecha }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select class="custom-select form-control-border" name="estado" required>
                                        <option>{{ $paymentPlan->estado }}</option>
                                        <option>pendiente</option>
                                        <option>cancelado</option>
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
