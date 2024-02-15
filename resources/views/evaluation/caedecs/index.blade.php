@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">CAEDEC</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#caedecCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.caedecs.create')
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
                                <th>Categoria</th>
                                <th>Rubro</th>
                                <th>Codigo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($caedecs as $caedec)
                                <tr>
                                    <td>{{ $caedec->id }}</td>
                                    <td>{{ $caedec->category }}</td>
                                    <td>{{ $caedec->heading }}</td>
                                    <td>{{ $caedec->code }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#caedecShow{{ $caedec->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.caedecs.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#caedecEdit{{ $caedec->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.caedecs.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#caedecDelete{{ $caedec->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.caedecs.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $caedecs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
