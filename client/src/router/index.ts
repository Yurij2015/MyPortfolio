import {createRouter, createWebHistory, RouteRecordRaw} from 'vue-router'
import Dashboard from '@/pages/Dashboard.vue'
import Projects from '@/pages/projects/Projects.vue'
import ProjectCreate from '@/pages/projects/ProjectCreate.vue'
import ProjectEdit from '@/pages/projects/ProjectEdit.vue'
import ProjectView from '@/pages/projects/ProjectView.vue'


const routes: Array<RouteRecordRaw> = [
    {path: '', component: Dashboard},
    {path: '/projects', component: Projects},
    {path: '/project-create', component: ProjectCreate},
    {path: '/project-edit/:id', component: ProjectEdit},
    {path: '/project-view/:id', component: ProjectView},

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
