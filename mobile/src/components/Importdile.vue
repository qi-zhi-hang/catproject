<template>
  <div class="ui-views">
    <div class="ui-viewsTop">
      <el-table
        :data="tableData3"
        style="width: 100%"
        height="250">
        <el-table-column
          fixed
          prop="date"
          label="字段1"
          width="150">
        </el-table-column>
        <el-table-column
          prop="name"
          label="字段2"
          width="120">
        </el-table-column>
        <el-table-column
          prop="province"
          label="字段3"
          width="120">
        </el-table-column>
        <el-table-column
          prop="city"
          label="字段4"
          width="120">
        </el-table-column>
        <el-table-column
          prop="address"
          label="字段5"
          width="300">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段6"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段6"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段7"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段8"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段9"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段10"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段11"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段12"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段13"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段14"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段15"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段16"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段17"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段18"
          width="120">
        </el-table-column>
        <el-table-column
          prop="zip"
          label="字段19"
          width="120">
        </el-table-column><el-table-column
        prop="zip"
        label="字段20"
        width="120">
      </el-table-column>
      </el-table>
    </div>
    <div class="ui-viewsCon">
    <div class="ui-viewsConleft">
      <el-table
        :data="tableData"
        style="width: 50%;float:left">
        <el-table-column
          prop="date"
          label="序号"
          width="180">
        </el-table-column>
        <el-table-column
          prop="name"
          label="字段名"
          width="180">
        </el-table-column>
        <el-table-column
          prop="address"
          label="编码类型">
        </el-table-column>
        <el-table-column
          prop="duiyingziduan"
          label="对应字段">
          <template slot-scope="scope">
            <el-select v-model="formInline.region" placeholder="对应字段" class="selectCon" @change.native.prevent="deleteRow(scope.$index, tableData3)" >
              <el-option  v-for="(item,index) in selectOpction" :key="index" :label="item" v-bind:value="item"></el-option>

            </el-select>
          </template>
        </el-table-column>
      </el-table>
    </div>
      <div class="ui-viewsConright" style="margin-top: 25px">
        <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" :inline="true" class="demo-form-inline" >
          <div class="form-items">
            <div class="form-items-title">示例模板</div>
          <el-form-item label="文件" prop="name" style="margin-left: -35px;margin-right: 0px">
            <el-input v-model="ruleForm.name" style="width: 600px;"></el-input>
          </el-form-item>
            <el-form-item>
              <el-upload class="uploadFile"
                         action="http://tplinux.pabupa.wang/index/index/upload"
                         :on-success="handleAvatarSuccess"
                         :on-preview="handlePreview"
                         :on-remove="handleRemove"
                         :before-remove="beforeRemove"
                         multiple
                         :limit="3"
                         :on-exceed="handleExceed"
                         :file-list="fileList">
                <el-button size="small" type="primary" >点击上传</el-button>
              </el-upload>
            </el-form-item>
          </div>
          <div class="form-items" style="margin-top: 20px">
            <div class="form-items-title">模板</div>
          <el-form-item label="选择模板" prop="region"  style="margin-left: -200px">
            <el-select v-model="ruleForm.region" placeholder="选择模板" style="width: 600px" >
              <el-option label="模板一" value="shanghai"></el-option>
              <el-option label="模板二" value="beijing"></el-option>
            </el-select>
          </el-form-item>
          </div>
          <div class="form-items" style="margin-top: 20px">
            <div class="form-items-title">格式信息</div>
            <div style="width: 80%">
            <el-form-item label="银行账号" style="margin-left: -40px">
              <el-select v-model="formInline.region" placeholder="银行账号">
                <el-option label="银行账号1" value="shanghai"></el-option>
                <el-option label="银行账号2" value="beijing"></el-option>
              </el-select>
            </el-form-item>
            <el-form-item label="所属银行" style="margin-left: 30px">
              <el-select v-model="formInline.region" placeholder="银行账号">
                <el-option label="银行账号1" value="shanghai"></el-option>
                <el-option label="银行账号2" value="beijing"></el-option>
              </el-select>
            </el-form-item>
            </div>
            <div style="width: 80%">
              <el-form-item label="币种" style="margin-left: -40px">
                <el-select v-model="formInline.region" placeholder="银行账号">
                  <el-option label="银行账号1" value="shanghai"></el-option>
                  <el-option label="银行账号2" value="beijing"></el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="创建模板" style="margin-left: 30px">
                <el-select v-model="formInline.region" placeholder="银行账号">
                  <el-option label="银行账号1" value="shanghai"></el-option>
                  <el-option label="银行账号2" value="beijing"></el-option>
                </el-select>
              </el-form-item>
            </div>
            <div style="width: 80%">
              <el-form-item label="姓名" style="margin-left: -40px">
                <el-select v-model="formInline.region" placeholder="银行账号" >
                  <el-option label="银行账号1" value="shanghai"></el-option>
                  <el-option label="银行账号2" value="beijing"></el-option>
                </el-select>
              </el-form-item>
              <el-form-item style="margin-left: 200px">
                <el-button type="primary" @click="getmydata ()">确定</el-button>
                <el-button @click="resetForm('ruleForm')">取消</el-button>
              </el-form-item>
            </div>
          </div>
        </el-form>
      </div>
    </div>

  </div>

</template>
<style>
  .form-items{
    width: 95%;
    border: 1px solid #18A5C0;
    margin-left:5%;
  }
  .form-items-title{
    background: #0C1832;
    color: #18A5C0 ;
    width: 100px;
    height: 36px;
    line-height: 36px;
    margin-left: 50px;
    margin-top: -20px;
  }
  .ui-viewsCon{
    margin-top: 20px;
  }
  .ui-viewsConright{
    width: 50%;
    float: right;
  }
  .uploadFile{
    width: 200px;
  }
  .selectCon input{
    height: 23px !important;
    line-height: 23px !important;
    background: none !important;
    outline: none !important;
  }
  .selectCon .el-input__icon {
    margin-top: 8px !important;
  }
  .form-items .el-upload-list{
 /*  display: none!important;*/
  }
</style>
<script>
import api from '../http/api.js'
export default {
  name: 'importdile',
  data () {
    return {
      selectOpction:[],
      selectItem:'',
      tableData3: [{
        date: '2016-05-03',
        name: '王小虎',
        province: '上海',
        city: '普陀区',
        address: '上海市普陀区金沙江路 1518 弄',
        zip: 200333
      }, {
        date: '2016-05-02',
        name: '王小虎',
        province: '上海',
        city: '普陀区',
        address: '上海市普陀区金沙江路 1518 弄',
        zip: 200333
      }, {
        date: '2016-05-04',
        name: '王小虎',
        province: '上海',
        city: '普陀区',
        address: '上海市普陀区金沙江路 1518 弄',
        zip: 200333
      }, {
        date: '2016-05-01',
        name: '王小虎',
        province: '上海',
        city: '普陀区',
        address: '上海市普陀区金沙江路 1518 弄',
        zip: 200333
      }, {
        date: '2016-05-08',
        name: '王小虎',
        province: '上海',
        city: '普陀区',
        address: '上海市普陀区金沙江路 1518 弄',
        zip: 200333
      }, {
        date: '2016-05-06',
        name: '王小虎',
        province: '上海',
        city: '普陀区',
        address: '上海市普陀区金沙江路 1518 弄',
        zip: 200333
      }, {
        date: '2016-05-07',
        name: '王小虎',
        province: '上海',
        city: '普陀区',
        address: '上海市普陀区金沙江路 1518 弄',
        zip: 200333
      }],
      tableData: [{
        date: '01',
        name: '交易时间',
        address: '字符'
      },  {
        date: '02',
        name: '收入',
        address: '字符'
      }, {
        date: '03',
        name: '支出',
        address: '字符'
      }, {
        date: '04',
        name: '金额',
        address: '字符'
      },
      {
        date: '05',
        name: '交易渠道方式',
        address: '字符'
      }, {
        date: '06',
        name: '对方卡号',
        address: '字符'
      }, {
        date: '07',
        name: '对方账户名',
        address: '字符'
      },
      {
        date: '08',
        name: '对方开户行',
        address: '字符'
      },
      {
        date: '09',
        name: '摘要',
        address: '字符'
      }],
      formInline: {
        user: '',
        region: ''
      },
      ruleForm: {
        name: '',
        region: '',
        date1: '',
        date2: '',
        delivery: false,
        type: [],
        resource: '',
        desc: ''
      },
      rules: {
        name: [
          { required: true, message: '上传文件', trigger: 'change' }
        /*  { min: 3, max: 5, message: '长度在 3 到 5 个字符', trigger: 'blur' }*/
        ],
        region: [
          { required: true, message: '请选择活动区域', trigger: 'change' }
        ]
      },
      fileList: [
        {
          name: 'food.jpeg',
          url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'
        },
        {
          name: 'food2.jpeg', 
          url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'
         }
        ],
      formInline: {
        user: '',
        region: ''
      }
    }
  },
  methods: {
    handleRemove(file){
      console.log(file)
    },
    deleteRow (index, rows) {
      console.log(index)
    },
    handlePreview (file) {
      console.log(file)
    },
    handleExceed (files, fileList) {
      this.$message.warning(`当前限制选择 3 个文件，本次选择了 ${files.length} 个文件，共选择了 ${files.length + fileList.length} 个文件`);
    },
    beforeRemove (file, fileList) {
      return this.$confirm(`确定移除 ${ file.name }？`);
    },
    //获取下拉框字段
    getSelect () {
      for(var i = 0; i <21;i++) {
        this.selectOpction.push('字段'+i)
      }
      console.log(this.selectOpction)
      },
    handleAvatarSuccess(res, file){
      this.ruleForm.name = res
        console.log(res)
    },
    //点击下拉框的值
    handleClick(row) {
      console.log(row);
    },
    getmydata () {
      let obj = {
        params: {
        }
      }
      window.$http.post(api.home.first,obj).then((json) => {
        console.log(json)
      }).catch((err) => {
        console.log(err)
      })
    }
    },
  created () {

  },
  mounted () {
      this.getSelect()
  },
  activated () {

  },
  destroyed () { //在这两个函数里面释放内存。每次结束的时候去掉所有的全局变量指向为null

  },
  deactivated () { //在这两个函数里面释放内存

  }
}
</script>
