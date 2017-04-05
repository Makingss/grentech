<template>
    <div>
        <group>
            <x-switch title="Show Me" v-model="show"></x-switch>
        </group>
        <div>
            <!--<alert v-model="show" title="Congratulations" >Your Message is sent successfully~</alert>-->
        </div>

    </div>
    </div>
</template>


<script>
    import { Alert, Group, XSwitch, Cell } from 'vux'

    export default {
        directives: {
//            TransferDom
        },
        components: {
            Alert,
            Group,
            XSwitch,
            Cell
        },
        data () {
            return {
                show: false,
            }
        },
        methods: {
            onShow () {
                console.log('on show')
            },
            onHide () {
                console.log('on hide')
            }
        }
    }
</script>