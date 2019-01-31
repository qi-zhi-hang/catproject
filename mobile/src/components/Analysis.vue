<template>
<div>
<el-row>
  <el-button type="success" plain>账单合并</el-button>
  <el-button type="info" plain>多账单关联分析</el-button>
  <el-button type="warning" plain>单账单分析</el-button>
  <el-button type="danger" plain @click="handleDownload()">导出</el-button>
</el-row>
  <el-table
    :data="tableData"
    stripe
    style="width: 100%">
     <el-table-column
      type="selection"
      width="55">
    </el-table-column>
    <el-table-column
      prop="date"
      label="序号">
    </el-table-column>
    <el-table-column
      prop="name"
      label="账户卡号">
    </el-table-column>
    <el-table-column
      prop="address"
      label="账户姓名">
    </el-table-column>
     <el-table-column
      prop="address"
      label="记录数">
    </el-table-column>
     <el-table-column
      prop="address"
      label="交易时间">
    </el-table-column>
     <el-table-column
      prop="address"
      label="交易截止时间">
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
export default {
  name: 'analysis',
  data () {
    return {
    	 tableData: [{
          date: '2016-05-02',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-04',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1517 弄'
        }, {
          date: '2016-05-01',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1519 弄'
        }, {
          date: '2016-05-03',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1516 弄'
        }],
        //list:'',
        list:[
        	{
        		'id':'1',
        		'withNum':'王小虎',
        		'userId':'上海市普陀区金沙江路 1516 弄'
        	}
        ]
    }
  },
  created() {
    
  },
  methods: {
  	handleClick(key){
  		console.log(key)
  	},
  	handleDownload(){
  		this.$confirm('此操作将导出excel文件, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    this.excelData = this.dataList //你要导出的数据list。
                    this.export2Excel()
                }).catch(() => {
                
                });
            },
            export2Excel() {
                import('../vendor/Export2Excel').then(excel => {
		        const tHeader = ['Id', 'Title', 'Author']
		        const filterVal = ['id', 'withNum', 'userId']
		        const list = this.list
		        console.log(list)
		        const data = this.formatJson(filterVal, list)

		        console.log(data);
		        excel.export_json_to_excel({
		          header: tHeader,
		          data,
		          filename: this.filename,
		          autoWidth: this.autoWidth
		        })
		        this.downloadLoading = false
		      })
            },
            formatJson(filterVal, jsonData) {
		      return jsonData.map(v => filterVal.map(j => {
		        if (j === 'timestamp') {
		          return parseTime(v[j])
		        } else {
		          return v[j]
		        }
		      }))
    }
  	 
  }
}
</script>
