<template>
    <a-card title="Danh mục bài viết" style="width: 100%">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <router-link :to="{ name: 'admin-categories-create' }">
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
                    :data-source="categories"
                    :scroll="{ x: 576 }"
                >
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'index'">
                            <span>
                                {{ index + 1 }}
                            </span>
                        </template>
                        <template v-if="column.key === 'status'">
                            <span
                                v-if="record.status == 1"
                                class="bg-success p-2 text-light"
                                style="border-radius: 20px; font-weight: 600"
                            >
                                Kích hoạt
                            </span>
                            <span
                                v-else-if="record.status == 2"
                                class="bg-danger p-2 text-light"
                                style="border-radius: 20px; font-weight: 600"
                            >
                                Không kích hoạt
                            </span>
                        </template>
                        <template v-if="column.key === 'action'">
                            <router-link
                                :to="{
                                    name: 'admin-categories-edit',
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
                                @click="deleteCategories(record.id)"
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
        useMenu().onSelectedKeys(["admin-categories"]);

        const categories = ref([]);
        const columns = [
            {
                title: "#",
                key: "index",
                width: 40,
                className: "column-index",
            },
            {
                title: "Tiêu đề",
                dataIndex: "title",
                key: "title",
                width: 560,
                className: "column-title"
            },
            {
                title: "Trạng thái",
                dataIndex: "status",
                key: "status",
                width: 300,
                className: "column-status"
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
        const getCategories = () => {
            axios
                .get("http://127.0.0.1:8000/api/categories")
                .then((res) => {
                    categories.value = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        };

        getCategories();

        const deleteCategories = (id) => {
            Modal.confirm({
                content: "Bạn có chắc chắn muốn xóa danh mục này?",
                icon: createVNode(ExclamationCircleOutlined),
                onOk() {
                    axios
                        .delete(`http://127.0.0.1:8000/api/categories/${id}`)
                        .then((res) => {
                            if (res.status == 200) {
                                message.success("Xóa danh mục thành công");
                                getCategories();
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
            categories,
            columns,
            deleteCategories,
        };
    },
});
</script>

<style>
th.column-index,
td.column-index,
th.column-title,
td.column-title,
th.column-status,
td.column-status,
th.column-action,
td.column-action {
  text-align: center !important;
}
</style>
