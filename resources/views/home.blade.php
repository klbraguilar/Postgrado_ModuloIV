@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="form-group">
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('venta.index') }}" class="btn btn-info">Ventas</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('producto.index') }}" class="btn btn-info">Productos</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('users.index') }}" class="btn btn-info">Usuarios</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
