@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h3>Удирдах самбар</h3></div>
        <div class="panel-body">
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <th>Хавтас</th>
                        <th>Файл</th>
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <th>Үйлдэлүүд</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                                @can('user_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $user->name }}</td>
                                <td field-key='email'>{{ $user->email }}</td>
                                <td field-key='folder'>
                                    <?php $a=0; ?>
                                    @foreach ($folders as $folder)
                                        @if($folder->created_by_id == $user->id)
                                        <?php $a++; ?>
                                        @endif
                                    @endforeach 
                                        {{$a}}<br/></td>
                                <td field-key='file'>
                                    <?php $b=0; ?>
                                        @foreach ($files as $file)
                                            @if($file->created_by_id == $user->id)
                                            <?php $b++; ?>
                                            @endif
                                        @endforeach 
                                        {{$b}}<br/>
                                    </td>
                                <td field-key='role'>{{ $user->role->title or '' }}</td>
                                                                <td>
                                    @can('user_view')
                                    <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_edit')
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('user_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td> 
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <style>
        .folder{
            border:1px solid gray;
            margin:15px;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
                    {{--  --}}
            </div>
        </div>
    </div>
@endsection
