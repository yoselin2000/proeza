@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Cajas</h1>
        @can('boxes.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#boxCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.boxes.create')
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
                            @foreach ($boxes as $box)
                                <tr>
                                    <td>{{ $box->id }}</td>
                                    <td>{{ $box->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('boxes.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#boxEdit{{ $box->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.boxes.edit')
                                            @endcan
                                            @can('boxes.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#boxDelete{{ $box->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.boxes.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $boxes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
