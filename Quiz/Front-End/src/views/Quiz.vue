<template>
  <v-container class="ma-auto">
    <div class="container ma-auto">
      <h1 class="text-center mb-10">{{ question }}</h1>
      <v-form ref="form">

        <v-row no-gutters>
          <v-col
            v-for="(option, index) in options"
            :key="index"
            :cols="12"
            sm="6"
            class="d-flex justify-center"
          >
            <v-checkbox
              class="ma-2 checkbox text-center"
              v-model="selectedItems"
              :center-affix="true"
              :label="option.answer"
              :value="option.answer"
            ></v-checkbox>
          </v-col>
        </v-row>
        <div style="width: 200px; margin: auto">
          <v-btn
            color="black"
            class="mt-10"
            block
            @click="nextQuestion"
          >
            Next
          </v-btn>
        </div>
      </v-form>
    </div>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    quiz: null,
    question: '',
    questionIndex: 0,
    questionCount: 0,
    options: [],
    selectedItems: [],
  }),
  mounted() {
    this.getQuiz();
  },
  methods: {
    async getQuiz() {
      try {
        const response = await axios.post('http://localhost:8000/quiz', {
          quizId: this.$route.params.id,
        });
        this.quiz = response.data.questions;
        this.question = this.quiz[this.questionIndex].question
        this.options = this.quiz[this.questionIndex].answers;
      } catch (error) {
        console.error('Error fetching quiz:', error);
      }
    },
    nextQuestion() {
      this.questionIndex++;

      this.question = this.quiz[this.questionIndex].question;
      this.options = this.quiz[this.questionIndex].answers;

      // Send to Database
      // ---
      this.selectedItems = [];
    }
  }
}
</script>

<style scoped>
.container {
  max-width: 1000px;
}

.checkbox {
  border: 1px solid black;
  border-radius: 5px;
  max-width: 400px;
}
</style>
