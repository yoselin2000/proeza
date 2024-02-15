@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Evaluacion</h1>
        @can('evaluations.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#evaluationCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('credit.evaluations.create')
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
                            @foreach ($evaluations as $evaluation)
                                <tr>
                                    <td>{{ $evaluation->id }}</td>
                                    <td>{{ $evaluation->participant->application->id }}</td>
                                    <td>{{ $evaluation->participant->category->name }}</td>
                                    <td>{{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }}  {{ $evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#evaluationShow{{ $evaluation->id }}"><i class="fas fa-eye"></i></button>
                                            @include('credit.evaluations.show')
                                            @can('evaluations.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#evaluationEdit{{ $evaluation->id }}"><i class="fas fa-pen"></i></button>
                                                @include('credit.evaluations.edit')
                                            @endcan
                                            @can('evaluations.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#evaluationDelete{{ $evaluation->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('credit.evaluations.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $evaluations->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
