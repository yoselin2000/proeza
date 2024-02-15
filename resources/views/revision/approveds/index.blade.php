@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Approved</h1>
        @can('approveds.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#approvedCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('revision.approveds.create')
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
                                @can('approveds.update', 'approveds.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approveds as $approved)
                                <tr>
                                    <td>{{ $approved->application->id }}</td>
                                    <td>
                                        @if ($approved->application->debtor())
                                            {{ $approved->application->debtor()->lastName }} {{ $approved->application->debtor()->secondLastName }} {{ $approved->application->debtor()->name }} {{ $approved->application->debtor()->thirdLastName }}
                                        @else
                                            Solicitud sin Deudor
                                        @endif
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#approvedShow{{ $approved->id }}"><i class="fas fa-eye"></i></button>
                                            @include('revision.approveds.show')
                                            @can('approveds.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#approvedEdit{{ $approved->id }}"><i class="fas fa-pen"></i></button>
                                                @include('revision.approveds.edit')
                                            @endcan
                                            @can('approveds.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#approvedDelete{{ $approved->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('revision.approveds.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $approveds->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
