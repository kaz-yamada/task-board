<template>
  <column>
    <div class="w-full overflow-hidden sm:rounded-lg px-6 py-4">
      <div v-if="!boards">Create a board to get started</div>
      <div
        class="flex justify-start cursor-pointer hover:text-blue-400 hover:bg-blue-100 rounded-md py-2 my-2"
        v-for="board in boards"
        :key="board.id"
      >
        <inertia-link
          :href="`board/${board.id}`"
          class="flex-grow font-medium p-2"
        >
          {{ board.title }}
        </inertia-link>
      </div>
    </div>
  </column>
</template>

<script>
import Column from "@/Components/Column";

export default {
  components: { Column },
  props: ["boards"],
};
</script>