@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактирование страницы</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['method' => 'PATCH', 'action' => ['Admin\AdminControllerPages@update', $pages->id]]) !!}
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', $pages->title, array('required', 'class'=>'form-control', 'placeholder'=>'Title страницы')) !!}<br/>
                    {!! Form::label('Keywords') !!}
                    {!! Form::text('keywords', $pages->keywords, array('class'=>'form-control', 'placeholder'=>'Keywords страницы')) !!}<br/>
                    {!! Form::label('Description') !!}
                    {!! Form::text('description', $pages->description, array('class'=>'form-control', 'placeholder'=>'Description страницы')) !!}<br/>
                    {!! Form::label('URL страницы') !!}
                    {!! Form::text('url', $pages->url, array('required', 'class'=>'form-control translit', 'placeholder'=>'URL страницы')) !!}<br/>
                    {!! Form::label('Название страницы') !!}
                    {!! Form::text('name', $pages->name, array('required', 'class'=>'form-control', 'placeholder'=>'Название страницы')) !!}<br/>
                    {!! Form::label('Текст страницы') !!}
                    {!! Form::textarea('text', $pages->text, array('required', 'class'=>'form-control', 'placeholder'=>'Текст страницы')) !!}<br/>
                    {!! Form::label('Публикация страницы') !!}<br/>
                    Опубликовано:
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, $pages->published) !!}<br/><br/>
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