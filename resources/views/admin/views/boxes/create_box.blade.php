@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Новый блок</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => 'admin/boxes']) !!}
                    {!! Form::label('Системное имя блока') !!}
                    {!! Form::text('system_name', null, array('required', 'class'=>'form-control translit', 'placeholder'=>'Системное имя блока')) !!}<br/>
                    {!! Form::label('Название блока') !!}
                    {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Название блока')) !!}<br/>
                    {!! Form::label('Текст блока') !!}
                    {!! Form::textarea('text', null, array('required', 'class'=>'form-control', 'placeholder'=>'Текст блока')) !!}<br/>
                    {!! Form::label('Публикация блока') !!}<br/>
                    Опубликовано: {!! Form::checkbox('published', 1, array('class'=>'form-control')) !!}<br/><br/>
                    {!! Form::submit('Добавить блок', array('class'=>'btn btn-primary')) !!}<br/>
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