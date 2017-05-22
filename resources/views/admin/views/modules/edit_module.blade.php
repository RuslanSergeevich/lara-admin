@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактирование модуля</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($module, ['method' => 'PATCH',  'action' => ['Admin\AdminModulesController@update', $module->id]]) !!}
                    <h4>{!! $module->title !!}</h4><br/>
                    {!! Form::label('Иконка пункта меню') !!}
                    {!! Form::text('icon', old('icon'), array('required', 'class'=>'form-control', 'placeholder'=>'Название галереи')) !!}<br/>
                    Опубликовано:
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, old('published')) !!}<br/><br/>
                    {!! Form::submit('Сохранить', array('class'=>'btn btn-primary')) !!}<br/>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection