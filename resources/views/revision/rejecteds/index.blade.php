@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">rejected</h1>
        @can('rejecteds.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#rejectedCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('revision.rejecteds.create')
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
                                @can('rejecteds.update', 'rejecteds.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rejecteds as $rejected)
                                <tr>
                                    <td>{{ $rejected->application->id }}</td>
                                    <td>
                                        @if ($rejected->application->debtor())
                                            {{ $rejected->application->debtor()->lastName }} {{ $rejected->application->debtor()->secondLastName }} {{ $rejected->application->debtor()->name }} {{ $rejected->application->debtor()->thirdLastName }}
                                        @else
                                            Solicitud sin Deudor
                                        @endif
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#rejectedShow{{ $rejected->id }}"><i class="fas fa-eye"></i></button>
                                            @include('revision.rejecteds.show')
                                            @can('rejecteds.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#rejectedEdit{{ $rejected->id }}"><i class="fas fa-pen"></i></button>
                                                @include('revision.rejecteds.edit')
                                            @endcan
                                            @can('rejecteds.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#rejectedDelete{{ $rejected->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('revision.rejecteds.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $rejecteds->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
