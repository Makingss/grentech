<template lang="html">
  <div class="user-info">
    <header-user></header-user>
    <div class="contains block-center tab-80">
      <el-row>
        <el-col :span="3">
        <navbar-personal></navbar-personal>
        </el-col>
        <el-col :span="21">
          <div class="">
            <el-tabs>
              <el-tab-pane label="基础信息">
                <el-row>
                  <el-col :span="16">
                    <div class="">
                      <el-form ref="form" :model="form" label-width="80px">
                        <el-form-item label="用户名" class="inputWhite">
                          <el-input v-model="form.name" disabled></el-input>
                        </el-form-item>
                        <el-form-item label="登录名" class="inputWhite">
                          <el-input v-model="form.loginName" disabled class="input"></el-input>
                          <span><a href="#" @click="cleraDis()">修改</a>&nbsp;可用于登录，请牢记哦~</span>
                        </el-form-item>
                        <el-form-item label="呢称" class="inputWhite">
                          <el-input v-model="form.nickName"></el-input>
                        </el-form-item>
                        <el-form-item label="性别">
                          <el-radio-group v-model="form.sex">
                            <el-radio label="男"></el-radio>
                            <el-radio label="女"></el-radio>
                            <el-radio label="保密"></el-radio>
                          </el-radio-group>
                        </el-form-item>
                        <el-form-item label="生日">
                          <el-date-picker
                          v-model="form.date"
                          type="datetime"
                          placeholder="选择日期时间">
                        </el-date-picker>
                        </el-form-item>
                        <el-form-item label="性趣爱好">
                          <el-checkbox-group v-model="form.type">
                            <el-checkbox label="图书/音像/数字商品" name="type"></el-checkbox>
                            <el-checkbox label="电脑/办公" name="type"></el-checkbox>
                            <el-checkbox label="家用电器" name="type"></el-checkbox>
                            <el-checkbox label="手机/数码" name="type"></el-checkbox>
                            <el-checkbox label="个护化妆" name="type"></el-checkbox>
                          </el-checkbox-group>
                        </el-form-item>
                        <el-form-item label="邮箱">
                          <div class="">
                              <a href="#">立即验证</a>
                          </div>
                        </el-form-item>
                        <el-form-item label="真实签名" class="inputWhite">
                          <el-input v-model="form.userName"></el-input>
                        </el-form-item>
                        <el-form-item>
                          <el-button type="primary" @click="submitForm()">保存</el-button>
                          <el-button @click="resetForm()">重置</el-button>
                        </el-form-item>
                      </el-form>
                    </div>
                  </el-col>
                  <el-col :span="8">
                    <div class="border-1px clear-float margin-rl-6 padding-10">
                      <div class="pull-left circle clear-float">
                        <img src="//storage.jd.com/i.imageUpload/31333634303333393833375f7031343933333538353836383432_mid.jpg" alt="">
                      </div>
                      <div class="pull-left padding-10">
                        <ul>
                          <li class="font-bold padding-tb-4">用户名: <span>13640339837_p</span></li>
                          <li><i class="iconfont font-mini color-success">&#xe614;</i> <span>钻石会员</span></li>
                          <li>信用积分:<span>85</span></li>
                          <li>会员类型:<span>个人用户</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="text-right padding-r-10 padding-tb-6">
                      注：修改手机和邮箱请到 <a href="#" class="color-primary">账户安全</a>
                    </div>
                  </el-col>
                </el-row>
                </form>
              </el-tab-pane>
              <el-tab-pane label="头像照片">
                <el-row>
                  <el-col :span="14" class="padding-10 border-1px-r">
                    <div class="">
                      <el-upload
                      class="upload-demo"
                      :action="action"
                      :on-preview="handlePreview"
                      :on-success="handleSuccess"
                      :multiple="false"
                      :show-upload-list="false">
                      <el-button size="small" type="primary">点击上传</el-button>
                      <div slot="tip" class="el-upload__tip margin-tb-10">只能上传jpg/png文件，且不超过500kb</div>
                      </el-upload>
                    </div>
                    <div class="border-1px">
                      <div class="padding-tb-20 text-center">
                        <img width="150px" height="150px" src="//storage.jd.com/i.imageUpload/31333634303333393833375f7031343933333538353836383432_big.jpg" alt="">
                      </div>
                    </div>
                    <div class="margin-tb-20 clear-float">
                    <h2>推荐头像</h2>
                    <div class="padding-t-6">
                      <ul>
                        <li class="pull-left padding-rl-4" v-for="item in 10"><img src="https://i.jd.com/defaultImgs/1.jpg" width="50px" height="50px" alt=""></li>
                      </ul>
                    </div>
                    </div>
                    <div class="">
                      <el-button :plain="true" type="primary" size="small">保存</el-button>
                    </div>
                  </el-col>
                  <el-col :span="10">
                    <div class="margin-10">
                      <h2>效果预览</h2>
                      <div class="color-gray">你上传的图片会自动生成2种尺寸，请注意小尺寸的头像是否清晰</div>
                      <div class="smallImg padding-t-6">
                        <img width="100px" height="100px" src="//storage.jd.com/i.imageUpload/31333634303333393833375f7031343933333538353836383432_big.jpg" alt="">
                        <div class="color-gray">
                            100*100像素
                        </div>
                      </div>
                      <div class="miniImg padding-t-6">
                          <img width="50px" height="50px" src="//storage.jd.com/i.imageUpload/31333634303333393833375f7031343933333538353836383432_big.jpg" alt="">
                          <div class="color-gray">
                              50*50像素
                          </div>
                      </div>
                    </div>
                  </el-col>
                </el-row>
              </el-tab-pane>
              <el-tab-pane label="更多个人信息">
                <div class="">
                  <el-form ref="form2" :model="form" label-width="100px">
                    <el-form-item label="婚姻状况">
                      <el-radio-group v-model="form2.status">
                        <el-radio label="未婚"></el-radio>
                        <el-radio label="已婚"></el-radio>
                        <el-radio label="保密"></el-radio>
                      </el-radio-group>
                    </el-form-item>
                    <el-form-item label="月收入">
                      <el-select v-model="form.prict" placeholder="请选择">
                        <el-option label="10000以下" value=""></el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="身份证号码" class="inputWhite">
                      <el-input v-model="form.idCard"></el-input>
                    </el-form-item>
                    <el-form-item label="教育程度">
                      <el-select v-model="form.region" placeholder="请选择">
                        <el-option label="初中" value=""></el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="所在行业">
                      <el-select v-model="form.region" placeholder="请选择">
                        <el-option label="计算机" value=""></el-option>
                      </el-select>
                    </el-form-item>
                  </el-form>
                  <div class="tab-30" style="margin-left:100px">
                    <el-button type="primary" :plain="true">保存</el-button>
                  </div>
                </div>
              </el-tab-pane>
            </el-tabs>
          </div>
        </el-col>
      </el-row>
    </div>
  </div>
</template>
<script>
export default {
  data:function(){
    return{
      form:{
        name:"13640339837_p",
        loginName:"",
        nickName:"",
        sex:"",
        date:"",
        type:"",
        userName:""
      },
      dialogVisible:false,
      dialogImageUrl: '',
      action:"https://jsonplaceholder.typicode.com/posts/",
      form2:{
        status:""
      },
    }
  },
  methods: {
    handlePreview(file) {
      this.dialogImageUrl=file.url;
      this.dialogVisible=true;
    },
    handleSuccess(response){
      console.log(response)
    },
  }
}
</script>

<style lang="less" scoped>

</style>
