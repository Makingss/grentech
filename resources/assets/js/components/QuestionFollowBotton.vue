<template>
    <button
            class="btn btn-success"
            v-text="text"
    ></button>
</template>
<script>
    export default {
        props:['quantity','goods_id'],
        mounted() {
        this.$http.post('/api/cartUpdate',{'quantity':3,'goods_id':100,'id':9}).then(response=>{
        this.followed=response.data.followed

        })
        },
        data(){
            return {
                followed:false
            }
        },
        computed:{
            text(){
                return this.followed ? '已关注' : '关注该问题'
            }
        }
    }


</script>
