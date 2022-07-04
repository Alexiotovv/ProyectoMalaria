@extends('layouts.base')
@section('content')

<div class="page-wrapper" >
    <div class="page-content">
        <div class="card">
            <div class="body-card">
                <div class="row">
                    <div class="content" style="text-align: center">
                        <h6>INFORME OPERACIONAL MENSUAL DE MALARIA</h6>
                    </div>
                    <div class="col-sm-4">
                        <label>Departamento</label>
                        <select type="text" class="single-select" name="dpto" disabled="">
                            <option value="3">LORETO</option>
                        </select>
                        <label>Provincia</label>
                        <select class="single-select" name="dpto">
                            @foreach ($prov as $pr)
                                <option value="{{$pr->id}}">{{$pr->nombre_prov}}</option>
                            @endforeach
                        </select>
                        <label>Establecimiento de Salud</label>
                        <select class="single-select form-control-sm" name="dpto">
                            @foreach ($est as $es)
                                <option value="{{$es->id}}">{{$es->nombre_estsalud}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label>Mes</label>
                        <select type="text" class="single-select" name="dpto">
                            <option value="ENE">ENERO</option>
                            <option value="FEB">FEBRERO</option>
                            <option value="MAR">MARZO</option>
                            <option value="ABR">ABRIL</option>
                            <option value="MAY">MAYO</option>
                            <option value="JUN">JUNIO</option>
                            <option value="JUL">JULIO</option>
                            <option value="AGO">AGOSTO</option>
                            <option value="SET">SETIEMBRE</option>
                            <option value="OCT">OCTUBRE</option>
                            <option value="NOV">NOVIEMBRE</option>
                            <option value="DIC">DICIEMBRE</option>
                        </select>
                        <label>DIRESA/DISA</label>
                        <select class="single-select" name="dpto">
                            <option value="DIRESA">DIRESA</option>
                            <option value="DISA">DISA</option>
                        </select>
                        <label>Distrito</label>
                        <select class="single-select form-control-sm" name="dpto">
                            @foreach ($dist as $d)
                                <option value="{{$d->id}}">{{$d->nombre_dist}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Año</label>
                        <select type="text" class="single-select" name="dpto">
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
            </div>
            <br>

            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;">
                <h6>POBLACIÓN TOTAL DE LA JURISDICCIÓN</h6>
            </form>
            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                <label> < 1a</label>
                <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
            </form>
            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                <label>1-5a</label>
                <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
            </form>
            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                <label>6-11a</label>
                <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
            </form>
            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                <label>12-17a</label>
                <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
            </form>
            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                <label>18-29a</label>
                <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
            </form>
            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                <label>30-59a</label>
                <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
            </form>
            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                <label>60a+</label>
                <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
            </form>
            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                <label>TOTAL</label>
                <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
            </form>

            <div class="row">
                <div class="col-sm-12">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;">
                        <h6>PROGRAMACIÓN ANUAL</h6>
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:100px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="0">
                    </form>
                </div>
            </div>


            {{-- BLOQUE 1 --}}
            <div class="row">
                <div class="col-6">
                    <table class="table mb-0 table-hover">
                        <thead>
                        </thead>
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==1)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                            <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>    
                                        @endfor
                                    </tr>
                                @endif
                                    
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- CIERRA BLOQUE 1--}}

                {{-- BLOQUE 2 --}}
                <div class="col-6">
                    <table class="table mb-0 table-hover">
                        <thead>
                        </thead>
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==2)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                        <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                        @endfor
                                            
                                    </tr>
                                @endif
                                    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- CIERRA BLOQUE 2 --}}

            {{-- BLOQUE 3 --}}
            <div class="row">
                <div class="col-12">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th style="width:250px;"></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==3)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                            <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                        @endfor 
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- CIERRA BLOQUE 3 --}}

            {{-- BLOQUE 4 --}}
            <div class="row">
                <div class="col-12">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th style="width:250px;"></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==4)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                            <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                        @endfor 
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- CIERRAR BLOQUE 4 --}}

            {{-- BLOQUE 5 --}}
            <div class="row">
                <div class="col-12">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th style="width:250px;"></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==5)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                            <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                        @endfor 
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- BLOQUE 5 --}}

             {{-- BLOQUE 6 --}}
             <div class="row">
                <div class="col-12">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th style="width:250px;"></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==6)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                            <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                        @endfor 
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- BLOQUE 6 --}}

              {{-- BLOQUE 7 --}}
              <div class="row">
                <div class="col-12">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th style="width:250px;"></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==7)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                            <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                        @endfor 
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- CIERRA BLOQUE 7 --}}
            
            
            <div class="row">
                {{-- BLOQUE 8 --}}
                <div class="col-6">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th style="width:250px;"></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==8)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                            <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                        @endfor 
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- CIERRA BLOQUE 8 --}}
                
                {{-- BLQOUE 9 --}}
                <div class="col-6">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th style="width:250px;"></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            @foreach ( $formato as $f )
                                @if ($f->bloque==9)
                                    <tr>
                                        <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                        @for ($i = 0; $i < $f->num_dato; $i++)
                                            <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                        @endfor 
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- CIERRA BLOQUE 9 --}}
            </div>
            

            {{-- BLOQUE 10 --}}
            <div class="col-12">
                <table class="table mb-0 table-hover">
                    <thead>
                        <tr>
                            <th style="width:250px;"></th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        @foreach ( $formato as $f )
                            @if ($f->bloque==10)
                                <tr>
                                    <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                    @for ($i = 0; $i < $f->num_dato; $i++)
                                        <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                    @endfor 
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- BLOQUE 11 --}}
            <div class="col-12">
                <table class="table mb-0 table-hover">
                    <thead>
                        <tr>
                            <th style="width:250px;"></th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        @foreach ( $formato as $f )
                            @if ($f->bloque==11 )
                                <tr>
                                    <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                    @for ($i = 0; $i < $f->num_dato; $i++)
                                        <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                    @endfor 
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- CIERRA BLOQUE 11 --}}


             {{-- BLOQUE 12 --}}
             <div class="col-12">
                <table class="table mb-0 table-hover">
                    <thead>
                        <tr>
                            <th style="width:250px;"></th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        @foreach ( $formato as $f )
                            @if ($f->bloque==12 )
                                <tr>
                                    <td style="padding-bottom:0px;padding-top:10px; {{$f->Negrita}}"><label>{{$f->NombreEtiqueta}}</label></td>
                                    @for ($i = 0; $i < $f->num_dato; $i++)
                                        <td style="padding-bottom:0px;padding-top:10px;"><input type="{{$f->TipoDato}}" class="form-control form-control-sm mb-3"></td>
                                    @endfor 
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- CIERRA BLOQUE 12 --}}

        </div>
    </div>
</div>

@endsection

@section('script_table')
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print'],
            order:[0]
        } 
    );
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
@endsection

@section('script_select2')
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),

        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
