import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import Intro from './components/pages/Introduction.vue'
import Trainning from './components/pages/Trainning.vue'
import Meditation from './components/pages/Meditation.vue'
import Exw from './components/pages/Exw.vue'
import End from './components/pages/End.vue'


// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/trainning',
    component: Intro,
    props: true
  },
  {
    path: '/trainning/1',
    component: Trainning
  },
  {
    path: '/trainning/2',
    component: End
  },
  {
    path: '/meditation',
    component: Intro
  },
  {
    path: '/meditation/1',
    component: Meditation
  },
  {
    path: '/meditation/2',
    component: End
  },
  {
    path: '/exw',
    component: Intro
  },
  {
    path: '/exw/1',
    component: Meditation
  },
  {
    path: '/exw/2',
    component: End
  }
]

// VueRouterインスタンスを作成する
const router = new VueRouter({
    mode: 'history',
    routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router