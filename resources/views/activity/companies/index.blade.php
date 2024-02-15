@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Empresas</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#companyCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.companies.create')
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
                                <th>Nombre</th>
                                <th>Cargo que desempeña</th>
                                <th>Antiguedad</th>
                                <th>Liquido pagable</th>
                                <th>Frecuencia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->post }}</td>
                                    <td>{{ $company->antiquity }}</td>
                                    <td>{{ $company->salary }}</td>
                                    <td>{{ $company->frequency }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#companyShow{{ $company->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.companies.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#companyEdit{{ $company->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.companies.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#companyDelete{{ $company->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.companies.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
