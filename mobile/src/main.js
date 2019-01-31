// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import axios from './http/config.js'//异步函数
import api from './http/api.js'
import utils from './http/utils.js'
import VueResource from 'vue-resource'
//import Blob from './vender/Blob.js'
//import Export2Excel from './vender/Export2Excel.js'
window.$http=Vue.prototype.$http = axios;
Vue.prototype.$api = api;
Vue.prototype.utils = utils;
Vue.config.productionTip = false
Vue.use(ElementUI)
Vue.use(VueResource)
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})

router.beforeEach((to, from, next) => {
    if (to.meta.token) {  // 判断该路由是否需要登录权限
        if (true) {  // 通过vuex state获取当前的token是否存在
            next();
        }else {
            next({
                path: '/login',
                query: {redirect: to.fullPath}  // 将跳转的路由path作为参数，登录成功后跳转到该路由
            })
        }
    }
    else {
        next();
    }
})
