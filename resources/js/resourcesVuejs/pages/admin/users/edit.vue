<template>
    <form @submit.prevent="updateUsers()">
        <a-card title="Cập nhật tài khoản" style="width: 100%">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="col-12 d-flex justify-content-center">
                        <a-avatar :size="250">
                            <template v-if="avatar" #icon>
                                <img
                                    :src="`/storage/uploads/users/${avatar}`"
                                    alt="Avatar"
                                />
                            </template>
                            <template v-else #icon>
                                <img
                                    src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg"
                                    alt="Avatar"
                                />
                            </template>
                        </a-avatar>
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-3">
                        <a-button>
                            <i class="fa-solid fa-plus"></i>
                            <span class="ms-2">Chọn ảnh</span>
                        </a-button>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.status_id }">
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
                            ></a-select><br>
                            <small v-if="errors.status_id" class="text-danger">{{ errors.status_id[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.username }">Tên tài khoản</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-input
                                v-model:value="username"
                                placeholder="Tên tài khoản"
                                allow-clear
                            /><br>
                            <small v-if="errors.username" class="text-danger">{{ errors.username[0] }}</small>
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
                        <div class="col-12 col-sm-3 text-start text-sm-end"></div>
                        <div class="col-12 col-sm-6">
                            <a-checkbox v-model:checked="change_password">
                                Đổi mật khẩu
                            </a-checkbox>
                        </div>
                    </div>
                    <div class="row mb-3" v-if="change_password === true">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.password }">Mật khẩu</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-input-password
                                v-model:value="password"
                                placeholder="Mật khẩu"
                                allow-clear
                            /><br>
                            <small v-if="errors.password" class="text-danger">{{ errors.password[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3" v-if="change_password === true">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-2">*</span>
                                <span :class="{ 'text-danger': errors.password_confirmation }">Xác nhận mật khẩu</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-input-password
                                v-model:value="password_confirmation"
                                placeholder="Xác nhận mật khẩu"
                                allow-clear
                            /><br>
                            <small v-if="errors.password_confirmation" class="text-danger">{{ errors.password_confirmation[1] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span>Đăng nhập gần đây :</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <span>{{ login_at }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span>Đổi mật khẩu gần đây :</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <span>{{ format(change_password_at) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto mt-3">
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
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRoute } from "vue-router";
import { useRouter } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../storePinia/storeMenu.js";
import axios from "axios";
export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);

        const route = useRoute();
        const router = useRouter();

        const users_status = ref([]);
        const departments = ref([]);
        const users = reactive({
            username: "",
            avatar: "",
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            department_id: [],
            status_id: [],
            change_password: false,
            login_at: "",
            change_password_at: "",
        });
        const errors = ref({});

        const getUsersEdit = () => {
            const idUser = route.params.id;

            axios.get(`http://127.0.0.1:8000/api/users/${idUser}/edit`)
            .then(res => {
                users.status_id = res.data.users.status_id;
                users.username = res.data.users.username;
                if (res.data.users.avatar) {
                    users.avatar = res.data.users.avatar.replace(/"/g, '');
                }
                users.name = res.data.users.name;
                users.email = res.data.users.email;
                users.department_id = res.data.users.department_id;

                res.data.users.login_at ? users.login_at = res.data.users.login_at : users.login_at = "Chưa có lần đăng nhập nào";
                res.data.users.change_password_at ? users.change_password_at = res.data.users.change_password_at : users.change_password_at = "Chưa có lần đổi mật khẩu nào";

                users_status.value = res.data.users_status;
                departments.value = res.data.departments;
            })
            .catch(err => {
                console.log(err);
            })
        }

        const updateUsers = () => {
            const idUser = route.params.id;

            axios.put(`http://127.0.0.1:8000/api/users/${idUser}`, users)
            .then(res => {
                if(res.status == 200) {
                    message.success('Cập nhật thành công');
                    router.push({ name: 'admin-users' })
                }
            })
            .catch(err => {
                if (err.response && err.response.data && err.response.data.errors) {
                    errors.value = err.response.data.errors;
                    message.warning('Cập nhật không thành công');
                }
            })
        }

        getUsersEdit();

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        function format(inputDate) {
            var date = new Date(inputDate);
            if (!isNaN(date.getTime())) {
                var formattedDate = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '-' +
                                    ((date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1)) + '-' +
                                    date.getFullYear() + ' ' +
                                    (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':' +
                                    (date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes()) + ':' +
                                    (date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds());

                return formattedDate;
            } else {
                return 'Invalid Date';
            }
        }

        return {
            users_status,
            departments,
            ...toRefs(users),
            errors,
            filterOption,
            updateUsers,
            format,
        }
    },
});
</script>
