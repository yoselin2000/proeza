<div class="modal fade text-dark" id="recoveryCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('recoveries.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cuota</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="credit_id" required>
                                            @foreach ($credits as $credit)
                                                @if ($credit->application->debtor())
                                                    <option value="{{ $credit->id }}">{{ $credit->application->debtor()->lastName }} {{ $credit->application->debtor()->secondLastName }} {{ $credit->application->debtor()->name }} {{ $credit->application->debtor()->thirdLastName }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero">fecha</label>
                                    <input id="numero" class="form-control form-control-border" type="date" name="fecha" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="capital">saldoIni</label>
                                    <input id="capital" class="form-control form-control-border" type="number" name="saldoIni" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="interes">capital</label>
                                    <input id="interes" class="form-control form-control-border" type="number" name="capital" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cuota">interes</label>
                                    <input id="cuota" class="form-control form-control-border" type="number" name="interes" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="saldo">vencido</label>
                                    <input id="saldo" class="form-control form-control-border" type="number" name="vencido" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mora">penal</label>
                                    <input id="mora" class="form-control form-control-border" type="number" name="penal" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cuota">diferido</label>
                                    <input id="cuota" class="form-control form-control-border" type="number" name="diferido" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="saldo">seguro</label>
                                    <input id="saldo" class="form-control form-control-border" type="number" name="seguro" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mora">cuotaTotal</label>
                                    <input id="mora" class="form-control form-control-border" type="number" name="cuotaTotal" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total">saldoFin</label>
                                    <input id="total" class="form-control form-control-border" type="number" step="any" name="saldoFin" required>
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
