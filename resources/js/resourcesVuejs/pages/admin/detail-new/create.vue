<template>
    <form @submit.prevent="createDetailNew()">
        <a-card title="Tạo mới nội dung bài viết" style="width: 100%">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12 text-start text-sm-start">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.main_content }">Tiêu đề</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-textarea :rows="8" v-model:value="main_content"></a-textarea><br>
                            <small v-if="errors.main_content" class="text-danger">{{ errors.main_content[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12 text-start text-sm-start">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.order_index }">Thứ tự hiển thị</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-input
                                v-model:value="order_index"
                                placeholder="Thứ tự hiển thị"
                                allow-clear
                            />
                            <small v-if="errors.order_index" class="text-danger">{{ errors.order_index[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto mt-3">
                    <a-button class="mb-2 me-sm-2">
                        <router-link
                            :to="{
                                name: 'admin-detail-new',
                                params: new_id
                            }"
                        >
                            Hủy
                        </router-link>
                    </a-button>
                    <a-button type="primary" html-type="submit">Thêm nội dung</a-button>
                </div>
            </div>
        </a-card>
    </form>
</template>

<script>
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRoute, useRouter } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../storePinia/storeMenu.js";
import axios from "axios";
export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-news"]);

        const router = useRouter();
        const route = useRoute();
        const idNew = ref();
        const detailNew = reactive({
            main_content: "",
            order_index: "",
            new_id: "",
        });
        const errors = ref({});

        const getDetailNewCreate = () => {
            const idNew = route.params.idNew;
            axios.get(`http://127.0.0.1:8000/api/detail-new/${idNew}/create`)
            .then(res => {
                detailNew.new_id = res.data.idNew;
            })
            .catch(err => {
                console.log(err);
            })
        }

        getDetailNewCreate()

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const createDetailNew = () => {
            axios.post('http://127.0.0.1:8000/api/post-detail-new', detailNew)
            .then(res => {
                if(res.status == 200) {
                    message.success('Tạo mới nội dung thành công');
                    router.push({ name: 'admin-detail-new', params: detailNew.new_id });
                }
            })
            .catch(err => {
                if (err.response && err.response.data && err.response.data.errors) {
                    errors.value = err.response.data.errors;
                    message.warning('Tạo mới không thành công');
                }
            })
        }

        return {
            ...toRefs(detailNew),
            errors,
            filterOption,
            createDetailNew,
        }
    },
});
</script>
