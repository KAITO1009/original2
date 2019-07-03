import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import Intro from './components/pages/Introduction.vue'
import Trainning from './components/pages/Trainning.vue'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/trainning',
    component: Intro
  },
  {
    path: '/trainning/1',
    component: Trainning
  }
]

// VueRouterインスタンスを作成する
const router = new VueRouter({
  routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router