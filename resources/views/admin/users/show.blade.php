@extends('layouts.app')
@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>
        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td field-key='role'>{{ $user->role->title or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#folders" aria-controls="folders" role="tab" data-toggle="tab">Хавтаснууд</a></li>
<li role="presentation" class=""><a href="#files" aria-controls="files" role="tab" data-toggle="tab">Файлууд</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="folders">
<table class="table table-bordered table-striped {{ count($folders) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.folders.fields.name')</th>
            <th>@lang('quickadmin.folders.fields.created-by')</th>
        </tr>
    </thead>

    <tbody>
        @if (count($folders) > 0)
            @foreach ($folders as $folder)
                <tr data-entry-id="{{ $folder->id }}">
                    <td field-key='name'>{{ $folder->name }}</td>
                    <td field-key='created_by'>{{ $folder->created_by->created_at or '' }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="files">
<table class="table table-bordered table-striped {{ count($files) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.files.fields.folder')</th>
            <th>@lang('quickadmin.files.fields.created-by')</th>
        </tr>
    </thead>
    <tbody>
        @if (count($files) > 0)
            @foreach ($files as $file)
                <tr data-entry-id="{{ $file->id }}">
                    <td field-key='folder'>{{ $file->folder->name or '' }}</td>
                                <td field-key='created_by'>{{ $file->created_by->created_at or '' }}</td>
                                <td field-key='filename'>@if($file->filename)<a href="{{ asset(env('UPLOAD_PATH').'/' . $file->filename) }}" target="_blank">Download file</a>@endif</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            </div>
            </div>
        <p>&nbsp;</p>

        <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
    </div>
</div>
@stop
