@extends('_layouts.app')
@section('titulo')
    @lang('Crear Asignatura')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('sistema.asignaturas')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Asignaturas Libres')</a></li>
    <li class="active">@lang('Agregar Asignatura Libre' )</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'asignaturalibre', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Asignatura</h3>
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
                            {{ Form::label('idasignatura_cl', Lang::get('Codigo de Asignatura'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="idasignatura_cl" type="text" placeholder="Codigo" readonly="readonly" class="form-control" name="idasignatura_cl" value="{{$idasignacl}}" maxlength="6" required>
                            </div>
                     </div>
                    <div class="form-group">
                            {{ Form::label('nombre_asig_cl', Lang::get('Asignatura'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="nombre_asig_cl" type="text" placeholder="Asignatura" class="form-control" name="nombre_asig_cl"  maxlength="20" required>
                            </div>
                     </div>    
                    <div class="form-group">
                        {{ Form::label('horas_totales', Lang::get('Horas Totales'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="horas_totales" type="text" placeholder="Horas Totales" class="form-control" name="horas_totales" onKeyPress="return validar(event)" maxlength="3" required>
                        </div>
                    </div>
                   

                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Crear Asignatura'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close()  }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@@section ('scrips_n')
    <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection

