<template>
    <div class="chart content">
    <div class="content-box">
     <canvas id="chart"></canvas>
      <canvas id="circlechart"></canvas>
      <canvas id="rangechart"></canvas>
    </div>
    </div>
</template>
<script>
    import GM from 'g2-mobile';
    // import GM from 'g2-mobile'
    export default {
        name:'vchart',
        components:{
            GM
        },
        data:function(){
            return {
                serverData: []
            }
            
        },
        methods:{
           draw_chart:function(){
               GM.Global.pixelRatio = 2;
               var Util = GM.Util;
                var data = [
                    {"time": '周一',"tem": 10,"city": "beijing"},
                    {"time": '周二',"tem": 22,"city": "beijing"},
                    {"time": '周三',"tem": 20,"city": "beijing"},
                    {"time": '周四',"tem": 26,"city": "beijing"},
                    {"time": '周五',"tem": 20,"city": "beijing"},
                    {"time": '周六',"tem": 26,"city": "beijing"},
                    {"time": '周日',"tem": 28,"city": "beijing"},
                    {"time": '周一',"tem": 5,"city": "newYork"},
                    {"time": '周二',"tem": 12,"city": "newYork"},
                    {"time": '周三',"tem": 26,"city": "newYork"},
                    {"time": '周四',"tem": 20,"city": "newYork"},
                    {"time": '周五',"tem": 28,"city": "newYork"},
                    {"time": '周六',"tem": 26,"city": "newYork"},
                    {"time": '周日',"tem": 20,"city": "newYork"}
                ];
                var chart=new GM.Chart({id:"chart"});
                var defs = {
                    time: {
                        tickCount: 7,
                        range:[0,1]
                    },
                    tem: {
                        tickCount: 5,
                        min: 0
                    }
                };
                //配置time刻度文字样式
                var label = {
                    fill: '#979797',
                    font: '14px san-serif',
                    offset: 6
                };
                chart.axis('time', {
                    label: function (text, index, total) {
                    var cfg = Util.mix({}, label);
                    // 第一个点左对齐，最后一个点右对齐，其余居中，只有一个点时左对齐
                    if (index === 0) {
                        cfg.textAlign = 'start';
                    }
                    if (index > 0 && index === total - 1) {
                        cfg.textAlign = 'end';
                    }
                    return cfg;
                    }
                });
                //配置刻度文字大小，供PC端显示用(移动端可以使用默认值20px)
                chart.axis('tem', {
                    label: {
                        fontSize: 14
                    }
                });
                 chart.source(data, defs);
                chart.line().position('time*tem').color('city').shape('smooth');
                chart.render();
           },
           draw_circle_chart:function(){
               GM.Global.pixelRatio = 2;
                var  data = [
                    {a: '1', b: 0.3, c: '1'},
                    {a: '1', b: 0.3, c: '2'},
                    {a: '1', b: 0.4, c: '3'}
                ];
                var chart = new GM.Chart({
                    id: 'circlechart'
                });
                chart.source(data);
                chart.coord('polar', {
                    transposed: true,
                    inner: 0
                });
                chart.axis(false);
                chart.intervalStack().position('a*b').color('c');
                chart.render();
           },
           draw_range_chart:function(){
                 var Util = GM.Util;
                // 双精度
                GM.Global.pixelRatio = 2;   
                var data = [
                    {"time": '2016-08-08 00:00:00',"tem": 10,"city": "beijing"},
                    {"time": '2016-08-08 00:10:00',"tem": 22,"city": "beijing"},
                    {"time": '2016-08-08 00:30:00',"tem": 16,"city": "beijing"},
                    {"time": '2016-08-09 00:35:00',"tem": 26,"city": "beijing"},
                    {"time": '2016-08-09 01:00:00',"tem": 12,"city": "beijing"},
                    {"time": '2016-08-09 01:20:00',"tem": 26,"city": "beijing"},
                    {"time": '2016-08-10 01:40:00',"tem": 18,"city": "beijing"},
                    {"time": '2016-08-10 02:00:00',"tem": 26,"city": "beijing"},
                    {"time": '2016-08-10 02:20:00',"tem": 12,"city": "beijing"},
                    {"time": '2016-08-08 00:00:00',"tem": 28,"city": "newYork"},
                    {"time": '2016-08-08 00:10:00',"tem": 16,"city": "newYork"},
                    {"time": '2016-08-08 00:30:00',"tem": 26,"city": "newYork"},
                    {"time": '2016-08-09 00:35:00',"tem": 12,"city": "newYork"},
                    {"time": '2016-08-09 01:00:00',"tem": 26,"city": "newYork"},
                    {"time": '2016-08-09 01:20:00',"tem": 20,"city": "newYork"},
                    {"time": '2016-08-10 01:40:00',"tem": 29,"city": "newYork"},
                    {"time": '2016-08-10 02:00:00',"tem": 16,"city": "newYork"},
                    {"time": '2016-08-10 02:20:00',"tem": 22,"city": "newYork"}
                ];
                var chart = new GM.Chart({
                    id: 'rangechart'
                });
                chart.source(data, {
                    time: {
                    type: 'timeCat',
                    mask: 'yyyy-mm-dd',
                    tickCount: 3,
                    range:[0,1]
                    },
                    tem: {
                    tickCount: 5,
                    min: 0
                    }
                });
                //配置刻度文字大小，供PC端显示用(移动端可以使用默认值20px)
                chart.axis('tem', {
                    label: {
                    fontSize: 14 
                    }
                });
                //配置time刻度文字样式
                var label = {
                    fill: '#979797',
                    font: '14px san-serif',
                    offset: 6
                };
                chart.axis('time', {
                    label: function(text, index, total) {
                    var cfg = Util.mix({}, label);
                    // 第一个点左对齐，最后一个点右对齐，其余居中，只有一个点时左对齐
                    if (index === 0) {
                        cfg.textAlign = 'start';
                    }
                    if (index > 0 && index === total - 1) {
                        cfg.textAlign = 'end';
                    }
                    return cfg;
                    }
                });
                chart.area().position('time*tem').color('city').shape('smooth').style({
                    opacity: 0.6
                });
                chart.render();
           }
        },
        mounted:function(){
           this. draw_chart();
           this.draw_circle_chart();
           this.draw_range_chart();
        },
        created:function(){
           
        }
    }
</script>
<style lang="css" scoped>
    #chart,#circlechart,#rangechart{
        width:105%;
        height:260px;
        margin-top:.5rem;
    }
   #rangechart{
       margin-bottom:2rem;
   }
</style>