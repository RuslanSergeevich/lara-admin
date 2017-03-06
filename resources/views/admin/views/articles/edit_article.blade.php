@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактирование статьи</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['method' => 'PATCH', 'action' => ['Admin\AdminControllerArticles@update', $article->id]]) !!}
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', $article->title, array('required', 'class'=>'form-control', 'placeholder'=>'Title cтатьи')) !!}<br/>
                    {!! Form::label('Keywords') !!}
                    {!! Form::text('keywords', $article->keywords, array('required', 'class'=>'form-control', 'placeholder'=>'Keywords cтатьи')) !!}<br/>
                    {!! Form::label('Description') !!}
                    {!! Form::text('description', $article->description, array('required', 'class'=>'form-control', 'placeholder'=>'Description cтатьи')) !!}<br/>
                    {!! Form::label('URL cтатьи') !!}
                    {!! Form::text('url', $article->url, array('required', 'class'=>'form-control', 'placeholder'=>'URL cтатьи')) !!}<br/>
                    {!! Form::label('Название cтатьи') !!}
                    {!! Form::text('name', $article->name, array('required', 'class'=>'form-control', 'placeholder'=>'Название cтатьи')) !!}<br/>
                    {!! Form::label('Текст cтатьи') !!}
                    {!! Form::textarea('text', $article->text, array('required', 'class'=>'form-control', 'placeholder'=>'Текст cтатьи')) !!}<br/>
                    {!! Form::label('Краткое описание cтатьи') !!}
                    {!! Form::textarea('small_text', $article->small_text, array('required', 'class'=>'form-control', 'placeholder'=>'Краткое описание cтатьи')) !!}<br/>
                    {!! Form::label('Публикация статьи') !!}<br/>
                    Опубликовано:
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, $article->published) !!}<br/><br/>
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