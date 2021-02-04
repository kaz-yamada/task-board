<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Boards > {{ data.board.title }}
      </h2>
    </template>
    <div class="py-12 flex-grow flex flex-col overflow-auto" v-if="data">
      <div class="max-w-7xl mx-auto sm:px-6 px-8 flex flex-row w-full h-full">
        <div
          v-for="list in data.lists"
          class="list-wrapper mr-6"
          :key="list.id"
        >
          <card-list :boardId="data.board.id" :list="list" />
        </div>
        <div class="list-wrapper mr-6">
          <create-card-list :id="data.board.id" />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Column from "@/Components/Column";
import CreateCardList from "@/Components/Forms/CreateCardList";
import CardList from "@/Components/Lists/CardList";

export default {
  components: {
    AppLayout,
    CardList,
    Column,
    CreateCardList,
  },
  props: ["data"],
};
</script>

<style>
.list-wrapper {
  flex: 0 0 auto;
  width: 300px;
}
</style>
 