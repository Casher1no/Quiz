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
    path:'/quiz/:userId/:id',
    name: 'quiz',
    component: Quiz,
  },
  {
    path:'/result/:userId/:quizId',
    component: Result,
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
