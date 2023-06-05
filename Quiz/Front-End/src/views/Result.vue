<template>
  <div class="ma-auto">
    <h1 class="text-center">Thanks, {{ name }}!</h1>
    <p class="text-center mt-5">You responded correctly to {{ correctAnswers }} out of {{ allQuestions }} questions.</p>
  </div>
</template>
<script>
export default {
  data: () => ({
    name: '',
    correctAnswers: 3,
    allQuestions: 4,
  }),
  mounted() {

  },
  methods:{
    async loadResults()
    {
      
    }
  }
}

</script>
<style scoped>

</style>
