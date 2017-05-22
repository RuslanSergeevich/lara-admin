@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Новый пункт меню</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => 'admin/menu', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
                    {!! Form::label('Название меню') !!}
                    {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Название меню')) !!}<br/>

                    {!! Form::label('Тип страниц') !!}
                    {!! Form::select('type', $type_list, old('parent_id', 0), array('class' => 'form-control', 'id' => 'type')) !!}<br/>
                    {!! Form::select('menu', $pages_list, old('parent_id', 0), array('class' => 'form-control', 'id' => 'pages')) !!}<br/>
                    {!! Form::select('menu', $articles_list, old('parent_id', 0), array('class' => 'form-control', 'id' => 'articles')) !!}<br/>
                    {!! Form::select('menu', $news_list, old('parent_id', 0), array('class' => 'form-control', 'id' => 'news')) !!}<br/>
                    {!! Form::label('Публикация пункта') !!}<br/>
                    Опубликовано: {!! Form::checkbox('published', 1, array('class'=>'form-control')) !!}<br/><br/>
                    {!! Form::submit('Добавить меню', array('class'=>'btn btn-primary')) !!}<br/>
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
   /* $(function() {
        $('#pages').hide();
        $('#articles').hide();
        $('#news').hide();
        $('#type').change(function(){
            if($('#type').val() == 1) {
                $('#pages').show();

            } else {
                $('#pages').hide();
            }
            if($('#type').val() == 2) {
                $('#articles').show();

            } else {
                $('#articles').hide();
            }
            if($('#type').val() == 3) {
                $('#news').show();

            } else {
                $('#news').hide();
            }
        });
    });*/
    CKEDITOR.replace( 'text' );
    CKEDITOR.replace( 'small_text' );
</script>
@endpush