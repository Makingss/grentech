{{--@extends('layouts.master')--}}
{{--@section('content')--}}
    <table id="example" class="display" cellspacing="0" width=60%">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>编码</th>
            <th>销售价</th>
            <th>成本价</th>
            <th>市场价</th>
            <th>库存</th>
            <th>冻结库存</th>
            <th>仓位</th>

        </tr>
        </thead>
    </table>
{{--@stop--}}
{{--@push('scripts')--}}

<script>
    $.ajaxSetup({
        'headers': {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
    var editor;
    $(document).ready(function () {

        editor = new $.fn.dataTable.Editor({
            ajax: '{!! url('/datatables/editor') !!}',
//            type: "post",
            table: '#example',
//            processing: true,
//            serverSide: true,
            fields: [
//                {
//                    label: "ID:",
//                    name: "product_id"
//                },
                {
                    label: "编码:",
                    name: "bn"
                }, {
                    label: "销售价:",
                    name: "price"
                }, {
                    label: "成本价:",
                    name: "cost"
                }, {
                    label: "市场价:",
                    name: "mktprice"
                }, {
                    label: "库存:",
                    name: "store"
                },
//                {
//                    label: "freez:",
//                    name: "freez"
//                },
                {
                    label: "仓位:",
                    name: "store_place"
                }
            ],
        });
        $('#example').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this, {
                onBlur: 'submit'
            });
        });

        $('#example').DataTable({
            dom: "Bfrtip",
            ajax: '{!! url('/datatables/data') !!}',
            columns: [
                {
                    data: null,
                    defaultContent: '',
                    className: 'select-checkbox',
                    orderable: false
                },
                {data: "product_id"},
                {data: "bn"},
                {data: "price",render: $.fn.dataTable.render.number( ',', '.', 0, '￥' )},
                {data: "cost",render: $.fn.dataTable.render.number( ',', '.', 0, '￥' )},
                {data: "mktprice",render: $.fn.dataTable.render.number( ',', '.', 0, '￥' )},
                {data: "store"},
                {data: "freez"},
                {data: "store_place"},
            ],
            order: [1, 'asc'],
            select: {
                style: 'os',
                selector: 'td:first-child'
            },
            buttons: [
                {extend: "create", editor: editor},
                {extend: "edit", editor: editor},
                {extend: "remove", editor: editor}
            ],
            language: {
                "sProcessing": "处理中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                },
                "buttons":{
                    "create":"新建",
                    "edit":"编辑",
                    "remove":"删除",
                },
                "Delete":"删除"
            }
        });

    });

</script>

{{--@endpush--}}