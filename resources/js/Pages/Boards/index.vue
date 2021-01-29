<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Boards</h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <create-board v-on:createdboard="getBoards" />
        <div v-if="boards.length">
          <board-list :boards="boards" />
        </div>
        <div v-else>Create a board to get started</div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import BoardList from "./BoardList";
import CreateBoard from "./CreateBoard";

export default {
  components: {
    AppLayout,
    BoardList,
    CreateBoard,
  },
  data: function () {
    return {
      boards: [],
    };
  },
  methods: {
    getBoards() {
      axios
        .get("/boards/all")
        .then((res) => {
          this.boards = res.data;
        })
        .catch((err) => console.error(err));
    },
  },
  created() {
    this.getBoards();
  },
};
</script>
