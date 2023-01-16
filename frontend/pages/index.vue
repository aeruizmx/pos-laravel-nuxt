<template>
  <AdminTemplate />
</template>

<script>
import AdminTemplate from '~/components/AdminTemplate.vue';

export default {
    name: "IndexPage",
    head() {
        return {
            title: "Index",
        };
        ;
    },
    components: { AdminTemplate }
};
</script>
