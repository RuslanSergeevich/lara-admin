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

                    <div class="col-md-3">
                        {!! Form::label('Номера телефонов') !!}<br/>
                        {!! Form::text('phone1', $settings['0']['phone1'], array('class'=>'form-control', 'placeholder'=>'Номер телефона')) !!}<br/>
                        {!! Form::text('phone2', $settings['0']['phone1'], array('class'=>'form-control', 'placeholder'=>'Номер телефона')) !!}<br/>
                        {!! Form::text('phone3', $settings['0']['phone1'], array('class'=>'form-control', 'placeholder'=>'Номер телефона')) !!}<br/>
                    </div>
                   
                    <div class="col-md-3">
                        {!! Form::label('E-mail адреса') !!}<br/>
                        {!! Form::text('email', $settings['0']['email'], array('class'=>'form-control', 'placeholder'=>'E-mail')) !!}<br/>
                        {!! Form::text('email2', $settings['0']['email2'], array('class'=>'form-control', 'placeholder'=>'E-mail')) !!}<br/>
                    </div>
                    <div style="clear:both"></div>
                    <br/>
                    <div class="col-md-12">
                        {!! Form::label('Copyright') !!}
                        {!! Form::text('copyright', $settings['0']['copyright'], array('class'=>'form-control', 'placeholder'=>'copyright')) !!}<br/>
                        {!! Form::label('Адрес') !!}<br/>
                        {!! Form::textarea('address', $settings['0']['address'], array('class'=>'form-control')) !!}<br/>
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