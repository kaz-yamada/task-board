<template>
  <div>
    <div
      class="form-wrapper w-72 bg-white shadow-md overflow-hidden rounded-lg transition ease-in-out duration-150"
      :class="{ show: show }"
    >
      <button
        type="button"
        class="show-form-button w-full px-6 py-4 bg-white border text-left text-sm border-transparent font-semibold text-black tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-900 shadow-md overflow-hidden rounded-lg"
        :class="{ 'opacity-25': form.processing }"
        @click="toggleForm"
      >
        + Add a new list
      </button>
      <form @submit.prevent="submit" class="px-6 py-4">
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
      this.form.post(`/board/${this.id}`, {
        onFinish: () => {
          this.form.reset();
          this.$emit("createdlist");
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