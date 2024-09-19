<template>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <header v-if="user">
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">
                <div
                    class="header-top black-bg d-none d-md-block"
                    style="height: 40px"
                >
                    <div class="container">
                        <div class="col-xl-12 p-0">
                            <div
                                class="row d-flex justify-content-between align-items-center"
                            >
                                <div
                                    class="header-info-left col-sm-10 d-flex align-items-center justify-content-center justify-content-sm-start"
                                >
                                    <ul>
                                        <li>
                                            <i
                                                class="fa-regular fa-envelope"
                                            ></i>
                                            nguyenduydung1809@gmail.com
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-phone"></i>
                                            0376 318 876
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="header-info-right col-sm-2 d-none d-sm-flex align-items-center justify-content-sm-end"
                                >
                                    <ul class="header-social">
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-twitter"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-instagram"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i
                                                    class="fab fa-pinterest-p"
                                                ></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="/"
                                        ><img
                                            src="/assets/img/logo/logo.png"
                                            alt=""
                                    /></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right">
                                    <img
                                        src="/assets/img/hero/header_card.jpg"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky" style="height: 100px">
                    <div class="container">
                        <div class="row align-items-center">
                            <div
                                class="col-xl-10 col-lg-10 col-md-12 header-flex"
                                style="height: 100px;"
                            >
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="/"
                                        ><img
                                            src="/assets/img/logo/logo.png"
                                            alt=""
                                    /></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li>
                                                <a href="/">Trang chủ</a>
                                            </li>
                                            <li>
                                                <a href="/gioi-thieu">Giới thiệu</a>
                                            </li>
                                            <li>
                                                <a href="/danh-muc">Danh mục bài viết</a>
                                                <ul class="submenu">
                                                    <li v-for="category in categories" :key="category.id">
                                                        <router-link :to="`/danh-muc`">{{ category.title }}</router-link>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    >Tin nổi bật</a
                                                >
                                            </li>
                                            <li>
                                                <a href="contact.html"
                                                    >Liên hệ</a
                                                >
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="icon-user f-right">
                                    <router-link :to="'/thong-tin-nguoi-dung'">
                                        <a-button v-if="user.avatar !== null" type="link" class="pe-0 pt-0">
                                            <img :src="`/storage/uploads/users/${user.avatar}`" alt="Avatar" style="border-radius: 50%; height: 30px; width: 30px;">
                                        </a-button>
                                        <a-button v-else type="link" class="pe-0 pt-0">
                                            <img src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg"
                                            alt="Avatar" style="border-radius: 50%; height: 30px; width: 30px;">
                                        </a-button>
                                    </router-link>
                                </div>
                                <div
                                    class="header-right-btn f-right d-none d-lg-block"
                                >
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="#">
                                            <input
                                                type="text"
                                                placeholder="Search"
                                            />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div
                                    class="mobile_menu d-block d-md-none"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <header v-else>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">
                <div
                    class="header-top black-bg d-none d-md-block"
                    style="height: 40px"
                >
                    <div class="container">
                        <div class="col-xl-12 p-0">
                            <div
                                class="row d-flex justify-content-between align-items-center"
                            >
                                <div
                                    class="header-info-left col-sm-10 d-flex align-items-center justify-content-center justify-content-sm-start"
                                >
                                    <ul>
                                        <li>
                                            <i
                                                class="fa-regular fa-envelope"
                                            ></i>
                                            nguyenduydung1809@gmail.com
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-phone"></i>
                                            0376 318 876
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="header-info-right col-sm-2 d-none d-sm-flex align-items-center justify-content-sm-end"
                                >
                                    <ul class="header-social">
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-twitter"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-instagram"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i
                                                    class="fab fa-pinterest-p"
                                                ></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="/"
                                        ><img
                                            src="/assets/img/logo/logo.png"
                                            alt=""
                                    /></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right">
                                    <img
                                        src="/assets/img/hero/header_card.jpg"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky" style="height: 100px">
                    <div class="container">
                        <div class="row align-items-center">
                            <div
                                class="col-xl-10 col-lg-10 col-md-12 header-flex"
                            >
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="/"
                                        ><img
                                            src="/assets/img/logo/logo.png"
                                            alt=""
                                    /></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li>
                                                <a href="/">Trang chủ</a>
                                            </li>
                                            <li>
                                                <a href="/gioi-thieu">Giới thiệu</a>
                                            </li>
                                            <li>
                                                <a href="/danh-muc">Danh mục bài viết</a>
                                                <ul class="submenu">
                                                    <li v-for="category in categories" :key="category.id">
                                                        <router-link :to="`/danh-muc`">{{ category.title }}</router-link>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    >Tin nổi bật</a
                                                >
                                            </li>
                                            <li>
                                                <a href="/lien-he"
                                                    >Liên hệ</a
                                                >
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="icon-user f-right ms-2" style="cursor: pointer;">
                                    <i @click="openLoginPopup" class="fa-solid fa-user"></i>
                                </div>
                                <div
                                    class="header-right-btn f-right d-none d-lg-block"
                                >
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="#">
                                            <input
                                                type="text"
                                                placeholder="Search"
                                            />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div
                                    class="mobile_menu d-block d-md-none"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <LoginPopup ref="loginPopup"></LoginPopup>
</template>

<script>
import LoginPopup from "../../pages/user/login/login.vue";
import { ref } from 'vue';

export default {
    data() {
        return {
            user: null,
            categories: ref([]),
        };
    },
    components: {
        LoginPopup,
    },
    methods: {
        openLoginPopup() {
            this.$refs.loginPopup.openPopup();
        },

        getAllCategories() {
            axios.get(`http://127.0.0.1:8000/api/getAllCategories`)
            .then(res => {
                this.categories = res.data;
            })
            .catch(errors => {
                console.log(errors);
            });
        },

        loadUser() {
            const userData = localStorage.getItem('user');
            if (userData) {
                const userInfo = JSON.parse(userData);
                if(userInfo.avatar !== null){
                    userInfo.avatar = userInfo.avatar.replace(/"/g, '');
                } else {
                    userInfo.avatar = userInfo.avatar;
                }
                this.user = userInfo;

            }
        }
    },
    mounted() {
        this.loadUser();
        this.getAllCategories();
    }
};
</script>
