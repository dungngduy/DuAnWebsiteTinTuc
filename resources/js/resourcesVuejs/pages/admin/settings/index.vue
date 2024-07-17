<template>
    Đây là trang cài đặt
</template>

<script>
import { useMenu } from '../../../storePinia/storeMenu.js';
export default {
    setup(){
        useMenu().onSelectedKeys(['admin-settings']);
    }
}
</script>
