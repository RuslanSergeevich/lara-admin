@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Новая новость</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => 'admin/news', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Title новости')) !!}<br/>
                    {!! Form::label('Keywords') !!}
                    {!! Form::text('keywords', null, array('class'=>'form-control', 'placeholder'=>'Keywords новости')) !!}<br/>
                    {!! Form::label('Description') !!}
                    {!! Form::text('description', null, array('required', 'class'=>'form-control', 'placeholder'=>'Description новости')) !!}<br/>
                    {!! Form::label('URL новости') !!}
                    {!! Form::text('url', null, array('required', 'class'=>'form-control translit', 'placeholder'=>'URL новости')) !!}<br/>
                    {!! Form::label('Изображение') !!}
                    {!! Form::file('img', null) !!}<br/>
                    {!! Form::label('Название новости') !!}
                    {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Название новости')) !!}<br/>
                    {!! Form::label('Текст новости') !!}
                    {!! Form::textarea('text', null, array('required', 'class'=>'form-control', 'placeholder'=>'Текст новости')) !!}<br/>
                    {!! Form::label('Краткое описание новости') !!}
                    {!! Form::textarea('small_text', null, array('class'=>'form-control', 'placeholder'=>'Краткое описание новости')) !!}<br/>
                    {!! Form::label('Публикация новости') !!}<br/>
                    Опубликовано: {!! Form::checkbox('published', 1, array('class'=>'form-control')) !!}<br/><br/>
                    {!! Form::submit('Добавить новость', array('class'=>'btn btn-primary')) !!}<br/>
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

@push('scripts')
    <script>
        CKEDITOR.replace( 'text' );
        CKEDITOR.replace( 'small_text' );
    </script>
@endpush