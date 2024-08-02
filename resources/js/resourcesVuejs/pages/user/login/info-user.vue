<template>
    <form @submit.prevent="updateUser()">
        <div class="row mt-3 mb-3">
            <div class="col-sm-4">
                <a-menu
                    mode="inline"
                >
                    <a-menu-item key="thong-tin-nguoi-dung">
                        <router-link
                            :to="{ name: 'thong-tin-nguoi-dung' }"
                        ></router-link>
                        <i class="fa-solid fa-list"></i
                        ><span class="ms-2">Cập nhật tài khoản</span>
                    </a-menu-item>
                    <a-menu-item key="bai-viet-da-xem">
                        <router-link :to="{ name: 'bai-viet-da-xem' }"></router-link>
                        <i class="fa-regular fa-eye"></i>
                        <span class="ms-2">Bài viết đã xem</span>
                    </a-menu-item>
                    <a-menu-item key="bai-viet-da-luu">
                        <router-link
                            :to="{ name: 'bai-viet-da-luu' }"
                        ></router-link>
                        <i class="fa-regular fa-bookmark"></i>
                        <span class="ms-2">Bài viết đã lưu</span>
                    </a-menu-item>
                    <a-menu-item>
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <a-button type="link" @click="logout()" class="p-0 ms-2">Đăng xuất</a-button>
                    </a-menu-item>
                </a-menu>
            </div>
            <div class="col-sm-8">
                <a-card title="Cập nhật tài khoản" style="width: 100%">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div
                                class="col-12 d-flex justify-content-center mt-3"
                            >
                                <a-upload class="info-user"
                                    v-model:file-list="fileList"
                                    :action="`/api/users/${id}`"
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
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-sm-4 text-start text-sm-end"
                                >
                                    <label>
                                        <span class="text-danger me-2">*</span>
                                        <span
                                            :class="{
                                                'text-danger': errors.username,
                                            }"
                                            >Tên tài khoản</span
                                        >
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <a-input
                                        v-model:value="username"
                                        placeholder="Tên tài khoản"
                                        allow-clear
                                    /><br />
                                    <small
                                        v-if="errors.username"
                                        class="text-danger"
                                        >{{ errors.username[0] }}</small
                                    >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-sm-4 text-start text-sm-end"
                                >
                                    <label>
                                        <span class="text-danger me-2">*</span>
                                        <span>Họ và tên</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <a-input
                                        v-model:value="name"
                                        placeholder="Họ và tên"
                                        allow-clear
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-sm-4 text-start text-sm-end"
                                >
                                    <label>
                                        <span class="text-danger me-2">*</span>
                                        <span>Email</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <a-input
                                        v-model:value="email"
                                        placeholder="Email"
                                        allow-clear
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-12 col-sm-4 text-start text-sm-end"
                                ></div>
                                <div class="col-12 col-sm-8">
                                    <a-checkbox
                                        v-model:checked="change_password"
                                    >
                                        Đổi mật khẩu
                                    </a-checkbox>
                                </div>
                            </div>
                            <div
                                class="row mb-3"
                                v-if="change_password === true"
                            >
                                <div
                                    class="col-12 col-sm-4 text-start text-sm-end"
                                >
                                    <label>
                                        <span class="text-danger me-2">*</span>
                                        <span
                                            :class="{
                                                'text-danger': errors.password,
                                            }"
                                            >Mật khẩu</span
                                        >
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <a-input-password
                                        v-model:value="password"
                                        placeholder="Mật khẩu"
                                        allow-clear
                                    /><br />
                                    <small
                                        v-if="errors.password"
                                        class="text-danger"
                                        >{{ errors.password[0] }}</small
                                    >
                                </div>
                            </div>
                            <div
                                class="row mb-3"
                                v-if="change_password === true"
                            >
                                <div
                                    class="col-12 col-sm-4 text-start text-sm-end"
                                >
                                    <label>
                                        <span class="text-danger me-2">*</span>
                                        <span
                                            :class="{
                                                'text-danger':
                                                    errors.password_confirmation,
                                            }"
                                            >Xác nhận mật khẩu</span
                                        >
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <a-input-password
                                        v-model:value="password_confirmation"
                                        placeholder="Xác nhận mật khẩu"
                                        allow-clear
                                    /><br />
                                    <small
                                        v-if="errors.password_confirmation"
                                        class="text-danger"
                                        >{{
                                            errors.password_confirmation[0]
                                        }}</small
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto mt-3"
                        >
                            <a-button class="mb-2 me-sm-2">
                                <router-link :to="{ name: 'thong-tin-nguoi-dung' }">
                                    Hủy
                                </router-link>
                            </a-button>
                            <a-button type="primary" html-type="submit"
                                >Lưu</a-button
                            >
                        </div>
                    </div>
                </a-card>
            </div>
        </div>
    </form>
</template>

<script>
import { UploadOutlined } from '@ant-design/icons-vue';
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRouter } from "vue-router";
import { message } from "ant-design-vue";
import axios from "axios";
export default defineComponent({
    components: {
        UploadOutlined,
    },
    setup() {
        const router = useRouter();
        const fileList = ref([]);
        const users = reactive({
            id: "",
            username: "",
            avatar: "",
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            change_password: false,
        });
        const errors = ref({});

        const getUsers = () => {
            const userData = localStorage.getItem('user');
            if (userData) {
                const userInfo = JSON.parse(userData);
                // if(userInfo.avatar !== null){
                //     userInfo.avatar = userInfo.avatar.replace(/"/g, '');
                // } else {
                //     userInfo.avatar = userInfo.avatar;
                // }
                if (Array.isArray(userInfo.avatar)) {
                    fileList.value = userInfo.avatar.map(img => ({
                        uid: img.id,
                        name: img.name,
                        status: 'done',
                        originFileObj: img.originFileObj,
                        url: `/storage/uploads/users/${img.name}`,
                    }));
                } else {
                    if (userInfo.avatar) {
                        const image = userInfo.avatar;
                        const newImage = image.replace(/^"(.*)"$/, '$1');
                        fileList.value = [{
                            uid: 1,
                            name: newImage,
                            status: 'done',
                            url: `/storage/uploads/users/${newImage}`,
                        }];
                    }
                }
                Object.assign(users, userInfo);

            }
        }

        const updateUser = () => {
            const idUser = users.id;
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
            formData.append('change_password', users.change_password);
            formData.append('password', users.password);
            formData.append('password_confirmation', users.password_confirmation);

            axios
                .post(`http://127.0.0.1:8000/api/info-user/${idUser}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then((res) => {
                    if (res.status == 200) {
                        message.success("Cập nhật thành công");
                        router.push({ name: "thong-tin-nguoi-dung" });
                    }
                })
                .catch((err) => {
                    if (
                        err.response &&
                        err.response.data &&
                        err.response.data.errors
                    ) {
                        errors.value = err.response.data.errors;
                        message.warning("Cập nhật không thành công");
                    }
                });
        };

        const logout = () => {
            axios.post('http://127.0.0.1:8000/api/logout')
            .then(response => {
                localStorage.removeItem('user');
                localStorage.removeItem('role');
                router.push('/').then(() => {
                    window.location.reload();
                    message.success(response.data.message);
                });
            })
            .catch(error => {
                console.log(error);
            });
        }

        getUsers();

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

        return {
            ...toRefs(users),
            fileList,
            errors,
            filterOption,
            beforeUpload,
            handleFileChange,
            updateUser,
            logout,
        };
    },
});
</script>

<style>
    .info-user .ant-upload {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .info-user .ant-upload-list-item {
        border: none !important;
        display: block !important;
        width: 270px !important;
        height: 300px !important;
    }

    .info-user .ant-upload-list-item a img {
        height: 250px !important;
        width: 250px !important;
        border-radius: 50% !important;
    }

    .info-user .ant-upload-list-item span {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .info-user .ant-upload-list-item-actions {
        margin-top: 20px !important;
    }
</style>
