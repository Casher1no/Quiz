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
        item-value="question"
        label="Choose an item"
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
  data: () => ({
    valid: true,
    name: '',
    sessionName: '',
    nameRules: [
      v => !!v || 'Name is required',
    ],
    select: null,
    questions: [
      {id:1, question: 'Item 1'},
      {id:2, question: 'Item 2'},
      {id:3, question: 'Item 3'},
      {id:4, question: 'Item 4'},
    ],
  }),
  computed: {
    questionItems() {
      return this.questions.map(item => item.question);
    },
  },
  methods: {
    async validate() {
      const {valid} = await this.$refs.form.validate()
      const id = this.getIdByQuestion(this.select);

      if (valid) {
        this.axios.post('http://localhost:8000/api', {
          username: this.name,
        }).then(function (response) {
          router.push(`/quiz/${id}`)
        })
      }
    },
    reset() {
      this.$refs.form.reset()
    },
    resetValidation() {
      this.$refs.form.resetValidation()
    },
    getIdByQuestion(question) {
      const foundQuestion = this.questions.find(q => q.question === question);
      return foundQuestion ? foundQuestion.id : null;
    }
  },
}
</script>

<style scoped>
</style>
