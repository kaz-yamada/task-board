<template>
  <div
    class="w-full mb-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
  >
    <div
      class="flex justify-start cursor-pointer hover:text-blue-400 hover:bg-blue-100 rounded-md py-2 my-2"
      v-for="board in boards"
      :key="board.id"
    >
      <div class="flex-grow font-medium px-2">
        {{ board.name }}
      </div>
    </div>
  </div>
</template>

<script>
import CreateBoard from "./CreateBoard";

export default {
  components: { CreateBoard },
  props: ["boards"],
};
</script>