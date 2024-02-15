@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Componentes</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#componentCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.components.create')
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
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($components as $component)
                                <tr>
                                    <td>{{ $component->id }}</td>
                                    <td>{{ $component->state }}</td>
                                    <td>
                                        <div class="btn-group">
                                            {{--  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#componentShow{{ $component->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.components.show')  --}}
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#componentEdit{{ $component->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.components.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#componentDelete{{ $component->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.components.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $components->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
