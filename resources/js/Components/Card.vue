<template>
  <div class="my-2 w-full focus:outline-none focus:border-gray-900">
    <template v-if="isEditing">
      <div class="relative">
        <form @submit.prevent="updateCard" class="flex flex-row items-center">
          <input
            type="text"
            name="title"
            id="title"
            v-model="newTitle"
            class="flex-1 z-50"
          />
        </form>
        <div class="absolute z-50 px-4 flex flex-col gap-4 top-0 left-full">
          <jet-button>Move</jet-button>
          <jet-button>Delete</jet-button>
          <jet-button @click.native="cancelEditing">Cancel</jet-button>
        </div>
      </div>
      <div
        class="fixed bg-opacity-70 bg-black w-full h-full inset-0"
        @click="cancelEditing"
      />
    </template>
    <template v-else>
      <div class="flex flex-row items-center">
        <div class="flex-1 hover:bg-gray-200 p-4">
          {{ data.title }}
        </div>
        <div
          class="cursor-pointer hover:bg-gray-200 p-4"
          @click="enableEditing"
        >
          <pencil-icon />
        </div>
      </div>
    </template>
  </div>
</template>

<script>
import { PencilIcon, XIcon } from "@vue-hero-icons/outline";
import JetButton from "@/Jetstream/Button";

export default {
  components: {
    JetButton,
    PencilIcon,
    XIcon,
  },
  data() {
    return {
      isEditing: false,
      newTitle: this.data.title,
    };
  },
  props: {
    data: Object,
  },
  methods: {
    enableEditing() {
      this.isEditing = true;
    },
    cancelEditing() {
      this.isEditing = false;
      this.newTitle = this.data.title;
    },
    updateCard() {},
    onClickOutside(event) {
      console.log(this.$refs);
    },
  },
};
</script>