// Composables
import { createRouter, createWebHistory } from 'vue-router'
import Index from "@/views/Index.vue";
import Quiz from "@/views/Quiz.vue";
import Result from "@/views/Result.vue";

const routes = [
  {
    path: '/',
    component: Index,
  },
  {
    path:'/quiz/:id',
    component: Quiz,
  },
  {
    path:'/result',
    component: Result,
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
