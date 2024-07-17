<template>
    <a-card title="Danh mục bài viết" style="width: 100%">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <router-link :to="{ name: 'admin-news-create' }">
                    <a-button type="primary">
                        <i class="fa-solid fa-plus"></i>
                    </a-button>
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a-table
                    :columns="columns"
                    :data-source="news"
                    :scroll="{ x: 576 }"
                >
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'index'">
                            <span>
                                {{ index + 1 }}
                            </span>
                        </template>
                        <template v-if="column.key === 'image'">
                            <img :src="`/storage/uploads/news/${record.image}`" alt="Ảnh bài viết" style="max-width: 100px; max-height: 100px;">
                        </template>
                        <template v-if="column.key === 'action'">
                            <router-link
                                :to="{
                                    name: 'admin-detail-new',
                                    params: { id: record.id },
                                }"
                            >
                                <a-button type="primary" class="me-sm-2 mb-2">
                                    <i class="fa-regular fa-eye"></i>
                                </a-button>
                            </router-link>
                            <router-link
                                :to="{
                                    name: 'admin-news-edit',
                                    params: { id: record.id },
                                }"
                            >
                                <a-button type="primary" class="me-sm-2 mb-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a-button>
                            </router-link>
                            <a-button
                                type="primary"
                                danger
                                @click="deleteNews(record.id)"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </a-button>
                        </template>
                    </template>
                </a-table>
            </div>
        </div>
    </a-card>
</template>

<script>
import { ExclamationCircleOutlined } from "@ant-design/icons-vue";
import { createVNode, defineComponent, ref } from "vue";
import { Modal } from "ant-design-vue";
import { message } from "ant-design-vue";
import { useMenu } from "../../../storePinia/storeMenu.js";
import axios from "axios";
export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-news"]);

        const news = ref([]);
        const columns = [
            {
                title: "#",
                key: "index",
                width: 40,
                className: "column-index",
            },
            {
                title: "Tiêu đề bài viết",
                dataIndex: "title_new",
                key: "title_new",
                className: "column-title"
            },
            {
                title: "Ảnh bài viết",
                dataIndex: "image",
                key: "image",
                className: "column-image"
            },
            {
                title: "Mô tả ngắn",
                dataIndex: "short_content",
                key: "short_content",
                className: "column-des"
            },
            {
                title: "Danh mục bài viết",
                dataIndex: "title_cate",
                key: "title_cate",
                className: "column-cate"
            },
            {
                title: "Hành động",
                dataIndex: "",
                key: "action",
                fixed: "right",
                width: 200,
                className: "column-action"
            },
        ];
        const getNews = () => {
            axios
                .get("http://127.0.0.1:8000/api/news")
                .then((res) => {
                    // news.value = res.data;
                    const processedNews = res.data.map(item => ({
                        ...item,
                        image: item.image.replace(/"/g, '')
                    }));

                    news.value = processedNews;
                })
                .catch((err) => {
                    console.log(err);
                });
        };

        getNews();

        const deleteNews = (id) => {
            Modal.confirm({
                content: "Bạn có chắc chắn muốn xóa bài viết này?",
                icon: createVNode(ExclamationCircleOutlined),
                onOk() {
                    axios
                        .delete(`http://127.0.0.1:8000/api/news/${id}`)
                        .then((res) => {
                            if (res.status == 200) {
                                message.success("Xóa bài viết thành công");
                                getNews();
                            }
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                },
                cancelText: "Hủy",
                onCancel() {
                    Modal.destroyAll();
                },
            });
        };

        return {
            news,
            columns,
            deleteNews,
        };
    },
});
</script>
