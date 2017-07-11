<template>
    <div class="Carousel">
    
    
    
        <div ref="root" style="user-select:none;-webkit-user-select:none;overflow:hidden"></div>
    
    
    
        <div class="sliderPanel" :class="{transitionAni:ani}" :style="{height:height,transform:translateX}">
    
    
    
            <div v-for="item in itemList" class="verticalCenter picbox" :style="{left:item.x+'px'}">
    
    
    
                <img :style="{width:width,top:top}" :src="item.url" alt="" style="min-height:100%">
    
    
    
            </div>
    
        </div>
    
        <div @click="clickLeft" class="arrowLeft verticalCenter horizaCenter">
    
            <i class="iconfont">&#xe8ef;</i>
    
        </div>
    
        <div @click="clickRight" class="arrowRight verticalCenter horizaCenter">
    
            <i class="iconfont">&#xe8f1;</i>
    
        </div>
    
        <div class="arrowBottom verticalCenter horizaCenter">
    
            <i class="iconfont">&#xe637;</i>
    
        </div>
    
        <div class="sliderBar horizaCenter">
    
            <div v-for="(item,index) in imgArray" @click="clickSliderCircle(index)" class="circle" :class="{circleSelected:item.selected}">
    
            </div>
    
        </div>
    
    </div>
    
    </div>
</template>
<style lang="less" scoped>
    .transitionAni{
        transition:all 0.8s cubic-bezier(.23,1,.32,1);
    }
    .arrowLeft{
        transition:all 0.4s ease;
        width:60px;
        height:80px;
        text-align:center;
        line-height:80px;
        position:absolute;
        left:15px;
        top:50%;
        margin-top:-40px;
        background:rgba(224,224,218,0.6);
        border-radius: 6px;
        &:hover{
            background:rgba(224,224,218,0.9);
            transform: scale(1.1);
        }
    }
    .arrowRight{
    transition: all 0.4s ease;
    width: 60px;
    height: 80px;
    text-align:center;
    line-height:80px;
    position: absolute;
    right: 15px;
    top: 50%;
    margin-top: -40px;
     background:rgba(224,224,218,0.6);
    border-radius: 6px;
    &:hover{
            background:rgba(224,224,218,0.9);
            transform: scale(1.1);
        }
    }
    .circle{
        width:15px;
        height:15px;
        border-radius:50%;
        background: rgba(0,0,0,0.7);
        display:table-cell;
        margin-right: 3px;
        transition: all 0.5s ease;
        &:hover{
            background:#C7015C;
            transform: scale(1.15);
        }
    }
    .circleSelected{
        background:#C7015C;
         transform: scale(1.15);
    }
    .arrowBottom{
    width: 80px;
    height: 50px;
    position: absolute;
    text-align:center;
    line-height:50px;
    bottom: -15px;
    left: 50%;
    margin-left: -40px;
    background: #C7015C;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    transition: all 0.5s ease-out;
    &:hover{
    transform: translateY(-10px);
    background: deeppink;
    }
  }
  .picbox{
      width:100%;
      height:100%;
      position:absolute;
      top:0;
      overflow:hidden;
      transition:all 0.4s ease;
  }
</style>
<script>
var screen_width=document.body.clientWidth;
var screen_height=document.body.scrollHeight;
var left,center,right;
var selectIndex=0;
var count=0;
var second=3;//slider时间间隔
var timer=null;
var ani=null;
var debugScale=1;//测试用
var Direction={left:'left',right:'right'};
var autoDirection=Direction.right;
var canClick=true;
    export default {
        data: function() {
            return {
                width:'100%',
                height:screen_height+'px',
                top:0,
                ani:true,
                translateX:'scale('+debugScale+') translateX(0px)',
                imgArray: [{
            x:0,
            title1:'现在，在您的实验室',
            tilte2:'也可以轻松完成无创DNA产前检测',
            title3:'了解详细流程',
            click_url:'http://www.berrygenomics.com/products/nextseq-cn500/cn500test/',
            url:'images/demo/images-footer.jpg',
            selected:false,
                },
                {
            x:0,
            title1:'Sequel开启新基因组时代',
            tilte2:'覆盖十余种胎儿染色体疾病，体验升级，呵护加倍',
            title3:'了解更多',
            click_url:'http://www.berrygenomics.com/products/nextseq-cn500/cn500test/',
            url:'images/demo/images-footer.jpg',
          }],
          itemList:[]
            }
        },
        mounted:function(){
            console.log(screen_width);
            console.log('mounted');
            ani=this.$refs.root.querySelector('.sliderPanel');
            count=this.imgArray.length;
            this.setIndex(selectIndex);
            this.slideAuto(second);//自动切换
        },
        methods:{
            clickLeft:function(){
                console.log('clickLeft');
                if(!canClick) return false;
                autoDirection=Direction.left;
                console.log(autoDirection);
                console.log(second);
                this.slideAuto(second);
                this.moveLeftAni();
                canClick=false;
            },
            clickRight:function(){
                console.log('clickRight');
                if(!canClick) return false;
                autoDirection=Direction.right;
                this.slideAuto(second);
                this.moveRightAni();
                canClick=false;
            },
            slideRight:function(){
                selectIndex++;
                if(selectIndex+1>count){
                    selectIndex=0;
                }else if(selectIndex<0){
                    selectIndex=count-1;
                }
                this.setIndex(selectIndex)
            },
            slideLeft:function(){
                selectIndex--;
                if(selectIndex+1>count){
                    selectIndex=0
                }else if(selectIndex<0){
                    selectIndex=count-1;
                }
                this.setIndex(selectIndex);
            },
            clickSliderCircle:function(index){
                this.slideAuto(second);
                this.setIndexPre(index);
            },
            setIndexPre:function(index){
                if(!canClick)return false;
                canClick=false;
                if(index==selectIndex)return;
                var leftIndex=index;
                var centerIndex=selectIndex;
                var rightIndex=index;
                for(var i=0;i<count;i++){
                    if(i==selectIndex){
                        this.imgArray[i].selected=true;
                    }else{
                        this.imgArray[i].selected=false;
                    }
                }
                left=this.imgArray[leftIndex];
                center=this.imgArray[centerIndex];
                right=this.imgArray[rightIndex];
                left=JSON.parse(JSON.stringify(left));
                right=JSON.parse(JSON.stringify(right));
                left.x=-screen_width;
                center.x=0;
                right.x=screen_width;
                left.index=leftIndex;
                center.index=centerIndex;
                right.index=rightIndex;
                this.itemList=[left,center,right];
                if(index>selectIndex){
                    //右移
                    autoDirection=Direction.right;
                    +function(obj){
                        obj.anicompted('scale('+debugScale+') translateX('+0+'px)','scale('+debugScale+') translateX('+screen_width+'px)',function(){
                            obj.setIndex(index);
                        })
                    }(this)
                }else if(index<selectIndex){
                    //左移
                    autoDirection=Direction.left;
                    +function(){
                          obj.anicompted('scale('+debugScale+') translateX('+0+'px)','scale('+debugScale+') translateX('+screen_width+'px)',function(){
                            obj.setIndex(index);
                        })
                    }(this)
                }
            },
            setIndex(index){
                var leftIndex=index-1;
                var centerIndex=index;
                var rightIndex=index+1;
                if(index<=0){
                    index=0;
                    leftIndex=count-1;
                    centerIndex=index;
                    rightIndex=index+1;
                }else if(index>=count-1){
                    index=count-1;
                    leftIndex=index-1;
                    centerIndex=index;
                    rightIndex=0;
                }
                selectIndex=index;
                for(var i=0;i<count;i++){
                    if(i==selectIndex){
                        this.imgArray[i].selected=true;
                    }else{
                        this.imgArray[i].selected=false;
                    }
                }
                left=this.imgArray[leftIndex];
                center=this.imgArray[centerIndex];
                right=this.imgArray[rightIndex];
                left.x=-screen_width;
                center.x=0;
                right.x=screen_width;
                left.index=leftIndex;
                center.index=centerIndex;
                right.index=rightIndex;
                this.itemList=[left,center,right];
            },
            slideAuto:function(obj){
                
                clearInterval(timer);
                 +function (obj) {
                     console.log(obj);
                     timer=setInterval(function () {
                      if(autoDirection==Direction.left){
                         obj.moveLeftAni()
                     }else{
                         obj.moveRightAni()
                    }
                },second*1000)
              }(this)
            },
            moveLeftAni:function(){
                console.log('moveleftAni');
                console.log(screen_width);
                +function(obj){
                    obj.anicompted('scale('+debugScale+') translateX('+0+'px)','scale('+debugScale+') translateX('+screen_width+'px)',
                     function(){
                        obj.slideLeft()//圆点向左
                    }
                    )
                }
            },
            moveRightAni:function(obj){
                  +function(obj){
                    obj.anicompted('scale('+debugScale+') translateX('+0+'px)','scale('+debugScale+') translateX('+screen_width+'px)',
                      function(){
                        obj.slideRight()//圆点向右
                    }
                    );
                  
                }
            },
            anicompted:function(fromStr,toStr,callBack){
                var handler=null;obj=this;
                handler=function(){
                    ani.removeEventListener('webkitTransitionEnd',handler,false);
                    callBack();
                    obj.ani=false;
                    obj.translateX=fromStr;
                    canClick=true;
                }
                ani.removeEventListener('webkitTransitionEnd',handler,false);
                ani.addEventListener('webkitTransitionEnd',handler,false);
                this.ani=true;
                this.translateX=toStr;
            }
        }
    }
</script>