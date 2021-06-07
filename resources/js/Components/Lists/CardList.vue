<template>
  <div class="w-full">
    <column class="bg-white">
      <div class="p-4 font-bold flex flex-row items-center">
        <div class="flex-1">
          {{ list.title }}
        </div>
        <dots-vertical-icon />
      </div>
      <div class="">
        <div class="">
          <template v-for="card in list.cards">
            <card :key="card.id" :data="card" />
          </template>
        </div>
        <create-card :boardId="boardId" :listId="list.id" />
      </div>
    </column>
  </div>
</template>

<script>
import { DotsVerticalIcon } from "@vue-hero-icons/outline";
import Column from "@/Components/Column";
import CreateCard from "@/Components/Forms/CreateCard";
import Card from "../Card";

export default {
  components: {
    Card,
    Column,
    CreateCard,
    DotsVerticalIcon,
  },
  props: {
    boardId: Number,
    list: Object,
  },
};
</script>