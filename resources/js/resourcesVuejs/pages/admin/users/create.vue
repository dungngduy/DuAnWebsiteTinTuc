<template>
    <form @submit.prevent="createUsers()">
        <a-card title="Tạo mới tài khoản" style="width: 100%">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="col-12 d-flex justify-content-center">
                        <a-upload-dragger
                            v-model:fileList="fileList"
                            name="file"
                            :multiple="true"
                            action="https://www.mocky.io/v2/5cc8019d300000980a055e76"
                            @change="handleChange"
                            @drop="handleDrop"
                        >
                            <p class="ant-upload-drag-icon">
                                <upload-outlined></upload-outlined>
                            </p>
                            <p class="ant-upload-text">
                                Click or drag file to this area to upload
                            </p>
                            <p class="ant-upload-hint">
                                Support for a single or bulk upload. Strictly
                                prohibit from uploading company data or other
                                band files
                            </p>
                        </a-upload-dragger>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span
                                    :class="{ 'text-danger': errors.status_id }"
                                >
                                    Tình trạng
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-select
                                v-model:value="status_id"
                                show-search
                                placeholder="Tình trạng"
                                style="width: 100%"
                                :options="users_status"
                                :filter-option="filterOption"
                            ></a-select
                            ><br />
                            <small
                                v-if="errors.status_id"
                                class="text-danger"
                                >{{ errors.status_id[0] }}</small
                            >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span>Tên tài khoản</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-input
                                v-model:value="username"
                                placeholder="Tên tài khoản"
                                allow-clear
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span>Họ và tên</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-input
                                v-model:value="name"
                                placeholder="Họ và tên"
                                allow-clear
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span>Email</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-input
                                v-model:value="email"
                                placeholder="Email"
                                allow-clear
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span>Phòng ban</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-select
                                v-model:value="department_id"
                                show-search
                                placeholder="Phòng ban"
                                style="width: 100%"
                                :options="departments"
                                :filter-option="filterOption"
                            ></a-select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span>Mật khẩu</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-input-password
                                v-model:value="password"
                                placeholder="Mật khẩu"
                                allow-clear
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span>Xác nhận mật khẩu</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-input-password
                                v-model:value="password_confirmation"
                                placeholder="Xác nhận mật khẩu"
                                allow-clear
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto mt-3"
                >
                    <a-button class="mb-2 me-sm-2">
                        <router-link :to="{ name: 'admin-users' }">
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
        useMenu().onSelectedKeys(["admin-users"]);

        const router = useRouter();
        const users_status = ref([]);
        const departments = ref([]);
        const users = reactive({
            username: "",
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            department_id: [],
            status_id: [],
        });
        const errors = ref({});

        const getUsersCreate = () => {
            axios
                .get("http://127.0.0.1:8000/api/users/create")
                .then((res) => {
                    users_status.value = res.data.users_status;
                    departments.value = res.data.departments;
                })
                .catch((err) => {
                    console.log(err);
                });
        };

        getUsersCreate();

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const createUsers = () => {
            axios
                .post("http://127.0.0.1:8000/api/post-user", users)
                .then((res) => {
                    if (res.status == 200) {
                        message.success("Tạo mới tài khoản thành công");
                        router.push({ name: "admin-users" });
                    }
                })
                .catch((err) => {
                    errors.value = err.response.data.errors;
                });
        };

        return {
            users_status,
            departments,
            ...toRefs(users),
            errors,
            filterOption,
            createUsers,
        };
    },
});
</script>
