@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактирование блока</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['method' => 'PATCH', 'action' => ['Admin\AdminControllerBoxes@update', $boxes->id]]) !!}
                    {!! Form::label('Системное имя блока') !!}
                    {!! Form::text('system_name', $boxes->system_name, array('required', 'class'=>'form-control translit', 'placeholder'=>'Системное имя блока')) !!}<br/>
                    {!! Form::label('Название блока') !!}
                    {!! Form::text('name', $boxes->name, array('required', 'class'=>'form-control', 'placeholder'=>'Название блока')) !!}<br/>
                    {!! Form::label('Текст блока') !!}
                    {!! Form::textarea('box_text', $boxes->text, array('required', 'class'=>'form-control', 'placeholder'=>'Текст блока')) !!}<br/>
                    {!! Form::label('Публикация блока') !!}<br/>
                    Опубликовано:
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, $boxes->published) !!}<br/><br/>
                    {!! Form::hidden('updated_at', Carbon\Carbon::now(), array('required', 'class'=>'form-control')) !!}<br/>
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