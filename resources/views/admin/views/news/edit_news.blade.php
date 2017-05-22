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
                    {!! Form::model($news, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'files' => true, 'action' => ['Admin\AdminControllerNews@update', $news->id]]) !!}
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', old('title'), array('required', 'class'=>'form-control', 'placeholder'=>'Title новости')) !!}<br/>
                    {!! Form::label('Keywords') !!}
                    {!! Form::text('keywords', old('keywords'), array('class'=>'form-control', 'placeholder'=>'Keywords новости')) !!}<br/>
                    {!! Form::label('Description') !!}
                    {!! Form::text('description', old('description'), array('required', 'class'=>'form-control', 'placeholder'=>'Description новости')) !!}<br/>
                    {!! Form::label('URL новости') !!}
                    {!! Form::text('url', old('url'), array('required', 'class'=>'form-control translit', 'placeholder'=>'URL новости')) !!}<br/>
                    {!! Form::label('Изображение') !!}<br/>
                    @if(!empty($news->img))<img src="/images/news/thumb_{!! $news->img !!}" class="img-thumbnail"><br/><br/>@endif
                    {!! Form::file('img', null) !!}<br/>
                    {!! Form::label('Название новости') !!}
                    {!! Form::text('name', old('name'), array('required', 'class'=>'form-control', 'placeholder'=>'Название новости')) !!}<br/>
                    {!! Form::label('Текст новости') !!}
                    {!! Form::textarea('text', old('text'), array('required', 'class'=>'form-control', 'placeholder'=>'Текст новости')) !!}<br/>
                    {!! Form::label('Краткое описание новости') !!}
                    {!! Form::textarea('small_text', old('small_text'), array('required', 'class'=>'form-control', 'placeholder'=>'Краткое описание новости')) !!}<br/>
                    {!! Form::label('Публикация новости') !!}<br/>
                    Опубликовано:
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, old('published')) !!}<br/><br/>
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

@push('scripts')
    <script>
        CKEDITOR.replace( 'text' );
        CKEDITOR.replace( 'small_text' );
    </script>
@endpush