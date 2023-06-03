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
            @click="validate"
          >
            Validate
          </v-btn>
        </div>
      </v-form>
    </div>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    question: 'Question 1',
    options: [
      {id: 1, answer: 'option 1'},
      {id: 2, answer: 'option 2'},
      {id: 3, answer: 'option 3'},
      {id: 4, answer: 'option 4'},
    ],
    selectedItems: [],
  }),
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
