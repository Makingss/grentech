<table id="electric" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th></th>
        <th>{{$column['product_id']}}</th>
        <th>{{$column['workingband']}}</th>
        <th>{{$column['x_beamwidth']}}</th>
        <th>{{$column['y_beamwidth']}}</th>
        <th>{{$column['beamgain']}}</th>
        <th>{{$column['polarization']}}</th>

        <th>{{$column['dipangle']}}</th>
        <th>{{$column['xpd']}}</th>
        <th>{{$column['ratio']}}</th>
        <th>{{$column['inhibition']}}</th>
        <th>{{$column['voltagebobbi']}}</th>

        <th>{{$column['isolation']}}</th>
        <th>{{$column['imd3']}}</th>

        <th>{{$column['impedance']}}</th>
        <th>{{$column['capacity']}}</th>
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
            table: '#electric',
            ajax: '{!! url('/admin/electric/setajax') !!}',
            fields: [
                {
                    label: "{{$column['product_id']}}",
                    name: '{{$column['keys']['product_id']}}',
                    type: "select",
                    options: [
                        {label: "{{$column['getKey']}}", value: "{{$column['getKey']}}"},
                    ]
                },
                {
                    label: "{{$column['workingband']}}:",
                    name: "{{$column['keys']['workingband']}}"
                },
                {
                    label: "{{$column['x_beamwidth']}}:",
                    name: "{{$column['keys']['x_beamwidth']}}"
                },
                {
                    label: "{{$column['y_beamwidth']}}:",
                    name: "{{$column['keys']['y_beamwidth']}}"
                },
                {
                    label: "{{$column['beamgain']}}:",
                    name: "{{$column['keys']['beamgain']}}"
                },

                {
                    label: "{{$column['polarization']}}:",
                    name: "{{$column['keys']['polarization']}}"
                },
                {
                    label: "{{$column['dipangle']}}:",
                    name: "{{$column['keys']['dipangle']}}"
                },

                {
                    label: "{{$column['xpd']}}:",
                    name: "{{$column['keys']['xpd']}}"
                },
                {
                    label: "{{$column['isolation']}}:",
                    name: "{{$column['keys']['isolation']}}"
                },
                {
                    label: "{{$column['imd3']}}:",
                    name: "{{$column['keys']['imd3']}}"
                },

                {
                    label: "{{$column['impedance']}}:",
                    name: "{{$column['keys']['impedance']}}"
                },
                {
                    label: "{{$column['capacity']}}:",
                    name: "{{$column['keys']['capacity']}}"
                },

            ],
        });


        $('#electric').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this, {
                onBlur: 'submit'
            });
        });

        $('#electric').DataTable({
            dom: "Bfrtip",
            ajax: '{!! url('/admin/electric/getindex',$column['getKey']) !!}',
            columns: [
                {
                    data: null,
                    defaultContent: '',
                    className: 'select-checkbox',
                    orderable: false
                },
                {data: "product_id"},
                {data: "workingband"},
                {data: "x_beamwidth"},
                {data: "y_beamwidth"},
                {data: "beamgain"},
                {data: "polarization"},


                {data: "dipangle"},
                {data: "xpd"},
                {data: "ratio"},
                {data: "inhibition"},
                {data: "voltagebobbi"},
                {data: "isolation"},

                {data: "imd3"},
                {data: "impedance"},
                {data: "capacity"},


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
