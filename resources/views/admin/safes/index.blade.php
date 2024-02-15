@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Bovedas</h1>
        @can('safes.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#safeCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.safes.create')
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
                            @foreach ($safes as $safe)
                                <tr>
                                    <td>{{ $safe->id }}</td>
                                    <td>{{ $safe->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('safes.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#safeEdit{{ $safe->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.safes.edit')
                                            @endcan
                                            @can('safes.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#safeDelete{{ $safe->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.safes.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $safes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
