<template>
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Xu hướng mới</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div v-for="(item, index) in newsTrendingTop" class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img
                                        :src="`/storage/uploads/news/${item.image}`"
                                        alt=""
                                    />
                                    <div class="trend-top-cap">
                                        <span>{{ item.title }}</span>
                                        <h2 style="width: 500px;">
                                            <a href="#">
                                                {{ item.title_new }}
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    <div v-for="(item, index) in newsTrendingBottom" class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img
                                                    :src="`/storage/uploads/news/${item.image}`"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1"
                                                    >{{ item.title }}</span
                                                >
                                                <h4>
                                                    <a href="#">
                                                        {{ item.title_new }}
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            <div v-for="(item, index) in newsTrendingRight" class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img
                                        :src="`/storage/uploads/news/${item.image}`"
                                        alt=""
                                        style="width: 120px; height: 100px;"
                                    />
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">{{ item.title }}</span>
                                    <h4>
                                        <a href="#">
                                            {{ item.title_new }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Bài viết nổi bật trong tuần</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div
                                class="weekly-news-active dot-style d-flex dot-style"
                            >
                                <div v-for="(item, index) in newsPopularOnWeek" class="weekly-single">
                                    <div class="weekly-img">
                                        <img
                                            :src="`/storage/uploads/news/${item.image}`"
                                            alt=""
                                            style="width: 294px; height: 300px;"
                                        />
                                    </div>
                                    <div class="weekly-caption">
                                        <span class="color1">{{ item.title }}</span>
                                        <h4>
                                            <a href="#">
                                                {{ item.title_new }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Bài viết mới</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div
                                            class="nav nav-tabs"
                                            id="nav-tab"
                                            role="tablist"
                                        >
                                            <a
                                                class="nav-item nav-link active"
                                                id="nav-home-tab"
                                                data-toggle="tab"
                                                href="#nav-home"
                                                role="tab"
                                                aria-controls="nav-home"
                                                aria-selected="true"
                                                >Tất cả</a
                                            >
                                            <a
                                                v-for="(item, catIndex) in newsCategories"
                                                :key="catIndex"
                                                class="nav-item nav-link"
                                                :id="`nav-tab-${catIndex}`"
                                                data-toggle="tab"
                                                :href="`#nav-content-${catIndex}`"
                                                role="tab"
                                                :aria-controls="`nav-content-${catIndex}`"
                                                aria-selected="false"
                                                >{{ item.title }}</a
                                            >
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div
                                        class="tab-pane fade show active"
                                        id="nav-home"
                                        role="tabpanel"
                                        aria-labelledby="nav-home-tab"
                                    >
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div v-for="(item, index) in newsCategoriesNewHomeTab" class="col-lg-6 col-md-6">
                                                    <div
                                                        class="single-what-news mb-100"
                                                    >
                                                        <div class="what-img">
                                                            <img
                                                                :src="`/storage/uploads/news/${item.image}`"
                                                                alt=""
                                                                style="width: 408px; height: 380px;"
                                                            />
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">{{ item.title }}</span>
                                                            <h4>
                                                                <a href="#">
                                                                    {{ item.title_new }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card two -->
                                    <div
                                        v-for="(category, catIndex) in news"
                                        :key="catIndex"
                                        :id="`nav-content-${catIndex}`"
                                        class="tab-pane fade"
                                        role="tabpanel"
                                        :aria-labelledby="`nav-tab-${catIndex}`"
                                    >
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div v-for="(item, index) in category.news" :key="index" class="col-lg-6 col-md-6">
                                                    <div
                                                        class="single-what-news mb-100"
                                                    >
                                                        <div class="what-img">
                                                            <img
                                                                :src="`/storage/uploads/news/${item.image}`"
                                                                alt=""
                                                                style="width: 408px; height: 380px;"
                                                            />
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">{{ category.title_cate }}</span>
                                                            <h4>
                                                                <a href="#">{{ item.title }}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Theo dõi chúng tôi</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <div
                                    class="follow-us d-flex align-items-center"
                                >
                                    <div class="follow-social">
                                        <a href="#"
                                            ><img
                                                src="assets/img/news/icon-fb.png"
                                                alt=""
                                        /></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>10,266</span>
                                        <p>Người hâm mộ</p>
                                    </div>
                                </div>
                                <div
                                    class="follow-us d-flex align-items-center"
                                >
                                    <div class="follow-social">
                                        <a href="#"
                                            ><img
                                                src="assets/img/news/icon-tw.png"
                                                alt=""
                                        /></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>1,306</span>
                                        <p>Người hâm mộ</p>
                                    </div>
                                </div>
                                <div
                                    class="follow-us d-flex align-items-center"
                                >
                                    <div class="follow-social">
                                        <a href="#"
                                            ><img
                                                src="assets/img/news/icon-ins.png"
                                                alt=""
                                        /></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>2,138</span>
                                        <p>Người hâm mộ</p>
                                    </div>
                                </div>
                                <div
                                    class="follow-us d-flex align-items-center"
                                >
                                    <div class="follow-social">
                                        <a href="#"
                                            ><img
                                                src="assets/img/news/icon-yo.png"
                                                alt=""
                                        /></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>6,048</span>
                                        <p>Người hâm mộ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block">
                            <img src="assets/img/news/news_card.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->

        <!--  Recent Articles start -->
        <div class="recent-articles mt-5">
            <div class="container">
                <div class="recent-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Các bài viết gần đây</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div
                                class="recent-active dot-style d-flex dot-style"
                            >
                                <div v-for="(item, index) in newsRecent" :key="index" class="single-recent mb-100">
                                    <div class="what-img">
                                        <img
                                            :src="`/storage/uploads/news/${item.image}`"
                                            alt=""
                                            style="width: 294px; height: 300px;"
                                        />
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">{{ item.title }}</span>
                                        <h4>
                                            <a href="#">{{ item.title_new }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Recent Articles End -->
        <!--Start pagination -->
        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item">
                                        <a class="page-link" href="#"
                                            ><span
                                                class="flaticon-arrow roted"
                                            ></span
                                        ></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">01</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">02</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">03</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"
                                            ><span
                                                class="flaticon-arrow right-arrow"
                                            ></span
                                        ></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End pagination  -->
    </main>
</template>

<script>
import { ref, defineComponent } from 'vue';
import axios from 'axios';

export default defineComponent({
    setup(){
        const newsTrendingTop = ref([]);
        const newsTrendingBottom = ref([]);
        const newsTrendingRight = ref([]);
        const newsPopularOnWeek = ref([]);
        const newsCategoriesNewHomeTab = ref([]);
        const newsCategories = ref([]);
        const news = ref([]);
        const newsRecent = ref([]);

        const getTrendingTopNews = () => {
            axios.get(`http://127.0.0.1:8000/api/getTrendingTopNews`)
            .then(res => {
                const processedNews = res.data.map(item => ({
                        ...item,
                        image: item.image.replace(/"/g, '')
                    }));

                    newsTrendingTop.value = processedNews;
            })
            .catch(errors => {
                console.log(errors);
            })
        }

        const getTrendingBottomNews = () => {
            axios.get(`http://127.0.0.1:8000/api/getTrendingBottomNews`)
            .then(res => {
                const processedNews = res.data.map(item => ({
                        ...item,
                        image: item.image.replace(/"/g, '')
                    }));

                    newsTrendingBottom.value = processedNews;
            })
            .catch(errors => {
                console.log(errors);
            })
        }

        const getTrendingRightNews = () => {
            axios.get(`http://127.0.0.1:8000/api/getTrendingRightNews`)
            .then(res => {
                const processedNews = res.data.map(item => ({
                        ...item,
                        image: item.image.replace(/"/g, '')
                    }));

                    newsTrendingRight.value = processedNews;
            })
            .catch(errors => {
                console.log(errors);
            })
        }

        const getPopularOnWeekNews = () => {
            axios.get(`http://127.0.0.1:8000/api/getPopularOnWeekNews`)
            .then(res => {
                const processedNews = res.data.map(item => ({
                        ...item,
                        image: item.image.replace(/"/g, '')
                    }));

                    newsPopularOnWeek.value = processedNews;
            })
            .catch(errors => {
                console.log(errors);
            })
        }

        const getCategoriesNewsHomeTab = () => {
            axios.get(`http://127.0.0.1:8000/api/getCategoriesNewsHomeTab`)
            .then(res => {
                const processedNews = res.data.map(item => ({
                        ...item,
                        image: item.image.replace(/"/g, '')
                    }));

                    newsCategoriesNewHomeTab.value = processedNews;
            })
            .catch(errors => {
                console.log(errors);
            })
        }

        const getCategoriesNews = () => {
            axios.get(`http://127.0.0.1:8000/api/getCategoriesNews`)
            .then(res => {
                const processedCategories = res.data.categories.map(item => ({
                        id: item.category.id,
                        title: item.category.title,
                    }));
                const processedNews = res.data.categories.map(item => ({
                        title_cate: item.category.title,
                        news: item.news.map(newsItem => ({
                            id: newsItem.id,
                            title: newsItem.title_new,
                            image: newsItem.image.replace(/"/g, ''),
                            category_id: newsItem.category_id
                        }))
                    }));

                newsCategories.value = processedCategories;
                news.value = processedNews;
            })
            .catch(errors => {
                console.log(errors);
            })
        }

        const getNewsRecent = () => {
            axios.get(`http://127.0.0.1:8000/api/getCategoriesNewsHomeTab`)
            .then(res => {
                const processedNews = res.data.map(item => ({
                        ...item,
                        image: item.image.replace(/"/g, '')
                    }));

                    newsRecent.value = processedNews;
            })
            .catch(errors => {
                console.log(errors);
            })
        }

        getTrendingTopNews();
        getTrendingBottomNews();
        getTrendingRightNews();
        getPopularOnWeekNews();
        getCategoriesNewsHomeTab();
        getCategoriesNews();
        getNewsRecent();

        return {
            newsTrendingTop,
            newsTrendingBottom,
            newsTrendingRight,
            newsPopularOnWeek,
            newsCategories,
            newsCategoriesNewHomeTab,
            news,
            newsRecent,
        }
    }
})
</script>
