@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Новая статья</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => 'foo/bar']) !!}
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Title cтатьи')) !!}<br/>
                    {!! Form::label('Keywords') !!}
                    {!! Form::text('keywords', null, array('required', 'class'=>'form-control', 'placeholder'=>'Keywords cтатьи')) !!}<br/>
                    {!! Form::label('Description') !!}
                    {!! Form::text('description', null, array('required', 'class'=>'form-control', 'placeholder'=>'Description cтатьи')) !!}<br/>
                    {!! Form::label('URL cтатьи') !!}
                    {!! Form::text('url', null, array('required', 'class'=>'form-control', 'placeholder'=>'URL cтатьи')) !!}<br/>
                    {!! Form::label('Название cтатьи') !!}
                    {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Название cтатьи')) !!}<br/>
                    {!! Form::label('Текст cтатьи') !!}
                    {!! Form::textarea('text', null, array('required', 'class'=>'form-control', 'placeholder'=>'Текст cтатьи')) !!}<br/>
                    {!! Form::label('Краткое описание cтатьи') !!}
                    {!! Form::textarea('small_text', null, array('required', 'class'=>'form-control', 'placeholder'=>'Краткое описание cтатьи')) !!}<br/>
                    {!! Form::label('Публикация статьи') !!}<br/>
                    Опубликовано: {!! Form::checkbox('published', null, array('class'=>'form-control')) !!}
                    {!! Form::button('Добавить статью', array('class'=>'btn btn-block btn-primary')) !!}<br/>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection