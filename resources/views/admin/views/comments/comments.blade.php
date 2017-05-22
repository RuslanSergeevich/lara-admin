@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Отзывы</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fa fa-check"></i>{{Session::get('flash_message')}}</h5>
                                </div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>URL</th>
                                    <th>Дата изменения</th>
                                    <th>Публикация</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->name}}</td>
                                        <td>{{$comment->url}}</td>
                                        <td>{{$comment->updated_at->format('d-m-Y h:i:s')}}</td>
                                        <td>@if ($comment->published == 1)<span class="text-success">Да</span> @else <span class="text-danger">Нет</span> @endif </td>
                                        <td class="button-width"><a href="/admin/articles/{{$comment->id}}/edit">
                                                <button type="button" class="btn btn-primary">Редактировать</button></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$comment->id}}">Удалить</button>
                                            <div class="modal fade" id="{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Удалить статью?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            После удаления восстановить будет невозможно! Продолжаем?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Закрыть</button>
                                                            {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\AdminControllerComments@destroy', $comment->id]]) !!}
                                                            {!! Form::submit('Удалить', array('class'=>'btn btn-danger')) !!}
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>URL</th>
                                    <th>Дата изменения</th>
                                    <th>Публикация</th>
                                    <th>Действие</th>
                                </tr>
                                </tfoot>
                            </table>
                            <a href="/admin/comments/create"><button type="button" class="btn btn-primary">Добавить отзыв</button></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection