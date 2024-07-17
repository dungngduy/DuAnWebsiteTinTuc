<template>
    <div class="popup" v-if="showPopup" @click.self="closePopup">
        <div class="popup-content">
            <span class="close" @click="closePopup">&times;</span>
            <div class="left-section">
                <img src="https://bugnetproject.com/wp-content/uploads/2020/08/post-thumb-tinh-nang-website-tin-tuc.jpg" alt="Login Image"/>
            </div>
            <div class="right-section">
                <h2>Đăng nhập</h2>
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập:</label>
                        <input
                            type="text"
                            id="username"
                            v-model="username"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input
                            type="password"
                            id="password"
                            v-model="password"
                            required
                        />
                    </div>
                    <div class="forget-password">
                        <a @click="openForgetPasswordPopup" href="#">Quên mật khẩu</a>
                    </div>
                    <div class="form-actions">
                        <button type="submit">Đăng nhập</button>
                    </div>
                </form>
                <div class="register-link">
                    <p>Bạn chưa có tài khoản? <a @click="openRegisterPopup" href="#">Đăng ký ngay</a></p>
                </div>
            </div>
        </div>
    </div>
    <RegisterPopup ref="registerPopup"></RegisterPopup>
    <ForgetPasswordPopup ref="forgetPasswordPopup"></ForgetPasswordPopup>
</template>

<script>
import RegisterPopup from "../login/register.vue";
import ForgetPasswordPopup from "../login/forget-password.vue";

export default {
    data() {
        return {
            showPopup: false,
            username: "",
            password: "",
        };
    },

    components: {
        RegisterPopup,
        ForgetPasswordPopup,
    },

    methods: {
        openPopup(event) {
            this.showPopup = true;
            if (event && event.target && !this.$el.contains(event.target)) {
                this.closePopup();
            }
        },

        closePopup() {
            this.showPopup = false;
        },

        openRegisterPopup() {
            this.$refs.registerPopup.openPopupRegister();
        },

        openForgetPasswordPopup() {
            this.$refs.forgetPasswordPopup.openPopupForgetPassword();
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
    height: 400px;
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

.form-actions {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
}

button:hover {
    opacity: 0.8;
}

.register-link {
    margin-top: 20px;
    text-align: center;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
}

.forget-password {
    display: flex;
    justify-content: right;
    align-items: center;
}

.forget-password a {
    color: #007bff;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

.forget-password a:hover {
    text-decoration: underline;
}
</style>
