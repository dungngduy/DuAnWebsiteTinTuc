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
                        <a-button type="link" @click="logout()" class="p-0 ms-2">Đăng xất</a-button>
                    </a-menu-item>
                </a-menu>
            </div>
            <div class="col-sm-8">
                <a-card title="Cập nhật tài khoản" style="width: 100%">
                    <div class="row">
                        <div class="col-12 col-sm-6">
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
                            <div
                                class="col-12 d-flex justify-content-center mt-3"
                            >
                                <a-button>
                                    <i class="fa-solid fa-plus"></i>
                                    <span class="ms-2">Chọn ảnh</span>
                                </a-button>
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
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRouter } from "vue-router";
import { message } from "ant-design-vue";
import axios from "axios";
export default defineComponent({
    setup() {
        const router = useRouter();

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
                if(userInfo.avatar !== null){
                    userInfo.avatar = userInfo.avatar.replace(/"/g, '');
                } else {
                    userInfo.avatar = userInfo.avatar;
                }
                Object.assign(users, userInfo);
            }
        }

        const updateUser = () => {
            const idUser = users.id;

            axios
                .put(`http://127.0.0.1:8000/api/users/${idUser}`, users)
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

        return {
            ...toRefs(users),
            errors,
            filterOption,
            updateUser,
            logout,
        };
    },
});
</script>
