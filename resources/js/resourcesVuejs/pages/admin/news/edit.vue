<template>
    <form @submit.prevent="updateNews()">
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
                            v-model:file-list="fileList"
                            :action="`/api/news/${newId}`"
                            list-type="picture"
                            accept="image/*"
                            :before-upload="beforeUpload"
                            @change="handleFileChange(event)"
                        >
                            <a-button>
                                <upload-outlined></upload-outlined>
                                Tải ảnh lên
                            </a-button>
                        </a-upload>
                        <br />
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
                        >Lưu</a-button
                    >
                </div>
            </div>
        </a-card>
    </form>
</template>

<script>
import { UploadOutlined } from '@ant-design/icons-vue';
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRoute } from 'vue-router';
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

        const route = useRoute();
        const router = useRouter();
        const categories = ref([]);
        const status = ref([]);
        var fileList = ref([]);
        const news = reactive({
            title_new: '',
            image: [],
            short_content: '',
            category_id: '',
            status_new: '',
        });
        const errors = ref({});
        const newId = ref(route.params.id);

        const getNewsUpdate = () => {
            axios
                .get(`http://127.0.0.1:8000/api/news/${newId.value}/edit`)
                .then((res) => {
                    news.title_new = res.data.news.title_new;

                    if (Array.isArray(res.data.news.image)) {
                        fileList.value = res.data.news.image.map(img => ({
                            uid: img.id,
                            name: img.name,
                            status: 'done',
                            originFileObj: img.originFileObj,
                            url: `/storage/uploads/news/${img.name}`,
                        }));
                    } else {
                        const image = res.data.news.image;
                        const newImage = image.replace(/^"(.*)"$/, '$1');
                        fileList.value = [{
                            uid: 1,
                            name: newImage,
                            status: 'done',
                            url: `/storage/uploads/news/${newImage}`,
                        }];
                    }

                    news.short_content = res.data.news.short_content;
                    news.status_new = res.data.news.status_new;
                    news.category_id = res.data.news.category_id;
                    status.value = res.data.status;
                    categories.value = res.data.categories;
                })
                .catch((err) => {
                    console.log(err);
                });
        };

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

        const handleFileChange = (event) => {
            if (event && event.target && event.target.files) {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = () => {
                    fileList.value = reader.result; // Store Base64 string for preview
                    news.image = file; // Store the image file for submission
                };
                reader.readAsDataURL(file);
            }
        };
        // const handleFileChange = (event) => {
        //     if (event && event.target && event.target.files) {
        //         const files = event.target.files;
        //         if (files.length > 0) {
        //             fileList.value = [{
        //                 uid: files[0].name,
        //                 name: files[0].name,
        //                 status: 'done',
        //                 originFileObj: files[0],
        //                 url: URL.createObjectURL(files[0]),
        //             }];
        //             news.image = files[0]; // Set news.image to the new file object
        //         }
        //     }
        // };

        var formData = new FormData();
        const updateNews = () => {
            const title_new = news.title_new;
            const short_content = news.short_content;
            const category_id = news.category_id;
            const status_new = news.status_new;

            formData.append('title_new', title_new);
            // const image = [];
            // for (let i = 0; i < fileList.value.length; i++) {
            //     formData.append(`${image}`, fileList.value[i].name);
            //     formData.append(`${image}`, data);
            // }

            formData.append('short_content', short_content);
            formData.append('category_id', category_id);
            formData.append('status_new', status_new);

            axios.put(`http://127.0.0.1:8000/api/news/${newId.value}`, formData, {
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(res => {
                if (res.status == 200) {
                    message.success('Cập nhật bài viết thành công');
                    router.push({ name: 'admin-news' });
                }
            })
            .catch(err => {
                if (err.response && err.response.data && err.response.data.errors) {
                    errors.value = err.response.data.errors;
                    message.warning('Cập nhật không thành công');
                }
            });
        }

        getNewsUpdate();

        return {
            status,
            categories,
            ...toRefs(news),
            errors,
            newId,
            filterOption,
            beforeUpload,
            handleFileChange,
            updateNews,
            fileList,
        };
    },
});
</script>
