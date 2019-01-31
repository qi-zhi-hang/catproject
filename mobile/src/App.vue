<template>
  <div id="app">
    <el-menu :default-active="this.$router.path" router mode="horizontal">
      <el-menu-item v-for="(item,i) in navList" :key="i" :index="item.name">
        {{ item.navItem }}
      </el-menu-item>
    </el-menu>
    <router-view/>
  </div>
</template>
<script>
export default {
  name: 'App',
  data () {
    return {
      navList:[
        {name:'/Importdile',navItem:'账单导入'},
        {name:'/Analysis',navItem:'账单分析'},
        {name:'/Management',navItem:'账号管理'},
        {name:'/Templates',navItem:'模板管理'}
    ]
    }
  },
  methods:{
  }
}
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
  }
</style>
