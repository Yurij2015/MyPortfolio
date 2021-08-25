import {createRouter, createWebHistory, RouteRecordRaw} from 'vue-router'
import Dashboard from '@/pages/Dashboard.vue'
import Projects from '@/pages/projects/Projects.vue'
import ProjectCreate from '@/pages/projects/ProjectCreate.vue'


const routes: Array<RouteRecordRaw> = [
    {path: '', component: Dashboard},
    {path: '/projects', component: Projects},
    {path: '/project-create', component: ProjectCreate},
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
