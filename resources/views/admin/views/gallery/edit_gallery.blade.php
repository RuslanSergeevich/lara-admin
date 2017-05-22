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
                                <div class="image{{$gallery_item->id}}">
                                    <div class="col-md-3">
                                        <img src="/images/gallery/thumb_{!! $gallery_item->img !!}" class="img-thumbnail">
                                    </div>
                                    {!! Form::open(['method' => 'PATCH', 'class' => 'form_submit' , 'action' => ['Admin\AdminControllerGallery@update', $gallery_item->id]]) !!}
                                    <div class="col-md-3">
                                        {!! Form::text('title', $gallery_item->title, array('class'=>'form-control', 'placeholder'=>'Title изображения')) !!}<br/>
                                        {{ Form::hidden('id', $gallery_item->id) }}
                                        {{ Form::hidden('class', '.image'.$gallery_item->id) }}
                                        Опубликовано:
                                        {!! Form::hidden('published', 0) !!}
                                        {!! Form::checkbox('published', 1, $gallery_item->published) !!}<br/><br/>
                                        {!! Form::submit('Сохранить', array('class'=>'btn btn-primary submit_image_tags')) !!}
                                        {!! Form::submit('Удалить', array('class'=>'btn btn-danger delete_image')) !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::text('alt', $gallery_item->alt, array('class'=>'form-control', 'placeholder'=>'Alt изображения')) !!}
                                    </div>
                                    {!! Form::close() !!}
                                    <div style="clear:both"></div>
                                    <br/>
                                </div>
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

@push('scripts')
<script>
    $(document).ready(function() {
        $(".submit_image_tags").click(function() {
            var img_id =  $(this).closest('form').find('input[type=hidden][name=id]').val();
            var alt = $(this).closest('form').find('input[type=text][name=alt]').val();
            var title = $(this).closest('form').find('input[type=text][name=title]').val();
            var published = $(this).closest('form').find('input:checked').val();
            $.ajax({
                type: "POST",
                url: "/admin/gallery/edit_image",
                data: {'img_id':img_id, 'alt':alt, 'title':title, 'published':published, '_token':"{{csrf_token()}}" },
                success: function(){
                    new PNotify({
                        title: 'Успех!',
                        text: 'Данные сохранены!',
                        type: 'success'
                    });
                }
            });
            return false;
        });
        $(".delete_image").click(function() {
            var img_id =  $(this).closest('form').find('input[type=hidden][name=id]').val();
            var remove_image =  $(this).closest('form').find('input[type=hidden][name=class]').val();
            $.ajax({
                type: "POST",
                url: "/admin/gallery/delete_image",
                data: {'img_id':img_id, '_token':"{{csrf_token()}}" },
                success: function(){
                    new PNotify({
                        title: 'Успех!',
                        text: 'Изображение удалено!',
                        type: 'info'
                    });
                    $(remove_image).remove();
                }
            });
            return false;
        });
    });
</script>
@endpush