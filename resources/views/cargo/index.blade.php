@extends('layouts.app')

@section('template_title')
    Cargo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cargos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cargos.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('+ Agregar Cargo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-dark">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cargos as $cargo)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $cargo->name }}</td>

                                            <td>
                                                <form action="{{ route('cargos.destroy',$cargo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cargos.show',$cargo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver Detalles</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('cargos.edit',$cargo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cargos->links() !!}
            </div>
        </div>
    </div>
@endsection
