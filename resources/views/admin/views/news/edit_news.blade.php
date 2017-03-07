@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактирование новости</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['method' => 'PATCH', 'action' => ['Admin\AdminControllerNews@update', $news->id]]) !!}
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', $news->title, array('required', 'class'=>'form-control', 'placeholder'=>'Title новости')) !!}<br/>
                    {!! Form::label('Keywords') !!}
                    {!! Form::text('keywords', $news->keywords, array('class'=>'form-control', 'placeholder'=>'Keywords новости')) !!}<br/>
                    {!! Form::label('Description') !!}
                    {!! Form::text('description', $news->description, array('class'=>'form-control', 'placeholder'=>'Description новости')) !!}<br/>
                    {!! Form::label('URL новости') !!}
                    {!! Form::text('url', $news->url, array('required', 'class'=>'form-control translit', 'placeholder'=>'URL новости')) !!}<br/>
                    {!! Form::label('Название новости') !!}
                    {!! Form::text('name', $news->name, array('required', 'class'=>'form-control', 'placeholder'=>'Название новости')) !!}<br/>
                    {!! Form::label('Текст новости') !!}
                    {!! Form::textarea('text', $news->text, array('required', 'class'=>'form-control', 'placeholder'=>'Текст новости')) !!}<br/>
                    {!! Form::label('Краткое описание новости') !!}
                    {!! Form::textarea('small_text', $news->small_text, array('required', 'class'=>'form-control', 'placeholder'=>'Краткое описание новости')) !!}<br/>
                    {!! Form::label('Публикация новости') !!}<br/>
                    Опубликовано:
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, $news->published) !!}<br/><br/>
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