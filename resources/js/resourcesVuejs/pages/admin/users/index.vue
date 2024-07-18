<template>
    <a-card title="Tài khoản" style="width: 100%">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <router-link :to="{ name: 'admin-users-create' }">
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
                    :data-source="users"
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
                                v-if="record.status_id == 1"
                                class="bg-success p-2 text-light"
                                style="border-radius: 20px; font-weight: 600"
                            >
                                {{ record.status }}
                            </span>
                            <span
                                v-else-if="record.status_id == 2"
                                class="bg-danger p-2 text-light"
                                style="border-radius: 20px; font-weight: 600"
                            >
                                {{ record.status }}
                            </span>
                        </template>
                        <template v-if="column.key === 'action'">
                            <router-link
                                :to="{
                                    name: 'admin-users-edit',
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
                                @click="deleteUsers(record.id)"
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
        useMenu().onSelectedKeys(["admin-users"]);

        const users = ref([]);
        const columns = [
            {
                title: "#",
                key: "index",
                width: 40,
                className: "column-index",
            },
            {
                title: "Tài khoản",
                dataIndex: "username",
                key: "username",
                width: 140,
                className: "column-username",
            },
            {
                title: "Tên người dùng",
                dataIndex: "name",
                key: "name",
                width: 200,
                className: "column-name",
            },
            {
                title: "Email",
                dataIndex: "email",
                key: "email",
                width: 250,
                className: "column-email",
            },
            {
                title: "Phòng ban",
                dataIndex: "departments",
                key: "departments",
                responsive: ["sx"],
                className: "column-departments",
            },
            {
                title: "Vai trò",
                dataIndex: "",
                key: "",
                className: "column-role",
            },
            {
                title: "Tình trạng",
                dataIndex: "status",
                key: "status",
                responsive: ["sm"],
                className: "column-status",
            },
            {
                title: "Hành động",
                dataIndex: "",
                key: "action",
                fixed: "right",
                width: 140,
                className: "column-action",
            },
        ];
        const getUser = () => {
            axios
                .get("http://127.0.0.1:8000/api/users")
                .then((res) => {
                    users.value = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        };

        const deleteUsers = (id) => {
            Modal.confirm({
                content: "Bạn có chắc chắn muốn xóa người này?",
                icon: createVNode(ExclamationCircleOutlined),
                onOk() {
                    axios
                        .delete(`http://127.0.0.1:8000/api/users/${id}`)
                        .then((res) => {
                            if (res.status == 200) {
                                message.success("Xóa tài khoản thành công");
                                getUser();
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

        getUser();

        return {
            users,
            columns,
            deleteUsers,
        };
    },
});
</script>

<style>
th.column-index,
td.column-index,
th.column-username,
td.column-username,
th.column-name,
td.column-name,
th.column-email,
td.column-email,
th.column-departments,
td.column-departments,
th.column-role,
td.column-role,
th.column-status,
td.column-status,
th.column-action,
td.column-action {
  text-align: center !important;
}
</style>
