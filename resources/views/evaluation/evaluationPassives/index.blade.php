@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Pasivos</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#evaluationPassiveCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.evaluationPassives.create')
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
                            @foreach ($evaluationPassives as $evaluationPassive)
                                <tr>
                                    <td>{{ $evaluationPassive->id }}</td>
                                    <td>{{ $evaluationPassive->evaluation->participant->application->id }}</td>
                                    <td>{{ $evaluationPassive->evaluation->participant->category->name }}</td>
                                    <td>{{ $evaluationPassive->evaluation->participant->client->lastName }} {{ $evaluationPassive->evaluation->participant->client->secondLastName }} {{ $evaluationPassive->evaluation->participant->client->name }}  {{ $evaluationPassive->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#evaluationPassiveShow{{ $evaluationPassive->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.evaluationPassives.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#evaluationPassiveEdit{{ $evaluationPassive->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.evaluationPassives.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#evaluationPassiveDelete{{ $evaluationPassive->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.evaluationPassives.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $evaluationPassives->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
