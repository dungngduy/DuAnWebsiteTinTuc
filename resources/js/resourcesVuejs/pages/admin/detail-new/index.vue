<template>
    <a-card title="Nội dung bài viết" style="width: 100%">
        <div class="row mb-3">
            <div class="col-6 d-flex justify-content-start">
                <router-link :to="{ name: 'admin-news' }">
                    <a-button>
                        Quay lại
                    </a-button>
                </router-link>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <router-link :to="{ name: 'admin-detail-new-create', params: idNew }">
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
                            <router-link
                                :to="{
                                    name: 'admin-detail-new-edit',
                                    params: { id: record.id, idNew: record.new_id }
                                }"
                            >
                                <a-button type="primary" class="me-sm-2 mb-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a-button>
                            </router-link>
                            <a-button
                                type="primary"
                                danger
                                @click="deleteDetailNew(record.id)"
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
import { useRouter } from "vue-router";
export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-news"]);

        const detailNews = ref([]);
        const idNew = ref("");
        const route = useRoute();
        const router = useRouter();
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
        const getDetailNew = () => {
            const newId = route.params.idNew;
            axios
                .get(`http://127.0.0.1:8000/api/detail-new/${newId}`)
                .then((res) => {
                    detailNews.value = res.data;
                    idNew.value = res.data.new_id;
                })
                .catch(() => {
                    router.push('/');
                    message.warning("Bạn cần có tài khoản quản trị để có thể truy cập vào trang này?");
                });
        };

        getDetailNew();

        const deleteDetailNew = (id) => {
            Modal.confirm({
                content: "Bạn có chắc chắn muốn xóa nội dung này?",
                icon: createVNode(ExclamationCircleOutlined),
                onOk() {
                    axios
                        .delete(`http://127.0.0.1:8000/api/detail-new/${id}`)
                        .then((res) => {
                            if (res.status == 200) {
                                message.success("Xóa nội dung thành công");
                                getDetailNew();
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
            detailNews,
            columns,
            idNew,
            deleteDetailNew,
        };
    },
});
</script>

<style>
th.column-index,
td.column-index,
th.column-action,
td.column-action {
  text-align: center !important;
}
</style>
