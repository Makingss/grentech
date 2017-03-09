<table id="product" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th></th>
        <th>ID</th>
        <th>{{$column['goods_id']}}</th>
        <th>{{$column['spec_info']}}</th>
        <th>{{$column['bn']}}</th>
        <th>{{$column['price']}}</th>
        <th>{{$column['cost']}}</th>
        <th>{{$column['mktprice']}}</th>
        <th>{{$column['store']}}</th>
        <th>{{$column['freez']}}</th>
        <th>{{$column['store_place']}}</th>
        <th>{{$column['unit']}}</th>
        <th>{{$column['is_default']}}</th>

    </tr>
    </thead>
</table>

<script>
    $.ajaxSetup({
        'headers': {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
    var geturl;
    var editor;
    $(document).ready(function () {
        $.fn.dataTable.ext.errMode = function(s,h,m){}
        editor = new $.fn.dataTable.Editor({
            ajax: '{!! url('/datatables/editor') !!}',
            table: '#product',
            fields: [
//                {
//                    label: "Active:",
//                    name: "active",
//                    type: "checkbox",
//                    separator: "|",
//                    options: [
//                        {label: '', value: 1}
//                    ]
//
//                },
//                {
//                    label: "Active:",
//                    name: "active2",
//                    type: "checkbox",
//                    separator: "|",
//                    options: [
//                        {label: '', value: 2}
//                    ]
//
//                },
                {
                    label: "{{$column['goods_id']}}",
                    name: '{{$column['keys']['goods_id']}}',
                    type: "select",
                    options: [
                        {label: "{{$column['getKey']}}", value: "{{$column['getKey']}}"},
                    ]
                },
                {
                    label: "{{$column['spec_info']}}",
                    name: "{{$column['keys']['spec_info']}}"
                },
                {
                    label: "{{$column['bn']}}:",
                    name: "{{$column['keys']['bn']}}"
                }, {
                    label: "{{$column['price']}}:",
                    name: "{{$column['keys']['price']}}"
                }, {
                    label: "{{$column['cost']}}:",
                    name: "{{$column['keys']['cost']}}"
                }, {
                    label: "{{$column['mktprice']}}:",
                    name: "{{$column['keys']['mktprice']}}"
                }, {
                    label: "{{$column['store']}}:",
                    name: "{{$column['keys']['store']}}"
                },
                {
                    label: "{{$column['is_default']}}:",
                    name: "{{$column['keys']['is_default']}}",
                    type: "select",
                    options: [
                        {label: "是", value: 1},
                        {label: "否", value: 0}
                    ],
                    def: 0
                },
                {
                    label: "{{$column['unit']}}",
                    name: "{{$column['keys']['unit']}}",
                    type: "select",
                    options: [
                        {label: "件", value: "件"},
                        {label: "台", value: "台"},
                        {label: "套", value: "套"}
                    ]
                },
                {
                    label: "{{$column['store_place']}}:",
                    name: "{{$column['keys']['store_place']}}"
                }
            ],
        });
        $('#product').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this, {
                onBlur: 'submit'
            });
        });
        $('#product').DataTable({
            dom: "Bfrtip",
            ajax: '{!! url('/datatables/data',$column['getKey']) !!}',
            columns: [
                {
                    data: null,
                    defaultContent: '',
                    className: 'select-checkbox',
                    orderable: false
                },
                {data: "goods_id"},
                {data: "product_id"},
                {data: "spec_info"},
                {data: "bn"},
                {data: "price", render: $.fn.dataTable.render.number(',', '.', 0, '￥')},
                {data: "cost", render: $.fn.dataTable.render.number(',', '.', 0, '￥')},
                {data: "mktprice", render: $.fn.dataTable.render.number(',', '.', 0, '￥')},
                {data: "store"},
                {data: "freez"},
                {data: "store_place"},
                {data: "unit"},
                {data: "is_default", editField: "is_default"}

            ],
            columnDefs: [
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [2],
                    "visible": false
                }
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
                "buttons": {
                    "create": "新建",
                    "edit": "编辑",
                    "remove": "删除",
                },
                "Delete": "删除"
            }
        });

    });

</script>
