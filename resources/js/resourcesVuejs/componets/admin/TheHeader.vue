<template>
    <div class="container-fluid">
        <div
            class="row align-items-center"
            style="background: #cbcbcb; padding: 20px"
        >
            <div
                class="col-1 d-flex d-sm-none align-items-center justify-content-center"
            >
                <span @click="showDrawerCategories()"><i class="fa-solid fa-bars"></i></span>
            </div>

            <div
                class="col-10 col-sm-9 d-flex align-items-center justify-content-center justify-content-sm-start"
            >
                <img
                    class="ms-3 me-3"
                    src="../../../../assets/img/logo/logo.png"
                    alt=""
                    height="40"
                    width="120"
                />
                <span class="d-none d-sm-flex">QUẢN TRỊ</span>
            </div>

            <div
                class="col-sm-3 d-none d-sm-flex align-items-center justify-content-sm-end"
            >
                <span>Admin</span>
            </div>

            <div
                class="col-1 d-flex d-sm-none align-items-center justify-content-center"
            >
                <span @click="showDrawerUser()"><i class="fa-solid fa-user"></i></span>
            </div>
        </div>
    </div>

    <a-drawer
        v-model:open="openCategories"
        class="custom-class"
        title="Danh mục"
        placement="left"
    >
        <TheMenu />
    </a-drawer>

    <a-drawer
        v-model:open="openUser"
        class="custom-class"
        title="Tài khoản"
        placement="right"
    >
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
    </a-drawer>
</template>

<script>
import TheMenu from '../admin/TheMenu.vue';
import { defineComponent, ref } from 'vue';
export default defineComponent ({
    components: {
        TheMenu
    },
    setup(){
        const openCategories = ref(false);
        const openUser = ref(false);

        const showDrawerCategories = () => {
            openCategories.value = true;
        };
        const showDrawerUser = () => {
            openUser.value = true;
        };

        return {
            openCategories,
            openUser,
            showDrawerCategories,
            showDrawerUser
        };
    }
})
</script>
