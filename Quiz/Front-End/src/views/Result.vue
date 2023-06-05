<template>
  <div class="ma-auto">
    <h1 class="text-center">Thanks, {{ name }}!</h1>
    <p class="text-center mt-5">You responded correctly to {{ correctAnswers }} out of {{ allQuestions }} questions.</p>
  </div>
</template>
<script>
import axios from "axios";
import router from "@/router";

export default {
  data: () => ({
    name: '',
    correctAnswers: 3,
    allQuestions: 4,
  }),
  mounted() {
    this.loadResults();
  },
  methods: {
    async loadResults() {
      try {
        const response = await axios.post('http://localhost:8000/results', {
          quizId: this.$route.params.quizId,
          userId: this.$route.params.userId,
        });

        this.name = response.data.user.name;
        this.correctAnswers = response.data.results.correct_answers;
        this.allQuestions = response.data.results.total_answers
      } catch (error) {
        console.error('Error fetching quiz:', error);
        await router.push('/');
      }
    }
  }
}

</script>
<style scoped>

</style>
