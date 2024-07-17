<template>
    <a-card title="Chi tiết bài viết" style="width: 100%">
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
                    :data-source="detailNews"
                    :scroll="{ x: 576 }"
                >
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'index'">
                            <span>
                                {{ index + 1 }}
                            </span>
                        </template>
                        <template v-if="column.key === 'action'">
                            <!-- <router-link
                                :to="{
                                    name: 'admin-detail-new',
                                    params: { id: record.id },
                                }"
                            >
                                <a-button type="primary" class="me-sm-2 mb-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a-button>
                            </router-link> -->
                            <a-button
                                type="primary"
                                danger
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
import { useRoute } from "vue-router";
export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-news"]);

        const detailNews = ref([]);
        const route = useRoute();
        const columns = [
            {
                title: "#",
                key: "index",
                width: 40,
                className: "column-index",
            },
            {
                title: "Nội dung chính",
                dataIndex: "main_content",
                key: "main_content",
                className: "column-content"
            },
            {
                title: "Hành động",
                dataIndex: "",
                key: "action",
                fixed: "right",
                width: 140,
                className: "column-action"
            },
        ];
        const getDetailNews = () => {
            const newId = route.params.id;
            axios
                .get(`http://127.0.0.1:8000/api/detail-new/${newId}`)
                .then((res) => {
                    detailNews.value = res.data;
                    // console.log(res.data);
                })
                .catch((err) => {
                    console.log(err);
                });
        };

        getDetailNews();

        // const deleteNews = (id) => {
        //     Modal.confirm({
        //         content: "Bạn có chắc chắn muốn xóa bài viết này?",
        //         icon: createVNode(ExclamationCircleOutlined),
        //         onOk() {
        //             axios
        //                 .delete(`http://127.0.0.1:8000/api/news/${id}`)
        //                 .then((res) => {
        //                     if (res.status == 200) {
        //                         message.success("Xóa bài viết thành công");
        //                         getNews();
        //                     }
        //                 })
        //                 .catch((err) => {
        //                     console.log(err);
        //                 });
        //         },
        //         cancelText: "Hủy",
        //         onCancel() {
        //             Modal.destroyAll();
        //         },
        //     });
        // };

        return {
            detailNews,
            columns,
            // deleteNews,
        };
    },
});
</script>
