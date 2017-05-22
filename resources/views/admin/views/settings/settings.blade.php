@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Настройки сайта</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['method' => 'PATCH', 'class' => 'form_submit']) !!}
                    {{ Form::hidden('id', $settings->id)}}

                    <div class="col-md-3">
                        {!! Form::label('Номера телефонов') !!}<br/>
                        {!! Form::text('phone1', $settings->phone1, array('class'=>'form-control', 'placeholder'=>'Номер телефона')) !!}<br/>
                        {!! Form::text('phone2', $settings->phone2, array('class'=>'form-control', 'placeholder'=>'Номер телефона')) !!}<br/>
                        {!! Form::text('phone3', $settings->phone3, array('class'=>'form-control', 'placeholder'=>'Номер телефона')) !!}<br/>
                    </div>

                    <div class="col-md-3">
                        {!! Form::label('E-mail адреса') !!}<br/>
                        {!! Form::text('email', $settings->email, array('class'=>'form-control', 'placeholder'=>'E-mail')) !!}<br/>
                        {!! Form::text('email2', $settings->email2, array('class'=>'form-control', 'placeholder'=>'E-mail')) !!}<br/>
                    </div>
                    <div style="clear:both"></div>
                    <br/>
                    <div class="col-md-12">
                        {!! Form::label('Copyright') !!}
                        {!! Form::text('copyright', $settings->copyright, array('class'=>'form-control', 'placeholder'=>'copyright')) !!}<br/>
                        {!! Form::label('Адрес') !!}<br/>
                        {!! Form::textarea('address', $settings->address, array('class'=>'form-control')) !!}<br/>
                        {!! Form::label('Метрика и другие скрипты') !!}<br/>
                        {!! Form::textarea('metrika', $settings->metrika, array('class'=>'form-control')) !!}<br/>
                        {!! Form::submit('Сохранить', array('class'=>'btn btn-primary submit_settings')) !!}
                    </div>
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
        $(".submit_settings").click(function() {
            var id =  $(this).closest('form').find('input[type=hidden][name=id]').val();
            var phone1 = $(this).closest('form').find('input[type=text][name=phone1]').val();
            var phone2 = $(this).closest('form').find('input[type=text][name=phone2]').val();
            var phone3 = $(this).closest('form').find('input[type=text][name=phone3]').val();
            var email = $(this).closest('form').find('input[type=text][name=email]').val();
            var email2 = $(this).closest('form').find('input[type=text][name=email2]').val();
            var copyright = $(this).closest('form').find('input[type=text][name=copyright]').val();
            var address = $(this).closest('form').find('[name=address]').val();
            var metrika = $(this).closest('form').find('[name=metrika]').val();
            $.ajax({
                type: "POST",
                url: "/admin/settings/save_settings",
                data: {'id':id, 'phone1':phone1, 'phone2':phone2, 'phone3':phone3, 'email':email, 'email2':email2, 'copyright':copyright, 'address':address, 'metrika':metrika, '_token':"{{csrf_token()}}" },
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
    });
</script>
@endpush