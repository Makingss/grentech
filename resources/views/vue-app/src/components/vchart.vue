<template>
    <div class="chart">
        <canvas id="c1" width="200" height="300"></canvas>
    </div>

</template>
<script>
    // import GM from 'g2-mobile'
    var GM = require('g2-mobile');
    export default {
        name:'vchart',
        components:{
            GM
        },
        data:function(){
            return {
                vchart_data:[
                    {genre: 'Sports', sold: 275},
                    {genre: 'Strategy', sold: 115},
                    {genre: 'Action', sold: 120},
                    {genre: 'Shooter', sold: 350},
                    {genre: 'Other', sold: 150}
                ]
            }
        },
        created:function(){
            // console.log(GM);
            // //  var Util = GM.Util;
            // var chart = new GM.Chart({
            //     id: 'c1',
            //     width: 600,
            //     height: 300
            // });
            // var data = [
            //     {"tem": 10, "city": "tokyo"},
            //     {"tem": 4, "city": "newYork"},
            //     {"tem": 3, "city": "berlin"}
            // ];
            // chart.source(data);
            // chart.interval().position('city*tem').color('city');
            // chart.render();
        }

    }
</script>
<style lang="css" scoped>
    
</style>