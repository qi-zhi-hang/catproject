import axios from 'axios'
import Qs from 'qs'


// 超时时间
axios.defaults.timeout = 1000000

//axios.defaults.baseURL = 'http://ssrs.zjmining.org.cn/lshk_test/'
axios.defaults.baseURL = 'http://tplinux.pabupa.wang/'
//axios.defaults.baseURL = 'http://20.59.20.180:8700/'
//axios.defaults.baseURL = 'http://192.168.0.177:8088/'
//axios.defaults.baseURL = 'http://192.168.0.108:8088/'
//axios.defaults.baseURL = 'http://192.168.0.104:8088/'


//axios.defaults.baseURL = 'http://ssrs.zjmining.org.cn'/**/
// 请求时的拦截
axios.interceptors.request.use(function (config) {

config.noHttpLoading = config.data.noHttpLoading;  //给响应后使用
  if(!config.data.noHttpLoading) {
  }
  if (config.method === 'post') {
      var obj = Object.assign({},config);
      //return;
    config.data = Qs.stringify(config.data.params)
  } else if (config.method === 'get') {
      console.log("get")
  }
  
  //console.log(config)
  return config
}, function (error) {
  // 当请求异常时做一些处理
  console.log('请求异常')
  return Promise.reject(error)
})

// 响应时拦截
axios.interceptors.response.use(function (response) {
    if(!response.config.noHttpLoading) {
    }
  return response.data
}, function (error) {
  // console.log(error)
  return Promise.reject(error)
})

export default axios
