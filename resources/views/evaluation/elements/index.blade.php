@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Tipos de Bien</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#elementCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.elements.create')
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
                                <th>Bien</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elements as $element)
                                <tr>
                                    <td>{{ $element->id }}</td>
                                    <td>{{ $element->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#elementEdit{{ $element->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.elements.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#elementDelete{{ $element->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.elements.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $elements->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
