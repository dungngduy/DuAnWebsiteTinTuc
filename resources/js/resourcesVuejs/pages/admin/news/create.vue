<template>
    <form @submit.prevent="createNews()">
        <a-card title="Tạo mới bài viết" style="width: 100%">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12 text-start text-sm-start">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.title_new }"> Tiêu đề bài viết </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-input
                                v-model:value="title_new"
                                placeholder="Tiêu đề bài viết"
                                allow-clear
                            /><br>
                            <small v-if="errors.title_new" class="text-danger">{{ errors.title_new[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12 text-start text-sm-start">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{}"> Ảnh bài viết </span>
                            </label>
                        </div>
                        <a-upload
                            v-model:file-list="image"
                            name="image"
                            action="/api/post-news"
                            list-type="picture"
                            :before-upload="beforeUpload"
                            accept="image/jpeg,image/png,image/jpg"
                            multiple
                        >
                            <a-button>
                                <template #icon><UploadOutlined /></template>
                                Tải ảnh lên
                            </a-button>
                        </a-upload><br>
                        <small v-if="errors.image" class="text-danger">{{ errors.image[0] }}</small>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12 text-start text-sm-start">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{}"> Đoạn tóm tắt </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-textarea :rows="5" v-model:value="short_content"></a-textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12 text-start text-sm-start">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{}"> Danh mục bài viết </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-select
                                v-model:value="category_id"
                                show-search
                                placeholder="Danh mục bài viết"
                                style="width: 100%"
                                :options="categories"
                                :filter-option="filterOption"
                            ></a-select
                            ><br />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12 text-start text-sm-start">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{}"> Trạng thái </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-select
                                v-model:value="status_new"
                                show-search
                                placeholder="Trạng thái"
                                style="width: 100%"
                                :options="status"
                                :filter-option="filterOption"
                            ></a-select
                            ><br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto mt-3"
                >
                    <a-button class="mb-2 me-sm-2">
                        <router-link :to="{ name: 'admin-news' }">
                            Hủy
                        </router-link>
                    </a-button>
                    <a-button type="primary" html-type="submit"
                        >Thêm bài viết</a-button
                    >
                </div>
            </div>
        </a-card>
    </form>
</template>

<script>
import { UploadOutlined } from '@ant-design/icons-vue';
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRouter } from "vue-router";
import { message } from "ant-design-vue";
import { useMenu } from "../../../storePinia/storeMenu.js";
import axios from "axios";
export default defineComponent({
    components: {
        UploadOutlined,
    },
    setup() {
        useMenu().onSelectedKeys(["admin-news"]);

        const router = useRouter();
        const categories = ref([]);
        const status = ref([]);
        const news = reactive({
            title_new: "",
            image: [],
            short_content: "",
            category_id: [],
            status_new: [],
        });
        const errors = ref({});

        const getNewsCreate = () => {
            axios
                .get("http://127.0.0.1:8000/api/news/create")
                .then((res) => {
                    status.value = res.data.status;
                    categories.value = res.data.categories;
                })
                .catch((err) => {
                    console.log(err);
                });
        };

        getNewsCreate();

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const beforeUpload = (file) => {
            const isJpgOrPng = file.type === 'image/jpeg' || file.type === 'image/png';
            if (!isJpgOrPng) {
                message.error('Bạn chỉ có thể tải lên tệp JPG/PNG!');
            }
            return isJpgOrPng;
        };

        const createNews = () => {
            const formData = new FormData();
            formData.append('title_new', news.title_new);
            formData.append('short_content', news.short_content);
            formData.append('category_id', news.category_id);
            formData.append('status_new', news.status_new);

            for (let i = 0; i < news.image.length; i++) {
                formData.append('image[]', news.image[i].originFileObj);
            }

            axios.post('http://127.0.0.1:8000/api/post-news', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
            })
            .then(res => {
                if(res.status == 200) {
                    message.success('Tạo mới bài viết thành công');
                    router.push({ name: 'admin-news' });
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
            status,
            categories,
            ...toRefs(news),
            errors,
            filterOption,
            beforeUpload,
            createNews,
        };
    },
});
</script>
