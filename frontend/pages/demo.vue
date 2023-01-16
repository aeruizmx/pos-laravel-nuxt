<template>
  <AdminTemplate>
    <div slot="body">
      <h3>Demo</h3>
    </div>
  </AdminTemplate>
</template>

<script>
import AdminTemplate from '~/components/AdminTemplate.vue';

export default {
    name: "DemoPage",
    head() {
        return {
            title: "Demo",
        };
        ;
    },
    components: { AdminTemplate }
};
</script>
