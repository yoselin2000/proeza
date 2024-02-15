@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Solicitud</h1>
        @can('applications.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#applicationCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
            @include('credit.applications.create')
        @endcan
    </div>
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
                                <th>id</th>
                                <th>Monto</th>
                                <th>Plazo</th>
                                <th>Frecuencia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ number_format($application->amount, 2, '.', ',') }}</td>
                                    <td>{{ $application->term }}</td>
                                    <td>{{ $application->frequency }}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#applicationShow{{ $application->id }}"><i class="fas fa-eye"></i></button>
                                            @include('credit.applications.show')
                                            @can('applications.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#applicationEdit{{ $application->id }}"><i class="fas fa-pen"></i></button>
                                                @include('credit.applications.edit')
                                            @endcan
                                            @can('applications.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#applicationDelete{{ $application->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('credit.applications.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
