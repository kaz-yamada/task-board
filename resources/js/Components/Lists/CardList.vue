<template>
  <div class="w-full">
    <column>
      <div class="pt-6">
        <div class="px-7 font-bold">{{ list.title }}</div>
        <div class="my-6">
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
import Column from "@/Components/Column";
import CreateCard from "@/Components/Forms/CreateCard";
import Card from "../Card";

export default {
  components: {
    Card,
    Column,
    CreateCard,
  },
  props: ["boardId", "list"],
};
</script>