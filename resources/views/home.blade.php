@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="panel-default">
            <div class="panel-body">
                <h3 class="page-title" style="color: #3c8dbc">Хавтаснууд</h3>
                <div class="panel-body table-responsive">
                    @if (count($folders) > 0)
                        @foreach ($folders as $folder)
                            @can('folder_view')
                                <a class="col-md-2 folder" href="{{ route('admin.folders.index') }}/{{ $folder->id }}">
                                    <i class="fa fa-folder" style="font-size:20px;color: rgba(0,0,0,.72);"></i>
                                    <span class="title"
                                        style="position: absolute;margin-left:5px;">{{ str_limit($folder->name, 15) }}</span>
                                </a>
                            @endcan
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <style>
            .folder {
                margin: 15px;
                padding: 10px;
                border-radius: 5px;
                background: #eceded;
                color: rgba(0, 0, 0, .72);
                border: 1px solid #ffffff;
                box-shadow: 1px 1px 2px #ffffff;
            }

        </style>
    </div>
@endsection
