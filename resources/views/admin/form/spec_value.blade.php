<table id="spec_value" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th></th>
        <th>{{$column['spec_value_id']}}</th>
        <th>{{$column['spec_id']}}</th>
        <th>{{$column['spec_value']}}</th>
        <th>{{$column['alias']}}</th>
        {{--<th>{{$column['spec_image']}}</th>--}}
        {{--<th>{{$column['p_order']}}</th>--}}
    </tr>
    </thead>
</table>

<script>
    $.ajaxSetup({
        'headers': {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
    var editor;
    $(document).ready(function () {


        editor = new $.fn.dataTable.Editor({
            table: '#spec_value',
            ajax: '{!! url('/admin/specvalue/specvalueeditor') !!}',
            fields: [
                {
                    label: "{{$column['spec_id']}}",
                    name: '{{$column['keys']['spec_id']}}',
                    type: "select",
                    options: [
                        {label: "{{$column['getKey']}}", value: "{{$column['getKey']}}"},
                    ]
                },
                {
                    label: "{{$column['spec_value']}}:",
                    name: "{{$column['keys']['spec_value']}}"
                },
                {
                    label: "{{$column['alias']}}:",
                    name: "{{$column['keys']['alias']}}"
                },
                {{--{--}}
                    {{--label: "{{$column['spec_image']}}:",--}}
                    {{--name: "{{$column['keys']['spec_image']}}"--}}
                {{--},--}}
                {{--{--}}
                    {{--label: "{{$column['p_order']}}:",--}}
                    {{--name: "{{$column['keys']['p_order']}}"--}}
                {{--},--}}
            ],
        });


        $('#spec_value').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this, {
                onBlur: 'submit'
            });
        });

        $('#spec_value').DataTable({
            dom: "Bfrtip",
            ajax: '{!! url('/admin/specvalue/values',$column['getKey']) !!}',
            columns: [
                {
                    data: null,
                    defaultContent: '',
                    className: 'select-checkbox',
                    orderable: false
                },
                {data: "spec_value_id"},
                {data: "spec_id"},
                {data: "spec_value"},
                {data: "alias"},
//                {data: "spec_image"},
//                {data: "p_order"},

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
