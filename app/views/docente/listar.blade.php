@extends('_layouts.app')

@section('titulo')
    @lang('Crear Docente')
@stop

@section('titulo_cabecera')
    @lang('Docentes')<small>@lang('listar docentes')</small>
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.docente')</a></li>
    <li class="active">@lang('sistema.listar_docente')</li>
@stop
@section('contenido')
        <!-- INICIO: BOX PANEL -->
    <div class="col-md-6 col-sm-8">
     {{ Form::open(array('url' => 'docente.listarasistencia',
                                'method' => 'GET',
                                'class' =>'form-inline',
                                'role' => 'form')) }}
            {{Form::input('text','buscar',Input::get('buscar'),array('class'=>'form-control')) }}
            {{Form::input('submit',null,'Buscar',array('class'=> 'btn btn-primary'))}}
     {{Form::close()}} 
    </div>
  <div class="col-md-6 col-sm-8">
    <div class="negro"></div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon">
          <a href="#"><span class="dada" style="font-size: 29px;color: rgba(255, 255, 255, 0.8);"> + </span></a>

        </div>
        <div class="google-expando__card" aria-hidden="true" >
              {{ Form::open(array('url' => 'docente', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Insertar Docente</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <ul class="error_list">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            {{ Form::label('id_docente', Lang::get('Código'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="id_docente"  type="text" placeholder="Código del Docente" class="form-control" name="id_docente" maxlength="5" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nombres', Lang::get('DNI'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="dni" type="text" placeholder="DNI" class="form-control" name="dni" onKeyPress="return validar(event)" maxlength="8" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nombres', Lang::get('Nombres'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="nombres" type="text" placeholder="Nombres"  class="form-control" name="nombres"  maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('apellidos', Lang::get('Apellidos'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="apellidos" type="text" placeholder="Apellidos"  class="form-control" name="apellidos"  maxlength="60" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('direccion', Lang::get('Dirección'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="direccion" type="text" placeholder="Dirección" class="form-control" name="direccion"  maxlength="90" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('telefono', Lang::get('Teléfono'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="telefono" type="text" placeholder="Teléfono" class="form-control" name="telefono" onKeyPress="return validar(event)" maxlength="9" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('correo', Lang::get('Correo'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="correo" type="email" placeholder="Correo" class="form-control" name="correo"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('cargo', Lang::get('Cargo'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-5">
                                {{ Form::select('cargo', [
                                    'Docente' => 'Docente',
                                    'Director' => 'Director',
                                    'Cordinador' => 'Cordinador'],null,array('class'=>'form-control','id'=>'cargo'))
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('fecha', Lang::get('Fecha'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-5">
                                <div class="input-group input-group-sm">
                                    {{ Form::text('fecha',null,array('class'=>'form-control fecha_cal','id'=>'fecha_fin','placeholder'=>Lang::get('sistema.formato_fecha'),'readonly'=>'readonly', 'size' =>'20')) }}
                                    <span class="input-group-btn">
                                      <button class="btn bg-blue btn-flat btn_calen" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <input class="btn btn-info pull-right" type="submit" value="Crear Docente">
                    </div>
                </div>
              {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Docentes</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php  if(isset($_GET["buscar"])) { $cont=0;  ?>
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30px">Código</th>
                            <th >Nombres</th>
                            <th >Correo</th>
                            <th >DNI</th>

                        </tr>
                        <!-- LISTAR DocenteS-->
                        @foreach($Busqueda as $doc)
                        <tr>
                            <td>{{$doc->iddocente}}</td>
                            <td>{{$doc->nombres}} {{$doc->apellidos}}</td>
                            <td>{{$doc->correo}}</td>
                            <td>{{$doc->dni}}</td>
                            <td>
                                <a href="/sis_academico/public/docente/{{ $doc->iddocente }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                 <a class="btn btn-xs btn-primary;background-color:yellow" href="{{ URL::to( '/docente/filtroAsistencia');}}/{{$doc->iddocente}}">Ver asistencia</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <?php }else{ $cont=0;?>
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30px">Código</th>
                            <th >Nombres</th>
                            <th >Correo</th>
                            <th >DNI</th>

                        </tr>
                        <!-- LISTAR DocenteS-->
                        @foreach($docentes as $doc)
                        <tr>
                            <td>{{$doc->iddocente}}</td>
                            <td>{{$doc->nombres}} {{$doc->apellidos}}</td>
                            <td>{{$doc->correo}}</td>
                            <td>{{$doc->dni}}</td>
                            <td>
                                <a href="/sis_academico/public/docente/{{ $doc->iddocente }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                 <a class="btn btn-xs btn-primary;background-color:yellow" href="{{ URL::to( '/docente/filtroAsistencia');}}/{{$doc->iddocente}}">Ver asistencia</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
            <?php } ?>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix text-center">
                    <ul class="pagination pagination-sm no-margin">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
                
        {{ Form::open(array('url' => 'docente/reporte','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
        {{ Form::submit(Lang::get('Hacer Reporte'), array('class' => 'btn btn-info pull-center')) }}
        {{ Form::close()}}
            </div><!-- /.box -->
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja1.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/sis_academico.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            function validar(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                if (tecla==8) return true;
                if (tecla==44) return true;
                if (tecla==48) return true;
                if (tecla==49) return true;
                if (tecla==50) return true;
                if (tecla==51) return true;
                if (tecla==52) return true;
                if (tecla==53) return true;
                if (tecla==54) return true;
                if (tecla==55) return true;
                if (tecla==56) return true;
                if (tecla==57) return true;
                patron = /1/; //ver nota
                te = String.fromCharCode(tecla);
                return patron.test(te);
            }
        </script>
    @stop

@endsection
