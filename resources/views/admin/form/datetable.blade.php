{{--<head>--}}
{{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">--}}
{{--<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->--}}
{{--<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>--}}
{{--<script src="/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>--}}

{{--</head>--}}
{{--<form action="{{url('/admin/product/store')}}" method="post">--}}
<table id="datetable" class="display" cellspacing="0" style="width: auto">
    <thead>
    <tr style="align-content: center;padding: 0px">
        <th>规格值</th>
        <th>货号</th>
        <th>上架</th>
        <th>单位</th>
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
    @foreach($product as $value)
        <tr style="width: auto;align-content: center">
            <td>Tiger</td>
            <td><input type="text" id="product_bn" name="product_bn" value={!! $value->bn !!}></td>
            <td><input name="marketable" type="checkbox" value=""/></td>
            <td><select size="1" id="unit" name="_store_place">
                    <option value="件">件</option>
                    <option value="台">台</option>
                    {!! $value->unit !!}</select></td>
            <td><input style="width: 50px" type="text" id="store" name="product_store" value={!! $value->store !!}></td>
            <td>{!! $value->freez !!}</td>
            <td><input style="width: 50px" id="price" name="product_price" type="text" value={!! $value->price !!}></td>
            <td><input style="width: 50px" id="cost" name="product_cost" type="text" value={!! $value->cost !!}></td>
            <td><input style="width: 50px" id="mktprice" name="product_mktprice" type="text" value={!! $value->mktprice !!}></td>
            <td><input style="width: 50px" id="" type="text" name="" value=""></td>
            <td><select size="1" id="store_place" name="_store_place">
                    {{--{!! $value->store_place !!}--}}
                </select></td>
            {{--<td>{!! $value->is_default !!}</td>--}}
            <td><input name="is_default" type="checkbox" value="1"/></td>
            <td>
                <a href="">清除</a>
            </td>
        </tr>
    @endforeach
</table>
{{--</form>--}}
<div>
    <button id="addRow" type="button">增加一行</button>
    <button id="submit">保存提交</button>
</div>

<script type="application/x-javascript">
    $(document).ready(function () {
        var table = $('#datetable').DataTable({"paging": false, "ordering": false, "info": false});
        var data = new Object();
        var content = 2;
        $('#addRow').on('click', function () {
            table.row.add([
                '<td>Tiger</td>',
                '<td><input  id="bn" type="text"  name=' + content + '_product_bn class="product_bn" value=""></td>',
                '<td><input name=' + content + 'marketable type="checkbox" value="" /></td>',
                '<td><select size="1" id="unit" name=' + content + '_unit> <option value="件">件</option> <option value="台">台</option>{!! $value->unit !!}</select></td>',
                '<td><input style="width: 50px" id="store" type="text"  name=' + content + '_product_store class="store"  value=""></td>',
                '<td></td>',
                '<td><input style="width: 50px" id="price" type="text" name=' + content + '_product_price class="price"  value=""></td>',
                '<td><input style="width: 50px" id="cost" type="text" name=' + content + '_product_cost class="cost"  value=""</td>',
                '<td><input style="width: 50px" id="mktprice" type="text" name=' + content + '_product_mktprice  class="mktprice"  value=""></td>',
                '<td><input style="width: 50px" id="" type="text" name="" value=""></td>',
                '<td><select size="1" id="store_place" name="_store_place"><option value="件">件</option> <option value="台">台</option>{!! $value->store_place !!}</select></td>',
                '<td><input name=' + content + '_is_default type="checkbox" value="1" /></td>',
                '<td><a href="">清除</a> </td>'
            ]).draw(false);
            content++;

            alert(content + "_bn");
        });
        $('#submit').click(function () {
            data = table.$('input,select').serialize();

            alert(
                    data
            );
            return true;
        });
    });

</script>
