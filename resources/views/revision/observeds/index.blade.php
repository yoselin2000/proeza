@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Observed</h1>
        @can('observeds.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#observedCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('revision.observeds.create')
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
                                @can('observeds.update', 'observeds.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($observeds as $observed)
                                <tr>
                                    <td>{{ $observed->application->id }}</td>
                                    <td>
                                        @if ($observed->application->debtor())
                                            {{ $observed->application->debtor()->lastName }} {{ $observed->application->debtor()->secondLastName }} {{ $observed->application->debtor()->name }} {{ $observed->application->debtor()->thirdLastName }}
                                        @else
                                            Solicitud sin Deudor
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#observedShow{{ $observed->id }}"><i class="fas fa-eye"></i></button>
                                            @include('revision.observeds.show')
                                            @can('observeds.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#observedEdit{{ $observed->id }}"><i class="fas fa-pen"></i></button>
                                                @include('revision.observeds.edit')
                                            @endcan
                                            @can('observeds.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#observedDelete{{ $observed->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('revision.observeds.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $observeds->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
