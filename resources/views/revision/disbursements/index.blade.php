@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">disbursement</h1>
        @can('disbursements.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#disbursementCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('revision.disbursements.create')
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Carpeta</th>
                                <th>Cliente</th>
                                @can('disbursements.update', 'disbursements.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disbursements as $disbursement)
                                <tr>
                                    <td>{{ $disbursement->application->id }}</td>
                                    <td>
                                        @if ($disbursement->application->debtor())
                                            {{ $disbursement->application->debtor()->lastName }} {{ $disbursement->application->debtor()->secondLastName }} {{ $disbursement->application->debtor()->name }} {{ $disbursement->application->debtor()->thirdLastName }}
                                        @else
                                            Solicitud sin Deudor
                                        @endif
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#disbursementShow{{ $disbursement->id }}"><i class="fas fa-eye"></i></button>
                                            @include('revision.disbursements.show')
                                            @can('disbursements.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#disbursementEdit{{ $disbursement->id }}"><i class="fas fa-pen"></i></button>
                                                @include('revision.disbursements.edit')
                                            @endcan
                                            @can('disbursements.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#disbursementDelete{{ $disbursement->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('revision.disbursements.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $disbursements->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
