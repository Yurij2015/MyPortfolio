import {createRouter, createWebHistory, RouteRecordRaw} from 'vue-router'
import Dashboard from '@/pages/Dashboard.vue'
import Projects from '@/pages/Projects.vue'

const routes: Array<RouteRecordRaw> = [
    {path: '', component: Dashboard},
    {path: '/projects', component: Projects},

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
