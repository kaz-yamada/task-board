<template>
  <div class="flex flex-row">
    <div v-for="item in list" :key="item.id">
      <div class="w-72 mr-6">
        <column>List</column>
      </div>
    </div>
  </div>
</template>

<script>
import Column from "@/Components/Column";
export default {
  components: {
    Column,
  },
  props: ["list"],
};
</script>