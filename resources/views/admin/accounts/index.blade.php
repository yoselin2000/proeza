@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Cuentas Corrientes</h1>
        @can('accounts.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#accountCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.accounts.create')
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
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account->id }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#accountShow{{ $account->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.accounts.show')
                                            @can('accounts.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#accountEdit{{ $account->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.accounts.edit')
                                            @endcan
                                            @can('accounts.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#accountDelete{{ $account->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.accounts.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $accounts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
