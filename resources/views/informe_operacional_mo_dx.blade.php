@extends('layouts.base')
@section('content')

<div class="page-wrapper">
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
                <div class="col-sm-6">
                        <div class="col">
                            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;">
                                <h6>PROGRAMACIÓN ANUAL</h6>
                            </form>
                            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:100px">
                                <input type="number" value="0" class="form-control form-control-sm mb-3" value="0">
                            </form>
                            <form action="">
                                <label for=""><h6>I.LOCALIZACIÓN DE CASOS</h6></label>
                            </form>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label for=""><h6>1. Febriles Identificados</h6></label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label for=""><h6>2. Febriles Examinadas</h6> </label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p style="padding-left: 10px">2.1 Febriles Examinados con Gota Gruesa</p>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p style="padding-left: 10px">2.1 Febriles Examinados con PDR</p>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label for=""><h6>2. Febriles Examinadas(+)</h6> </label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p style="padding-left: 10px">2.1 Febriles Examinados con Gota Gruesa(+)</p>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p style="padding-left: 10px">2.1 Febriles Examinados con PDR(+)</p>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>

                            <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;">
                                <h6>II. CONTROL DE COLATERALES</h6>
                            </form>
                            <div class="row">
                                <div class="col-sm-8">
                                    <h6>1. Colaterales Esperados(Positivosx6)</h6>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <h6>2. Colaterales Censados</h6>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label for=""><h6>3. Colaterales Examinados</h6> </label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <h6>4. Colaterales Catalogados como febriles</h6>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
  
                            <div class="row">
                                <div class="col-sm-8">
                                    <h6>5. Colateral Examinado(+)</h6>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p style="padding-left: 10px">5.1 Colateral Examinados con GG (+)</p>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p style="padding-left: 10px">5.2 Colateral Examinados con PDR (-)</p>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm mb-3" value="0">
                                </div>
                            </div>

                        </div>
                </div>
                <div class="col-sm-6">
                    <h6>III. TOTAL CASOS DIAGNOSTICADOS</h6>
                    <div class="row">
                        <div class="col-sm-8">
                            <h6 style="padding-left: 10px">1. Total de Exámenes de Dx</h6>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="padding-left: 20px">1.1 Lámina de GG de Dx</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="padding-left: 20px">1.1 PDR de Dx</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h6 style="padding-left: 10px">2. Total de Exámenes de Dx(+)</h6>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="padding-left: 20px">2.1 Lámina de GG de Dx de Dx(+)</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="padding-left: 20px">2.2 PDR de Dx(+)</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-8">
                            <h6 style="padding-left: 10px">3. Total de GG de Control</h6>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="padding-left: 20px">3.1 GG de Control a Casos Confirmados</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="padding-left: 20px">3.2 GG de Control a Casos Probable</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <h6 style="padding-left: 10px">4. Total de GG de Control(+)</h6>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="padding-left: 20px">4.1 GG de Control a Casos Confirmados(+)</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="padding-left: 20px">4.2 GG de Control a Casos Probables(-)</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h6 style="padding-left: 10px">5. Total Muestras Realizadas</h6>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm mb-3" value="0">
                        </div>
                    </div>
                </div>
            </div>
            

            <h6>IV. INFORME DE CASOS</h6>
            <div class="row">
                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;">
                        <h6>1. Total de Casos de Malaria</h6>
                    </form>
                </div>
                <div class="col-sm-8">
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
                </div>


                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 20px;">
                        <h6>1.1 Total de Casos Cofirmados</h6>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                 {{-- a. Plasmodium vivax--}}

                 <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 30px;">
                        <p>a) Plasmodium Vivax</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>       

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 30px;">
                        <p>b) Plasmodium Falciparum</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>


                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 30px;">
                        <p>c) Plasmodium Plasmodium Malariae</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 30px;">
                        <p>d) Mixta</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 30px;">
                        <h6>1.2 Casos Probables</h6>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 30px;">
                        <h6>1.3 Total de casos conf. En Gestantes</h6>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 40px;">
                        <p>a) Plasmodium Vivax</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 40px;">
                        <p>a) Plasmodium Falciparum</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" style="visibility: hidden" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>


                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 30px;">
                        <h6>1.4 Casos de Malaria Grave - Complicada</h6>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 40px;">
                        <p>a) Plasmodium Vivax</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 40px;">
                        <p>a) Plasmodium Falciparum</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3"  value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>


                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 30px;">
                        <h6>1.5 Intervenciones</h6>
                    </form>
                </div>
                    <div class="col-sm-8">
                        {{-- aqui iba las casillas --}}
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 40px;">
                        <p>1.5.1 Gotas Gruesas Programadas</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 40px;">
                        <p>1.5.2 Personas Examinada con Gota Gruesa</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 40px;">
                        <p>1.5.3 Casos Positivos</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>


                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 40px;">
                        <p>1.5.4 Plasmodium Vivax</p>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>

              <h6>V. TOTA DE FALLECIDOS</h6>
                <div class="col-sm-4">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;">
                        <h6>1. Fallecidos por MGC a Plasmodium Vivax</h6>
                    </form>
                </div>
                <div class="col-sm-8">
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 5px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                    <form class="form-check form-check-inline" style="margin-right: 0px;padding-left: 0px;width:60px">
                        <input type="number" value="0" class="form-control form-control-sm mb-3" value="">
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

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
