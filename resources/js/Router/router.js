import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Login from '../components/Login/Login'

const routes = [
  { path: '/login', component: Login },
  //{ path: '/forum', component: Forum }
]

const router = new VueRouter({
  routes, // short for `routes: routes`,
  hasgbang : false,
  mode : 'history'
})

export default router