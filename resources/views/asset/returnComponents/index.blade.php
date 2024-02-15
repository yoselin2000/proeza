@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Devoluciones</h1>
        @can('returnComponents.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#returnComponentCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('asset.returnComponents.create')
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
                                <th>Receptor</th>
                                <th>Fecha</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($returnComponents as $returnComponent)
                                <tr>
                                    <td>{{ $returnComponent->id }}</td>
                                    <td>{{ $returnComponent->assignment->assignedToUser->name }}</td>
                                    <td>{{ $returnComponent->date }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#returnComponentShow{{ $returnComponent->id }}"><i class="fas fa-eye"></i></button>
                                            @include('asset.returnComponents.show')
                                            @can('returnComponents.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#returnComponentEdit{{ $returnComponent->id }}"><i class="fas fa-pen"></i></button>
                                                @include('asset.returnComponents.edit')
                                            @endcan
                                            @can('returnComponents.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#returnComponentDelete{{ $returnComponent->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('asset.returnComponents.delete')
                                            @endcan
                                            <form action="{{ route('prints.returnComponent', $returnComponent->id) }}" method="GET">
                                                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $returnComponents->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
