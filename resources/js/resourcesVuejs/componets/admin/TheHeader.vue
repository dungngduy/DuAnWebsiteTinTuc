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
                <span v-if="userName" class="me-3">{{ userName }}</span>
                <a-button @click="logout"><i class="fa-solid fa-right-from-bracket"></i></a-button>
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
import { useRouter } from 'vue-router';
import TheMenu from '../admin/TheMenu.vue';
import { defineComponent, ref } from 'vue';
import { message } from 'ant-design-vue';
export default defineComponent ({
    components: {
        TheMenu
    },
    setup(){
        const openCategories = ref(false);
        const openUser = ref(false);
        const router = useRouter();

        const showDrawerCategories = () => {
            openCategories.value = true;
        };
        const showDrawerUser = () => {
            openUser.value = true;
        };

        const userData = localStorage.getItem('user');
        const user = JSON.parse(userData);
        const userName = user.name;

        const logout = () => {
            axios.post('http://127.0.0.1:8000/api/logout')
            .then(response => {
                localStorage.removeItem('user');
                localStorage.removeItem('role');
                router.push('/');
                message.success(response.data.message);
            })
            .catch(error => {
                console.log(error);
            });
        }

        return {
            openCategories,
            openUser,
            showDrawerCategories,
            showDrawerUser,
            logout,
            userName,
        };
    }
})
</script>
