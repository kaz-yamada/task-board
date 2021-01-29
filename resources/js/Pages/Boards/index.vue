<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Boards</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <create-board />
        <board-list :boards="data" />
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
  props: ["data"],
};
</script>
