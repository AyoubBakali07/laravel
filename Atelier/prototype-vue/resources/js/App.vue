<template>
<ExampleComponent/>
<Products/>
</template>
<script>
import ExampleComponent from './components/ExampleComponent.vue';
import Products from './components/ProductComponenets.vue';
export default {
    components: {
        ExampleComponent,
        Products
    }
};

</script>