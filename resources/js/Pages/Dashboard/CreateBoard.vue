<template>
  <div class="w-full mb-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
    <form @submit.prevent="submit">
      <jet-label for="title" value="Create a new board" class="mt-4" />
      <div class="flex flex-col sm:flex-row">
        <jet-input
          id="title"
          type="text"
          aria-placeholder="title"
          class="mt-1 block w-full"
          v-model="form.title"
          required
          autofocus
        />
        <jet-button
          class="sm:ml-4 sm:mt-1 mt-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Create
        </jet-button>
      </div>
      <jet-action-message :on="form.recentlySuccessful" class="h-4 mt-4">
        Board created.
      </jet-action-message>
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
  data() {
    return {
      form: this.$inertia.form({ title: "" }, { resetOnSuccess: true }),
    };
  },
  methods: {
    submit() {
      this.form.post("board", {
        onFinish: () => {
          this.form.reset();
          this.$emit("createdboard");
        },
      });
    },
  },
};
</script>