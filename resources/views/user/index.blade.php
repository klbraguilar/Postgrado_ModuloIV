@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Ventas</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('venta.create') }}" class="btn btn-info">Añadir Venta</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre User</th>
                                <th>E-mail</th>
                                <th>Fecha Registro</th>

                                <tbody id="tbody">
                                {{--@if(!empty($ventas))--}}
                                    {{--@foreach($ventas as $venta)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$venta['nombre']}}</td>--}}
                                            {{--<td>{{$venta['cantidadp']}}</td>--}}
                                            {{--<td>{{$venta['fecharegistro']}}</td>--}}
                                            {{--<td><a class="btn btn-primary btn-xs"--}}
                                                   {{--href="{{action('VentaController@show', $venta['id'])}}"><span--}}
                                                            {{--class="glyphicon glyphicon-eye-open" title="Ver"></span></a>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<form action="{{action('VentaController@destroy', $venta['id'])}}"--}}
                                                      {{--method="post">--}}
                                                    {{--{{csrf_field()}}--}}
                                                    {{--<input name="_method" type="hidden" value="DELETE"></form>--}}
                                                {{--<button class="btn btn-danger btn-xs" type="submit"><span--}}
                                                            {{--class="glyphicon glyphicon-trash" title="Eliminar"></span>--}}
                                                {{--</button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                {{--@else--}}
                                    {{--<tr>--}}
                                        {{--<td colspan="8">No hay registro !!</td>--}}
                                    {{--</tr>--}}
                                {{--@endif--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--<a href="{{ route('home')--}}
{{--}}" class="btn btn-info btn-block" >Atrás</a>--}}
                    {{--{{ $libros->links() }}--}}
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
    <script>


        // Initialize Firebase
        var config = {
            apiKey: "{{ config('services.firebase.api_key') }}",
            authDomain: "{{ config('services.firebase.auth_domain') }}",
            databaseURL: "{{ config('services.firebase.database_url') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket') }}",
        };
        firebase.initializeApp(config);

        var database = firebase.database();

        var lastIndex = 0;


        // Get Data
        firebase.database().ref('erp/users/').on('value', function (snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function (index, value) {

                if (value) {

                    var redirect = '<a class="btn btn-primary btn-xs" href="{!! action('VentaController@show',":id") !!}">';

                    var row = '<tr>' +
                                '<td>'+value.nombre+'</td>' +
                                '<td>'+value.email+'</td>' +
                                '<td>'+value.fecharegistro+'</td></tr>';
                    htmls.push(row);
                    console.log(value);
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
        });





    </script>
@endpush