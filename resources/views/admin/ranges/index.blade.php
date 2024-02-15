@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Rangos</h1>
        @can('ranges.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#rangeCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.ranges.create')
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
                                <th>Tipo</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ranges as $range)
                                <tr>
                                    <td>{{ $range->id }}</td>
                                    <td>{{ $range->type }}</td>
                                    <td>{{ $range->min }}</td>
                                    <td>{{ $range->max }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#rangeShow{{ $range->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.ranges.show')
                                            @can('ranges.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#rangeEdit{{ $range->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.ranges.edit')
                                            @endcan
                                            @can('ranges.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#rangeDelete{{ $range->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.ranges.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $ranges->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
