<template>
    <TheHeader></TheHeader>
    <div class="container">
        <router-view></router-view>
    </div>
    <TheFooter></TheFooter>
</template>

<script>
import TheHeader from '../componets/user/TheHeader.vue';
import TheFooter from '../componets/user/TheFooter.vue';

export default {
    components: {
        TheHeader,
        TheFooter,
    }
}
</script>
