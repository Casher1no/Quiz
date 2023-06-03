// Composables
import { createRouter, createWebHistory } from 'vue-router'
import Index from "@/views/Index.vue";
import Quiz from "@/views/Quiz.vue";

const routes = [
  {
    path: '/',
    component: Index,
  },
  {
    path:'/quiz',
    component: Quiz,
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
