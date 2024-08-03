<template>
    <div class="popup" v-if="showPopup" @click.self="closePopupForgetPassword">
        <div class="popup-content">
            <span class="close" @click="closePopupForgetPassword">&times;</span>
            <div class="left-section">
                <img src="https://bugnetproject.com/wp-content/uploads/2020/08/post-thumb-tinh-nang-website-tin-tuc.jpg" alt="Login Image"/>
            </div>
            <div class="right-section">
                <h2>Quên mật khẩu</h2>
                <p>Điền email gắn với tài khoản của bạn để nhận thông báo mật khẩu qua Gmail nhé. Xin cảm ơn!</p>
                <form @submit.prevent="sendRequestMail">
                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input
                            type="email"
                            id="email"
                            v-model="email"
                        />
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <a-button html-type="submit">Gửi thông tin</a-button>
                    </div>
                    <div class="forget-pass">
                        <a href="/">Quay lại đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { message } from 'ant-design-vue';

export default {
    data() {
        return {
            showPopup: false,
            email: "",
        };
    },

    methods: {
        openPopupForgetPassword(e) {
            this.showPopup = true;
            if (e && e.target && !this.$el.contains(e.target)) {
                this.closePopupForgetPassword();
            }
        },
        closePopupForgetPassword() {
            this.showPopup = false;
        },

        sendRequestMail() {
            axios.post(`http://127.0.0.1:8000/api/send-mail`, { email: this.email })
            .then(res => {
                // console.log(res);
                if (res.status == 200) {
                    message.success(res.data.message);
                    this.closePopupForgetPassword();
                }
            })
            .catch(errors => {
                if (errors.response) {
                    message.destroy(errors.response.data.message);
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
