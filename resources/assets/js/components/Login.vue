<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <label for="username">用户名</label>
                        <input type="text">
                    </div>
                    <div class="panel-body">
                        <label for="password">密码</label>
                        <input type="password">
                    </div>
                <div class="panel-body">
                    <button class="btn btn-default" type="submit">登录</button>
                    <div class="ui buttons">
                        <button class="ui button">Cancel</button>
                        <div class="or"></div>
                        <button class="ui positive button active">Save</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component ready.')
        }
    }
</script>
