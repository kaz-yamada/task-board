<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Boards > {{ data.board.title }}
      </h2>
    </template>
    <div class="py-12" v-if="data">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row">
        <card-list :list="data.list" />
        <create-card-list :id="data.board.id" />
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Column from "@/Components/Column";

import CreateCardList from "./CreateCardList";
import CardList from "./CardList";

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
 