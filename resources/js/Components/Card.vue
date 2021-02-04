<template>
  <div
    class="my-2 px-7 show-form-button w-full p-4 hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-900"
  >
    {{ data.title }}
  </div>
</template>

<script>
export default {
  components: {},
  props: ["data"],
};
</script>