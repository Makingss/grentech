{{--<head>--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">--}}
    {{--<link rel="stylesheet" href="../../extensions/Editor/css/editor.dataTables.min.css">--}}
    {{--<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->--}}
    {{--<script src="//code.jquery.com/jquery-1.12.4.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>--}}

{{--</head>--}}
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>规格值</th>
        <th>货号</th>
        <th>上架</th>
        <th>库存</th>
        <th>冻结库存</th>
        <th>售销价</th>
        <th>成本价</th>
        <th>市场价</th>
        <th>活动价</th>
        <th>货位</th>
        <th>默认货品</th>
        <th>操作</th>
    </tr>
    </thead>
</table>

<script type="application/x-javascript">
    var editor; // use a global for the submit and return data rendering in the examples

    $(document).ready(function () {
        editor = new $.fn.dataTable.Editor({
            ajax: "../php/staff.php",
            table: "#example",
            fields: [{
                label: "规格值:",
                name: "规格值"
            }, {
                label: "货号:",
                name: "货号"
            }, {
                label: "上架:",
                name: "上架"
            }, {
                label: "库存:",
                name: "库存"
            }, {
                label: "冻结库存:",
                name: "冻结库存"
            }, {
                label: "售销价:",
                name: "售销价",
//                type: "datetime"
            }, {
                label: "成本价:",
                name: "成本价"
            }, {
                label: "市场价:",
                name: "市场价"
            }, {
                label: "活动价:",
                name: "活动价"
            }, {
                label: "货位:",
                name: "货位"
            }, {
                label: "默认货品:",
                name: "默认货品"
            }, {
                label: "操作:",
                name: "操作"
            }
            ],
            formOptions: {
                bubble: {
                    title: 'Edit',
                    buttons: false
                }
            }
        });

        $('button.new').on('click', function () {
            editor
                    .title('Create new row')
                    .buttons({
                        "label": "Add", "fn": function () {
                            editor.submit()
                        }
                    })
                    .create();
        });

        $('#example').on('click', 'tbody td', function (e) {
            if ($(this).index() < 6) {
                editor.bubble(this);
            }
        });

        $('#example').on('click', 'a.remove', function (e) {
            editor
                    .title('Delete row')
                    .message('Are you sure you wish to delete this row?')
                    .buttons({
                        "label": "Delete", "fn": function () {
                            editor.submit()
                        }
                    })
                    .remove($(this).closest('tr'));
        });

        $('#example').DataTable({
            ajax: "../php/staff.php",
            columns: [
                {data: "first_name"},
                {data: "last_name"},
                {data: "position"},
                {data: "office"},
                {data: "start_date"},
                {data: "salary", render: $.fn.dataTable.render.number(',', '.', 0, '$')},
                {
                    data: null,
                    defaultContent: '<a href="#" class="remove">Delete</a>',
                    orderable: false
                },
            ]
        });
    });

</script>