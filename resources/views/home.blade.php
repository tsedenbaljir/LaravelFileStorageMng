@extends('layouts.app')
@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel panel-default"> 
                <h5 class="page-title">Хавтаснууд</h5>
                <div class="panel-body table-responsive">
                    @if (count($folders) > 0)
                        @foreach ($folders as $folder)
                            @can('folder_view')
                                <a class="col-md-2 folder" href="{{ route('admin.folders.index') }}/{{ $folder->id }}" >
                                    <i class="fa fa-folder" style="font-size:20px;color: rgba(0,0,0,.72);"></i>
                                    <span class="title" style="position: absolute;margin-left:5px;">{{str_limit($folder->name,15)}}</span>
                                </a>
                            @endcan 
                        @endforeach 
                    @endif 
                </div>
            </div>
        </div>
    </div>
    <style>
        .folder{
            margin:15px;
            padding: 10px;
            border-radius: 5px;
            color: rgba(0,0,0,.72);
            border:1px solid #c1c1c1;
        }
    </style>
</div>
@endsection
