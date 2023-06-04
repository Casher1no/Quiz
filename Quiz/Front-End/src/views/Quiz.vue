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
            {{ testActive() }}
          </v-btn>
        </div>
        <v-progress-linear
          :model-value="progress"
          :height="12"
          class="mt-16"
        >
        </v-progress-linear>

      </v-form>
    </div>
  </v-container>
</template>

<script>
import axios from "axios";
import router from "@/router";

export default {
  data: () => ({
    progress: 0,
    userId: null,
    quiz: null,
    question: '',
    questionIndex: 0,
    questionCount: 0,
    options: [],
    selectedItems: [],
    answers: [],
  }),
  mounted() {
    this.userId = this.$route.params.id;
    this.getQuiz();

  },
  methods: {
    async getQuiz() {
      try {
        const response = await axios.post('http://localhost:8000/quiz', {
          quizId: this.$route.params.id,
        });

        this.quiz = response.data.questions;
        this.questionCount = this.quiz.length;
        this.question = this.quiz[this.questionIndex].question
        this.options = this.quiz[this.questionIndex].answers;
      } catch (error) {
        console.error('Error fetching quiz:', error);
        await router.push('/');
      }
    },
    testActive(){
       if(this.questionIndex !== this.questionCount){
         return "NEXT";
       }else{
         return "Finish";
       }

    },
    nextQuestion() {
      if (!this.selectedItems.length) return;
      this.questionIndex++;

      if(this.questionIndex + 1 > this.questionCount){
        console.log(this.answers);
        router.push('/result')
      }
      this.answers.push(this.selectedItems);

      console.log(this.questionIndex)
      console.log(this.questionCount)

      this.progress = (this.questionIndex) / this.questionCount * 100;

      this.question = this.quiz[this.questionIndex].question;
      this.options = this.quiz[this.questionIndex].answers;



      this.selectedItems = [];

    },
    getIdByAnswer() {
      return this.quiz[this.questionIndex].answers
        .filter(obj => this.selectedItems.includes(obj.answer))
        .map(obj => obj.id);
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
