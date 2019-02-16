<template>
<div class="top-table">
  <el-form :inline="true" :model="formInline" class="demo-form-inline">
  <el-form-item label="模板名称">
    <el-input v-model="formInline.user" placeholder="模板名称"></el-input>
  </el-form-item>
 <el-form-item label="所属银行">
    <el-input v-model="formInline.bank" placeholder="所属银行"></el-input>
  </el-form-item>
  <el-form-item label="创建人">
    <el-input v-model="formInline.creatperson" placeholder="创建人"></el-input>
  </el-form-item>
   <el-form-item label="活动时间">
    <el-col :span="11">
      <el-date-picker type="date" placeholder="选择日期" v-model="formInline.date1" style="width: 100%;"></el-date-picker>
    </el-col>
    <el-col class="line" :span="2">-</el-col>
    <el-col :span="11">
      <el-date-picker type="date" placeholder="选择日期" v-model="formInline.date2" style="width: 100%;"></el-date-picker>
    </el-col>

  </el-form-item>
  <el-form-item>
    <el-button type="primary" @click="onSubmit">查询</el-button>
  </el-form-item>
</el-form>
<!-- 表格开始 -->
 <el-table
    :data="tableData"
    border
    style="width: 100%">
    <el-table-column
      fixed
      prop="date"
      label="模板名称"
      >
    </el-table-column>
    <el-table-column
      prop="name"
      label="模板所属银行"
     >
    </el-table-column>
    <el-table-column
      prop="province"
      label="创建人"
     >
    </el-table-column>
    <el-table-column
      prop="city"
      label="创建日期"
      >
    </el-table-column> 
    <el-table-column
      fixed="right"
      label="操作"
      width="100">
      <template slot-scope="scope">
        <el-button @click="handleClick(scope.row)" type="text" size="small">查看</el-button>
        <el-button type="text" size="small">编辑</el-button>
      </template>
    </el-table-column>
  </el-table>
</div>
</template>
<script>
import api from '../http/api.js'
import utils from '../http/utils.js'

  export default {
    name: 'templates',
    data () {
      return {
         formInline: {
          user: '',
          region: ''
        },
         tableData: [{
          date: '2016-05-03',
          name: '王小虎',
          province: '上海',
          city: '普陀区',
          
        }, {
          date: '2016-05-02',
          name: '王小虎',
          province: '上海',
          city: '普陀区',
         
        }, {
          date: '2016-05-04',
          name: '王小虎',
          province: '上海',
          city: '普陀区',
          
        }, {
          date: '2016-05-01',
          name: '王小虎',
          province: '上海',
          city: '普陀区',
        }]
      }
    },
    methods: {
      onSubmit() {
        console.log('submit!');
      },
      handleClick(row) {
        console.log(row);
      },
      getmydata(){
        let obj = {
            id:'12',
            name:'999'
        }
         var formdata = this.utils.encrypt(JSON.stringify(obj));
         var data = {
          params:{

            sign:formdata
          }
         }
        
         window.$http.post(api.first.getMember,data,{headers:{
          'sign':formdata
         }}).then((response)=>{

         },(response)=>{

         })
      }
    },
    mounted(){
      this.getmydata();
    }
  }
</script>
