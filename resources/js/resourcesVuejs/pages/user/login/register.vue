<template>
    <div class="popup" v-if="showPopup" @click.self="closePopupRegister">
        <div class="popup-content">
            <span class="close" @click="closePopupRegister">&times;</span>
            <div class="left-section">
                <img src="https://bugnetproject.com/wp-content/uploads/2020/08/post-thumb-tinh-nang-website-tin-tuc.jpg" alt="Login Image"/>
            </div>
            <div class="right-section">
                <h2>Đăng ký</h2>
                <form @submit.prevent="register">
                    <div class="form-group">
                        <label for="username">
                            <span :class="{ 'text-danger': errors.username }">Tên đăng nhập:</span>
                        </label>
                        <input
                            type="text"
                            id="username"
                            v-model="username"
                        /><br>
                        <small v-if="errors.username" class="text-danger">{{ errors.username[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="username">
                            <span :class="{ 'text-danger': errors.email }">Email:</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            v-model="email"
                        /><br>
                        <small v-if="errors.email" class="text-danger">{{ errors.email[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <span :class="{ 'text-danger': errors.password }">Mật khẩu:</span>
                        </label>
                        <input
                            type="password"
                            id="password"
                            v-model="password"
                        /><br>
                        <small v-if="errors.password" class="text-danger">{{ errors.password[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <span :class="{ 'text-danger': errors.password_confirmation }">Xác nhận mật khẩu:</span>
                        </label>
                        <input
                            type="password"
                            id="password_confirmation"
                            v-model="password_confirmation"
                        /><br>
                        <small v-if="errors.password_confirmation" class="text-danger">{{ errors.password_confirmation[0] }}</small>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <a-button html-type="submit">Đăng ký</a-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { message } from 'ant-design-vue';
import axios from "axios";
export default {
    data() {
        return {
            showPopup: false,
            username: "",
            email: "",
            password: "",
            password_confirmation: "",
            errors: [],
        };
    },
    methods: {
        openPopupRegister(e) {
            this.showPopup = true;
            if (e && e.target && !this.$el.contains(e.target)) {
                this.closePopupRegister();
            }
        },

        closePopupRegister() {
            this.showPopup = false;
        },

        register() {
            const newUser = {
                username: this.username,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            };
            axios.post('http://127.0.0.1:8000/api/register', newUser)
            .then(res => {
                message.success(res.data.message);
                this.closePopupRegister();
                this.username = '';
                this.email = '';
                this.password = '';
                this.password_confirmation = '';
            })
            .catch(err => {
                if (err.response && err.response.data && err.response.data.errors) {
                    this.errors = err.response.data.errors
                    message.warning('Tạo mới không thành công');
                }
            })
        },
    },
};
</script>

<style scoped>
.popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.popup-content {
    position: relative;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    max-width: 800px;
    width: 80%;
    display: flex;
    overflow: hidden;
}

.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
}

.left-section {
    flex: 1;
    width: 340px;
    min-height: 400px;
    padding-right: 20px;
}

.left-section img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    object-fit: cover;
}

.right-section {
    flex: 1;
    /* padding-left: 20px; */
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-size: 16px;
    margin-bottom: 5px;
}

input {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
}
</style>
