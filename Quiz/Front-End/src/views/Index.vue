<template>

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
        :items="items"
        :rules="[v => !!v || 'Item is required']"
        label="Choose test"
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
export default {
  data: () => ({
    valid: true,
    name: '',
    nameRules: [
      v => !!v || 'Name is required',
    ],
    select: null,
    items: [
      'Item 1',
      'Item 2',
      'Item 3',
      'Item 4',
    ],
  }),

  methods: {
    async validate() {
      const {valid} = await this.$refs.form.validate()

      if (valid) alert('Form is valid')
    },
    reset() {
      this.$refs.form.reset()
    },
    resetValidation() {
      this.$refs.form.resetValidation()
    },
  },
}
</script>

<style scoped>
</style>
