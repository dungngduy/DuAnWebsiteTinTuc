<template>
    <form @submit.prevent="updateCategories()">
        <a-card title="Cập nhật danh mục bài viết" style="width: 100%">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.title }">Tiêu đề</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input
                                v-model:value="title"
                                placeholder="Tiêu đề"
                                allow-clear
                            />
                            <small v-if="errors.title" class="text-danger">{{ errors.title[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.status }">
                                    Trạng thái
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select
                                v-model:value="status"
                                show-search
                                placeholder="Trạng thái"
                                style="width: 100%"
                                :options="status_cate"
                                :filter-option="filterOption"
                            ></a-select><br>
                            <small v-if="errors.status" class="text-danger">{{ errors.status[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto mt-3">
                    <a-button class="mb-2 me-sm-2">
                        <router-link :to="{ name: 'admin-categories' }">
                            Hủy
                        </router-link>
                    </a-button>
                    <a-button type="primary" html-type="submit">Lưu</a-button>
                </div>
            </div>
        </a-card>
    </form>
</template>

<script>
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRoute } from "vue-router";
import { useRouter } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../storePinia/storeMenu.js";
import axios from "axios";
export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-categories"]);

        const router = useRouter();
        const route = useRoute();
        const status_cate = ref([]);
        const categories = reactive({
            title: "",
            status: [],
        });
        const errors = ref({});

        const getCategoriesEdit = () => {
            const idCate = route.params.id;
            axios.get(`http://127.0.0.1:8000/api/categories/${idCate}/edit`)
            .then(res => {
                categories.title = res.data.categories.title;
                categories.status = res.data.categories.status;
                status_cate.value = res.data.status_cate;
            })
            .catch(err => {
                console.log(err);
            })
        }

        getCategoriesEdit();

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const updateCategories = () => {
            const idCate = route.params.id;
            axios.put(`http://127.0.0.1:8000/api/categories/${idCate}`, categories)
            .then(res => {
                if(res.status == 200) {
                    message.success('Cập nhật danh mục thành công');
                    router.push({ name: 'admin-categories' });
                }
            })
            .catch(err => {
                if (err.response && err.response.data && err.response.data.errors) {
                    errors.value = err.response.data.errors;
                    message.warning('Cập nhật không thành công');
                }
            })
        }

        return {
            status_cate,
            ...toRefs(categories),
            errors,
            filterOption,
            updateCategories,
        }
    },
});
</script>
