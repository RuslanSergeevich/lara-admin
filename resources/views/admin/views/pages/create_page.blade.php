@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Новая страница</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => 'admin/pages']) !!}
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Title страницы')) !!}<br/>
                    {!! Form::label('Description') !!}
                    {!! Form::text('description', null, array('required', 'class'=>'form-control', 'placeholder'=>'Description страницы')) !!}<br/>
                    {!! Form::label('Keywords') !!}
                    {!! Form::text('keywords', null, array('class'=>'form-control', 'placeholder'=>'Keywords страницы')) !!}<br/>
                    {!! Form::label('URL страницы') !!}
                    {!! Form::text('url', null, array('required', 'class'=>'form-control translit', 'placeholder'=>'URL страницы')) !!}<br/>
                    {!! Form::label('Название страницы') !!}
                    {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Название страницы')) !!}<br/>
                    {!! Form::label('Родительская страница') !!}
                    {!! Form::select('parent_id', array('0' => 'Страница не выбрана') + $pages_list, old('parent_id', 0), array('class' => 'form-control')) !!}<br/>
                    {!! Form::label('Текст страницы') !!}
                    {!! Form::textarea('text', null, array('required', 'class'=>'form-control', 'placeholder'=>'Текст страницы')) !!}<br/>
                    {!! Form::label('Верхнее меню') !!}<br/>
                    Отображать:
                    {!! Form::hidden('top_menu', 0) !!}
                    {!! Form::checkbox('top_menu', 1, null) !!}<br/><br/>
                    {!! Form::label('Нижнее меню') !!}<br/>
                    Отображать:
                    {!! Form::hidden('footer_menu', 0) !!}
                    {!! Form::checkbox('footer_menu', 1, null) !!}<br/><br/>
                    {!! Form::label('Публикация страницы') !!}<br/>
                    Опубликовано: {!! Form::checkbox('published', 1, array('class'=>'form-control')) !!}<br/><br/>
                    {!! Form::submit('Добавить страницу', array('class'=>'btn btn-primary')) !!}<br/>
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
    </script>
@endpush

