<template>
  <h1>{{ sessionName }}</h1>
  <v-sheet width="300" class="ma-auto">
    <h1 class="text-center">Technical task</h1>
    <v-form ref="form">
      <v-text-field
        v-model="name"
        :rules="nameRules"
        label="Enter your name"
        required
      ></v-text-field>

      <v-select
        v-model="select"
        :items="questionItems"
        item-value="name"
        :rules="itemRules"
        label="Choose test"
        return-object
        required
      ></v-select>

      <div class="d-flex flex-column">
        <v-btn
          color="black"
          class="mt-4"
          block
          @click="validate"
        >
          Validate
        </v-btn>
      </div>
    </v-form>
  </v-sheet>
</template>

<script>
import axios from "axios";
import router from "@/router";

export default {
  data() {
    return {
      valid: true,
      name: '',
      sessionName: '',
      nameRules: [
        v => !!v || 'Name is required',
      ],
      itemRules: [
        v => !!v || 'Choose test',
      ],
      select: null,
      questions: [],
    };
  },
  computed: {
    questionItems() {
      return this.questions.map(item => item.name);
    },
  },
  mounted() {
    this.getQuestions();
  },
  methods: {
    async validate() {
      const {valid} = await this.$refs.form.validate();
      const id = this.getIdByQuestion(this.select);

      if (valid && id) {
        axios.post('http://localhost:8000/session', {
          username: this.name,
        }).then(function (response) {
          console.log(response.data)
          router.push(`/quiz/${id}`);
        });
      }
    },
    async getQuestions() {
      try {
        const response = await axios.get('http://localhost:8000/quiz');
        this.questions = response.data.questions;
      } catch (error) {
        console.error('Error fetching questions:', error);
      }
    },
    getIdByQuestion(question) {
      const foundQuestion = this.questions.find(q => q.name === question);
      return foundQuestion ? foundQuestion.id : null;
    },
  },
};
</script>

<style scoped>
</style>
