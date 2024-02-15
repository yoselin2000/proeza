@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Pasivos de la Familia</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#familyPassiveCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.familyPassives.create')
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
                                <th>Solicitud</th>
                                <th>Categoria</th>
                                <th>Cliente</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($familyPassives as $familyPassive)
                                <tr>
                                    <td>{{ $familyPassive->id }}</td>
                                    <td>{{ $familyPassive->evaluation->participant->application->id }}</td>
                                    <td>{{ $familyPassive->evaluation->participant->category->name }}</td>
                                    <td>{{ $familyPassive->evaluation->participant->client->lastName }} {{ $familyPassive->evaluation->participant->client->secondLastName }} {{ $familyPassive->evaluation->participant->client->name }}  {{ $familyPassive->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#familyPassiveShow{{ $familyPassive->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.familyPassives.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#familyPassiveEdit{{ $familyPassive->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.familyPassives.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#familyPassiveDelete{{ $familyPassive->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.familyPassives.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $familyPassives->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection