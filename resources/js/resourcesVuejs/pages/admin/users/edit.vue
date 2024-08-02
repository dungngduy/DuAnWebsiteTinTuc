<template>
    <form @submit.prevent="updateUsers()">
        <a-card title="Cập nhật tài khoản" style="width: 100%">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="col-12 d-flex justify-content-center mt-3">
                        <a-upload class="users"
                            v-model:file-list="fileList"
                            :action="`/api/users/${idUser}`"
                            list-type="picture"
                            accept="image/*"
                            :before-upload="beforeUpload"
                            @change="handleFileChange(event)"
                        >
                            <a-button>
                                <upload-outlined></upload-outlined>
                                Cập nhật ảnh
                            </a-button>
                        </a-upload>
                        <br>
                    </div>
                    <!-- <div class="col-12 d-flex justify-content-center mt-3">
                        <small class="text-danger">* Lưu ý xóa ảnh cũ trớc khi cập nhật</small>
                    </div> -->
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
                                @change="handleFileChange(event)"
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
                            <span>{{ format(login_at) }}</span>
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
import { UploadOutlined } from '@ant-design/icons-vue';
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRoute } from "vue-router";
import { useRouter } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../storePinia/storeMenu.js";
import axios from "axios";
export default defineComponent({
    components: {
        UploadOutlined,
    },
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);

        const route = useRoute();
        const router = useRouter();

        const users_status = ref([]);
        const departments = ref([]);
        const fileList = ref([]);
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
        const idUser = ref(route.params.id);

        const getUsersEdit = () => {
            axios.get(`http://127.0.0.1:8000/api/users/${idUser.value}/edit`)
            .then(res => {
                users.status_id = res.data.users.status_id;
                users.username = res.data.users.username;

                if (Array.isArray(res.data.users.avatar)) {
                    fileList.value = res.data.users.avatar.map(img => ({
                        uid: img.id,
                        name: img.name,
                        status: 'done',
                        originFileObj: img.originFileObj,
                        url: `/storage/uploads/users/${img.name}`,
                    }));
                } else {
                    if (res.data.users.avatar) {
                        const image = res.data.users.avatar;
                        const newImage = image.replace(/^"(.*)"$/, '$1');
                        fileList.value = [{
                            uid: 1,
                            name: newImage,
                            status: 'done',
                            url: `/storage/uploads/users/${newImage}`,
                        }];
                    }
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
            const formData = new FormData();

            formData.append('username', users.username);

            if (fileList.value && fileList.value.length > 0) {
                fileList.value.forEach(file => {
                    if (!file.originFileObj) {
                        formData.append('avatarExist', file.name);
                    } else {
                        // Nếu ảnh mới, thêm vào phần ảnh mới
                        formData.append('avatar[]', file.originFileObj);
                    }
                });
            }

            formData.append('_method', 'PUT');
            formData.append('name', users.name);
            formData.append('email', users.email);
            formData.append('department_id', users.department_id);
            formData.append('status_id', users.status_id);
            formData.append('change_password', users.change_password);
            formData.append('password', users.password);
            formData.append('password_confirmation', users.password_confirmation);
            formData.append('login_at', users.login_at);
            formData.append('change_password_at', users.change_password_at);

            axios.post(`http://127.0.0.1:8000/api/users/${idUser.value}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
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
                    fileList.value = reader.result;
                    users.avatar = file;
                };
                reader.readAsDataURL(file);
            }
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
            fileList,
            idUser,
            errors,
            filterOption,
            beforeUpload,
            handleFileChange,
            updateUsers,
            format,
        }
    },
});
</script>

<style>
    .users .ant-upload {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .users .ant-upload-list-item {
        border: none !important;
        display: block !important;
        width: 265px !important;
    }

    .users .ant-upload-list-item a img {
        height: 250px !important;
        width: 250px !important;
        border-radius: 50% !important;
    }

    .users .ant-upload-list-item span {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .users .ant-upload-list-item-actions {
        margin-top: 20px !important;
    }
</style>
