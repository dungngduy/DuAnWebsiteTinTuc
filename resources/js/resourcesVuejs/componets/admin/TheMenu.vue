<template>
    <a-menu
        v-model:openKeys="openKeys"
        v-model:selectedKeys="selectedKeys"
        mode="inline"
    >
        <a-menu-item key="admin-categories">
            <router-link :to="{ name: 'admin-categories' }"></router-link>
            <i class="fa-solid fa-list"></i><span class="ms-2">Danh mục bài viết</span>
        </a-menu-item>
        <a-menu-item key="admin-news">
            <router-link :to="{ name: 'admin-news' }"></router-link>
            <i class="fa-regular fa-newspaper"></i><span class="ms-2">Bài viết</span>
        </a-menu-item>
        <a-menu-item key="admin-users">
            <router-link :to="{ name: 'admin-users' }"></router-link>
            <i class="fa-regular fa-user"></i><span class="ms-2">Tài khoản</span>
        </a-menu-item>
        <a-menu-item key="admin-roles">
            <router-link :to="{ name: 'admin-roles' }"></router-link>
            <i class="fa-solid fa-tag"></i><span class="ms-2">Vai trò</span>
        </a-menu-item>
        <a-menu-item key="admin-settings">
            <router-link :to="{ name: 'admin-settings' }"></router-link>
            <i class="fa-solid fa-gear"></i><span class="ms-2">Cài đặt</span>
        </a-menu-item>
    </a-menu>
</template>

<script>
import { defineComponent } from "vue";
import { useMenu } from "../../storePinia/storeMenu.js";
import { storeToRefs } from "pinia";

export default defineComponent({
    setup() {
        const store = useMenu();
        return {
            ...storeToRefs(store),
        };
    },
});
</script>
