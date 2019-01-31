import Vue from 'vue'
import Router from 'vue-router'

//导入话单首页
import Importdile from '@/components/Importdile'
//账单分析
import Analysis from '@/components/Analysis'
//账号管理
import Management from '@/components/Management'
//模板管理
import Templates from '@/components/Templates'
import Login from '@/components/Login'

Vue.use(Router)
export default new Router({
  routes: [
    {
      path: '*',
      redirect: '/Importdile'
    },
    {
      path: '/Importdile',
      name: 'Importdile',
      component: Importdile,
      meta:{
        token:true
      }
    },
    {
      path: '/analysis',
      name: 'Analysis',
      component: Analysis,
       meta:{
        token:true
      }
    },
    {
      path: '/management',
      name: 'Management',
      component:Management,
       meta:{
        token:true
      }
    },
    {
      path: '/templates',
      name: 'Templates',
      component:Templates,
       meta:{
        token:true
      }
    },
    {
      path:'/login',
      name:'Login',
      component:Login,
       meta:{
        token:false
      }
    }
  ]
})
