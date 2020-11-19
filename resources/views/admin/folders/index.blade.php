
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Хавтаснууд</h3>
    @can('folder_create')
        <p>
            <a href="{{ route('admin.folders.create') }}" class="btn btn-success">Хавтас нэмэх</a>

            @if(!is_null(Auth::getUser()->role_id) && config('quickadmin.can_see_all_records_role_id') == Auth::getUser()->role_id)
                @if(Session::get('Folder.filter', 'all') == 'my')
                    <a href="?filter=all" class="btn btn-default">Бүх хавтас</a>
                @else
                    <a href="?filter=my" class="btn btn-default">Байгаа хавтас</a>
                @endif
            @endif
        </p>
    @endcan
    @can('folder_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.folders.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">Бүгд</a></li>

            <li><a href="{{ route('admin.folders.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Хогийн сав</a></li>
        </ul>
        </p>
    @endcan
    <div class="panel panel-default">
        <div class="panel-heading">
            Жагсаалт
        </div>

        <div class="panel-body table-responsive">
            <table id="myTable" class="table table-bordered table-striped {{ count($folders) > 0 ? 'datatable' : '' }} @can('folder_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('folder_delete')
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>@endif
                    @endcan

                    <th>Хавтасны нэр</th>
                    <th>
                        @lang('quickadmin.folders.fields.created-by')
                    </th>
                    <th>
                        Файлын тоо
                    </th>
                    <th>Үйлдэлүүд</th>          
                    {{-- @endif --}}
                </tr>
                </thead>

                <tbody>
                @if (count($folders) > 0)
                    @foreach ($folders as $folder)
                        <tr data-entry-id="{{ $folder->id }}">
                            @can('folder_delete')
                                @if ( request('show_deleted') != 1 )
                                    <td></td>@endif
                            @endcan

                            <td field-key='name'>
                                @can('folder_view')
                                    <a href="{{ route('admin.folders.show',[$folder->id]) }}">{{$folder->name}}</a></td>
                                @endcan
                            <td field-key='name'>
                                @can('folder_view')
                                    <a href="{{ route('admin.folders.show',[$folder->id]) }}">{{$folder->created_at->format('Y/m/d')}}</a></td>
                                @endcan
                            <td field-key='name'>
                                @can('folder_view')
                                    <a href="{{ route('admin.folders.show',[$folder->id]) }}">
                                        
                                @can('folder_view')
                                <a href="{{ route('admin.folders.show',[$folder->id]) }}">
                                    <?php $b=0; ?>
                                    @foreach ($files as $file)
                                        @if($file->folder_id == $folder->id)
                                        <?php $b++; ?>
                                        @endif
                                    @endforeach 
                                    {{$b}}  
                                </a></td>
                            @endcan
                        </a></td>
                                @endcan
                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('folder_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'POST',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.folders.restore', $folder->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('folder_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.folders.perma_del', $folder->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    @can('folder_edit')
                                        <a href="{{ route('admin.folders.edit',[$folder->id]) }}" class="btn btn-xs btn-info">Засварлах</a>
                                    @endcan
                                    @can('folder_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.folders.destroy', $folder->id])) !!}
                                        {!! Form::submit(trans('Устгах'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach 
                @else
                    <tr>
                        <td colspan="7">харах</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
           var table = $('#myTable_Wrapper').DataTable();
console.log(table);
           table.button( '.dt-button' ).remove();
        })
    </script>
    <script>
        @can('folder_delete')
                @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.folders.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection