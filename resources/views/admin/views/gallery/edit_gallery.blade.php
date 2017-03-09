@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактирование галереи</h3>
                </div>
                <div class="box-body">
                        @foreach($gallery_image as $gallery_item)
                            @if(!empty($gallery_item->img))
                                <div class="col-md-3">
                                    <img src="/images/gallery/thumb_{!! $gallery_item->img !!}" class="img-thumbnail">
                                </div>
                                <div class="col-md-3">
                                    {!! Form::open(['method' => 'PATCH', 'action' => ['Admin\AdminControllerGallery@update', $gallery_item->id]]) !!}
                                    {!! Form::text('title', $gallery->title, array('class'=>'form-control', 'placeholder'=>'Title изображения')) !!}<br/>
                                    {!! Form::text('alt', $gallery->alt, array('class'=>'form-control', 'placeholder'=>'Alt изображения')) !!}<br/>
                                    {!! Form::button('Сохранить', array('class'=>'btn btn-primary submit_image_tags')) !!}<br/>
                                    {!! Form::close() !!}
                                </div>
                                <div style="clear:both"></div>
                                <br/>
                            @endif
                        @endforeach
                    <br/>
                    {!! Form::open(['url' => 'admin/gallery/'.$gallery->id.'/addphoto', 'enctype' => 'multipart/form-data', 'class' => 'dropzone needsclick dz-clickable', 'id' => 'my-awesome-dropzone' ]) !!}
                    <div class="fallback">
                        {!! Form::file('file', null) !!}<br/>
                    </div>
                    {!! Form::close() !!}
                    <br/>
                    {!! Form::open(['method' => 'PATCH', 'action' => ['Admin\AdminControllerGallery@update', $gallery->id]]) !!}
                    {!! Form::label('Название галереи') !!}
                    {!! Form::text('name', $gallery->name, array('required', 'class'=>'form-control', 'placeholder'=>'Название галереи')) !!}<br/>
                    {!! Form::label('Публикация галереи') !!}<br/>
                    Опубликовано:
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, $gallery->published) !!}<br/><br/>
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