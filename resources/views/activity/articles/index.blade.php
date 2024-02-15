@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Articulos</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#articleCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.articles.create')
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
                                <th>Rendimiento</th>
                                <th>Unidad de produccion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->name }}</td>
                                    <td>{{ $article->performance }}</td>
                                    <td>{{ $article->production }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#articleShow{{ $article->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.articles.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#articleEdit{{ $article->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.articles.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#articleDelete{{ $article->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.articles.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
