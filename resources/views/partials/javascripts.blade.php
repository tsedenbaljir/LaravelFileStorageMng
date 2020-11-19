<script>
    window.deleteButtonTrans = '{{ trans("quickadmin.qa_delete_selected") }}';
    window.copyButtonTrans = '{{ trans("quickadmin.qa_copy") }}';
    window.csvButtonTrans = '{{ trans("quickadmin.qa_csv") }}';
    window.excelButtonTrans = '{{ trans("quickadmin.qa_excel") }}';
    window.pdfButtonTrans = '{{ trans("quickadmin.qa_pdf") }}';
    window.printButtonTrans = '{{ trans("quickadmin.qa_print") }}';
    window.colvisButtonTrans = '{{ trans("quickadmin.qa_colvis") }}';
</script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>
<script>
    $.extend(true, $.fn.dataTable.defaults, {
        "select": true,
        "language": {
            "url":{

            },
            "decimal": "",
            "emptyTable": "Хүснэгтэнд өгөгдөл байхгүй байна.",
            "info": "_START_-ээс _END_ -г харуулж байна. Нийт /_TOTAL_ /",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "_MENU_ -н ширхэгээр харах",
            "loadingRecords": "Уншиж байна...",
            "processing": "Ачааллаж байна...",
            "search": "Хайх:",
            "zeroRecords": "Өгөгдөл олдсонгүй",
            "paginate": {
                "first": "1",
                "last": "Сүүлийн",
                "next": "Дараах",
                "previous": "Өмнөх"
            },
            "aria": {
                "sortAscending": ": баганыг дээшлэх замаар эрэмбэлэх",
                "sortDescending": ": баганыг доошоо замаар эрэмбэлэх"
            },
            "select": {
                "rows": {
                    "_": "Та %d мөр сонгосон байна.",
                    "0": "Сонгоогүй байна.",
                    "1": "Зөвхөн 1 мөр сонгосон байна.",
                }
            },
        },
    });

</script>


@yield('javascript')
