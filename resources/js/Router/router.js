import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Login from '../components/Login/Login'
import Logout from '../components/Login/Logout'
import Signup from '../components/Login/signup'
import Forum from '../components/forum/forum'
import Read from '../components/forum/read'
import Create from '../components/forum/create'

const routes = [
  { path: '/login', component: Login },
  { path: '/logout', component: Logout },
  { path: '/signup', component: Signup },
  { path: '/forum', component: Forum, name:'forum' },
  { path: '/question/:slug', component: Read, name:'read' },
  { path: '/ask', component: Create, name:'create' },
]

const router = new VueRouter({
  routes, // short for `routes: routes`,
  hasgbang : false,
  mode : 'history'
})

export default router