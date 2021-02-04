<template>
  <div class="w-full form-wrapper" :class="{ show: show }">
    <button
      type="button"
      class="show-form-button w-full p-4 bg-white text-left text-base font-semibold text-black hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-900 shadow-md overflow-hidden rounded-lg"
      :class="{ 'opacity-25': form.processing }"
      @click="toggleForm"
    >
      + Add a new list
    </button>
    <form
      @submit.prevent="submit"
      class="bg-white shadow-md overflow-hidden rounded-lg transition ease-in-out duration-150 px-6 py-4"
    >
      <jet-input
        id="title"
        type="text"
        aria-placeholder="title"
        class="w-full mb-2"
        v-model="form.title"
        placeholder="Add a new list"
        required
        autofocus
      />
      <jet-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Create
      </jet-button>
      <jet-button
        :class="{ 'opacity-25': form.processing }"
        type="button"
        :disabled="form.processing"
        @click.native="hideForm"
      >
        X
      </jet-button>
    </form>
  </div>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
  components: {
    JetActionMessage,
    JetButton,
    JetInput,
    JetInputError,
    JetLabel,
  },
  props: ["id"],
  data() {
    return {
      show: false,
      form: this.$inertia.form({ title: "" }, { resetOnSuccess: true }),
    };
  },
  methods: {
    toggleForm() {
      this.show = !this.show;
    },
    hideForm() {
      this.show = false;
    },
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          boardId: this.id,
        }))
        .post(`/list`, {
          onFinish: () => {
            this.form.reset();
            this.hideForm();
          },
        });
    },
  },
};
</script> 

<style lang="css">
.form-wrapper form {
  display: none;
}

.form-wrapper.show form {
  display: block;
}

.form-wrapper.show .show-form-button {
  display: none;
}
</style>