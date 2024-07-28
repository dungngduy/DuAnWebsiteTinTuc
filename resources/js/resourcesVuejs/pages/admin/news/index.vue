<template>
    <a-card title="Tất cả bài viết" style="width: 100%">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <router-link :to="{ name: 'admin-news-create' }">
                    <a-button>
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
                    :pagination="paginationConfig"
                    @change="handleTableChange"
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
                                    params: { idNew: record.id },
                                }"
                            >
                                <a-button type="primary" class="me-sm-2 mb-2" style="background-color: #00d4ff;">
                                    <i class="fa-solid fa-file-invoice"></i>
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
import { useRouter } from "vue-router";
import { useMenu } from "../../../storePinia/storeMenu.js";
import axios from "axios";
import { paginationConfig } from "ant-design-vue/es/pagination/Pagination.js";
export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-news"]);

        const news = ref([]);
        const totalNew = ref("");
        const router = useRouter();
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
                    const processedNews = res.data.news.map(item => ({
                        ...item,
                        image: item.image.replace(/"/g, '')
                    }));

                    news.value = processedNews;
                    totalNew.value = res.data.totalNew;
                })
                .catch(() => {
                    router.push('/');
                    message.warning("Bạn cần có tài khoản quản trị để có thể truy cập vào trang này?");
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

        const paginationConfig = ref({
            current: 1,
            pageSize: 3,
            total: totalNew,
            showTotal: (total) => `Tổng ${total} bài viết`,
            showLessItems: true, // Hiển thị ít mục hơn trong phân trang để có dấu ba chấm
        });

        const handleTableChange = (pagination) => {
            paginationConfig.value.current = pagination.current;
            paginationConfig.value.pageSize = pagination.pageSize;
        };

        return {
            news,
            columns,
            deleteNews,
            paginationConfig,
            handleTableChange,
        };
    },
});
</script>

<style>
th.column-index,
td.column-index,
th.column-title,
td.column-title,
th.column-image,
td.column-image,
th.column-des,
td.column-des,
th.column-cate,
td.column-cate,
th.column-action,
td.column-action {
  text-align: center !important;
}
</style>
