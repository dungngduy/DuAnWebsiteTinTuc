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
                        <label for="username">Tên đăng nhập:</label>
                        <input
                            type="text"
                            id="username"
                            v-model="username"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input
                            type="email"
                            id="email"
                            v-model="email"
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
                    <div class="form-group">
                        <label for="password">Xác nhận mật khẩu:</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            v-model="password_confirmation"
                            required
                        />
                    </div>
                    <div class="form-actions">
                        <button type="submit">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showPopup: false,
            username: "",
            email: "",
            password: "",
            password_confirmation: ""
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
</style>
