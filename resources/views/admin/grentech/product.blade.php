<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
</head>

<form action="">

    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>规格值</th>
            <th>货号</th>
            <th>单位</th>
            <th>库存</th>
            <th>冻结库存</th>
            <th>售销价</th>
            <th>成本价</th>
            <th>市场价</th>
            <th>活动价</th>
            <th>货位</th>
            <th>默认货品</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product as $value)
            <tr>
                <td>Tiger Nixon</td>
                <td><input type="text" id="row-1-age" name="row-1-age" value={!! $value->bn !!}></td>
                <td>{{$value->unit}}</td>
                {{--<td><select size="1" id="row-1-office" name="row-1-office">--}}
                {{--<option value="Edinburgh" selected="selected">--}}
                {{--Edinburgh--}}
                {{--</option>--}}
                {{--<option value="London">--}}
                {{--London--}}
                {{--</option>--}}
                {{--<option value="New York">--}}
                {{--New York--}}
                {{--</option>--}}
                {{--<option value="San Francisco">--}}
                {{--San Francisco--}}
                {{--</option>--}}
                {{--<option value="Tokyo">--}}
                {{--Tokyo--}}
                {{--</option>--}}
                {{--</select></td>--}}
                <td><input type="text" id="store" name="store" value={!! $value->store !!}></td>
                <td>{!! $value->freez !!}</td>
                <td><input id="price" name="price" type="text" value={!! $value->price !!}></td>
                <td><input id="cost" name="cost" type="text" value={!! $value->cost !!}></td>
                <td><input id="mktprice" name="mktprice" type="text" value={!! $value->mktprice !!}></td>
                <td></td>
                <td>{!! $value->store_place !!}</td>
                <td>{!! $value->is_default !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</form>
<script type="application/x-javascript">
    $(document).ready(function () {
        var table = $('#example').DataTable();
        var data = new Object();
        $('button').click(function () {
            data = table.$('input, select').serialize();
            alert(
                    data
            );
            return false;
        });
    });
</script>