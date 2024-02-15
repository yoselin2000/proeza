@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Hijos</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#childrenCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.childrens.create')
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
                                <th>Estado</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($childrens as $children)
                                <tr>
                                    <td>{{ $children->id }}</td>
                                    <td>{{ $children->state }}</td>
                                    <td>{{ $children->age }}</td>
                                    <td>{{ $children->gender }}</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#childrenShow{{ $children->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.childrens.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#childrenEdit{{ $children->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.childrens.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#childrenDelete{{ $children->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.childrens.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $childrens->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
