@extends('layouts.app')

@section('content')
    <h3 class="page-title" style="color: #3c8dbc"><label>Хавтасны нэр : </label> {{$folder->name}}</h3>
    <p>

        @if (Auth::getUser()->role_id == 2 && $userFilesCount > 5)
            <a href="{{url('admin/files/create?folder_id=' . $folder->id)}}" class="btn btn-success disabled">Энэ хавтсанд файл нэмэх</a>
            <a href="{{url('/admin/subscriptions')}}" class="btn btn-primary">Upgrade plan to Premium for $9.99/month</a>
        @else
            <a href="{{url('admin/files/create?folder_id=' . $folder->id)}}" class="btn btn-success">Энэ хавтасд шинэ файл нэмэх</a>
        @endif
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            Файлууд
        </div>
        {{--<div class="tab-content">--}}

        {{--<div role="tabpanel" class="tab-pane active" id="files">--}}
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($files) > 0 ? 'datatable' : '' }} @can('file_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('file_delete')
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>@endif
                    @endcan

                    <th>Файлуудын нэр</th>
                    <th>Хавтас</th>
                    @if( request('show_deleted') == 1 )

                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($files) > 0)
                    @foreach ($files as $file)
                        <tr data-entry-id="{{ $file->id }}">
                            @can('file_delete')
                                @if ( request('show_deleted') != 1 )
                                    <td></td>@endif
                            @endcan
                            <td field-key='filename'> @foreach($file->getMedia('filename') as $media)
                                    <p class="form-group">
                                        <a href="{{url('/admin/' . $file->uuid . '/download')}}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                    </p>
                                @endforeach</td>
                            <td field-key='folder'>{{ $file->folder->name or '' }}</td>
                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('file_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.files.restore', $file->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('file_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.files.perma_del', $file->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    <a href="{{url('/admin/' . $file->uuid . '/download')}}" class="btn btn-xs btn-success">Татаж авах</a>
                                    @can('file_delete')
                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.files.destroy', $file->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Хоосон хавтас байна. энд ямар нэг файл хадгалагдаагүй байна.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    {{--</div>--}}
    {{--</div>--}}

    <p>&nbsp;</p>

    <a href="{{ route('admin.folders.index') }}" class="btn btn-default">Буцах</a>


@stop
