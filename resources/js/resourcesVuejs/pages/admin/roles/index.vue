<template>
    Đây là trang phân quyền
</template>

<script>
import { useMenu } from '../../../storePinia/storeMenu.js';
export default {
    setup(){
        useMenu().onSelectedKeys(['admin-roles']);
    }
}
</script>
