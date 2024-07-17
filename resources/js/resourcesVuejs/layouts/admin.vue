<template>
    <TheHeader></TheHeader>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 d-none d-sm-flex">
                <a-list bordered style="width: 100%;">
                    <TheMenu />
                    <template #header>
                        <div>BẢNG ĐIỀU KHIỂN</div>
                    </template>
                </a-list>
            </div>
            <div class="col-12 col-sm-9">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import TheHeader from "../componets/admin/TheHeader.vue";
import TheMenu from "../componets/admin/TheMenu.vue";
export default {
    components: {
        TheHeader,
        TheMenu
    },
};
</script>
