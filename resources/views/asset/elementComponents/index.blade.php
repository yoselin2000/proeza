@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Componentes</h1>
        @can('elementComponents.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#elementComponentCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('asset.elementComponents.create')
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
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>SN</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elementComponents as $elementComponent)
                                <tr>
                                    <td>{{ $elementComponent->id }}</td>
                                    <td>{{ $elementComponent->brand }}</td>
                                    <td>{{ $elementComponent->model }}</td>
                                    <td>{{ $elementComponent->SN }}</td>
                                    <td>{{ $elementComponent->description }}</td>
                                    <td>
                                        @if ($elementComponent->state )
                                            libre
                                        @else
                                            ocupado
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#elementComponentShow{{ $elementComponent->id }}"><i class="fas fa-eye"></i></button>
                                            @include('asset.elementComponents.show')
                                            @can('elementComponents.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#elementComponentEdit{{ $elementComponent->id }}"><i class="fas fa-pen"></i></button>
                                                @include('asset.elementComponents.edit')
                                            @endcan
                                            @can('elementComponents.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#elementComponentDelete{{ $elementComponent->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('asset.elementComponents.delete')
                                            @endcan
                                            <form action="{{ route('qrs.qr', $elementComponent->id) }}" method="GET">
                                                <button class="btn btn-info btn-xs" type="submit"><i>QR</i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $elementComponents->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
