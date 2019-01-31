<template>
  <div class="top-table">
  <el-table
    :data="tableData3"
    style="width: 100%">
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
        </el-table-column>
      </el-table>
       <el-upload
          class="upload-demo"
          action="http://tplinux.pabupa.wang/index/index/upload"
          :on-success="handleAvatarSuccess"
          :on-preview="handlePreview"
          :on-remove="handleRemove"
          :before-remove="beforeRemove"
          multiple
          :limit="3"
          :on-exceed="handleExceed"
          :file-list="fileList">
          <el-button size="small" type="primary">点击上传</el-button>
          <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
        </el-upload>
        <el-select v-model="value4" clearable placeholder="请选择">
          <el-option
            v-for="item in options"
            :key="item.value"
            :label="item.label"
            :value="item.value">
          </el-option>
        </el-select>
        <el-input
  placeholder="请输入内容"
  v-model="input10"
  clearable>
</el-input>
 
  </div>
</template>
<script>
export default {
  name: 'importdile',
  data () {
    return {
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
        date: '2016-05-04',
        name: '交易时间',
        address: '字符',
        duiyingziduan:'我爱丫丫'
      }, {
        date: '2016-05-04',
        name: '王小虎',
        address: '上海市普陀区金沙江路1517弄',
        duiyingziduan:'我爱丫丫'
      }, {
        date: '2016-05-04',
        name: '收入',
        address: '字符'
      }, {
        date: '2016-05-04',
        name: '支出',
        address: '字符'
      }, {
        date: '2016-05-04',
        name: '金额',
        address: '字符'
      },
      {
        date: '2016-05-04',
        name: '交易渠道方式',
        address: '字符'
      }, {
        date: '2016-05-04',
        name: '对方卡号',
        address: '字符'
      }, {
        date: '2016-05-04',
        name: '对方账户名',
        address: '字符'
      },
      {
        date: '2016-05-04',
        name: '对方开户行',
        address: '字符'
      },
      {
        date: '2016-05-04',
        name: '摘要',
        address: '字符'
      }],
       fileList: [
         ],
          options: [{
          value: '选项1',
          label: '黄金糕'
        }, {
          value: '选项2',
          label: '双皮奶'
        }, {
          value: '选项3',
          label: '蚵仔煎'
        }, {
          value: '选项4',
          label: '龙须面'
        }, {
          value: '选项5',
          label: '北京烤鸭'
        }],
        value4: '',
        input10:'',
        imageUrl: '',
        imgthing: {}
    }
  },
  props: ['imgN', 'nameN'],
  methods: {

    handleRemove(file, fileList) {
        console.log(file, fileList);
      },
      handlePreview(file) {
        console.log(file);
      },
      handleExceed(files, fileList) {
        this.$message.warning(`当前限制选择 3 个文件，本次选择了 ${files.length} 个文件，共选择了 ${files.length + fileList.length} 个文件`);
      },
      beforeRemove(file, fileList) {
        return this.$confirm(`确定移除 ${ file.name }？`);
      },
      handleAvatarSuccess(res, file){
        console.log(res)
      }
  }
}
</script>
