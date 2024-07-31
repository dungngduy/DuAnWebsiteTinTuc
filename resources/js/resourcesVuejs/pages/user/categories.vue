<template>
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div v-if="news.length" class="blog_left_sidebar">
                        <article v-for="(item, index) in news" :key="index" class="blog_item">
                            <div class="blog_item_img">
                                <img
                                    class="card-img rounded-0"
                                    :src="`/storage/uploads/news/${item.image}`"
                                    alt=""
                                />
                                <a href="#" class="blog_item_date">
                                    <router-link :to="{ name: 'chi-tiet-bai-viet', params: {id: item.id} }">
                                        <p>{{ format(item.created_at) }}</p>
                                    </router-link>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a
                                    class="d-inline-block"
                                    href="#"
                                >
                                    <router-link :to="{ name: 'chi-tiet-bai-viet', params: {id: item.id} }">
                                        <h2>{{ item.title_new }}</h2>
                                    </router-link>
                                </a>
                                <p>
                                    {{ item.short_content }}
                                </p>
                                <ul class="blog-info-link">
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-layer-group"></i>
                                            <router-link :to="{ name: 'chi-tiet-bai-viet', params: {id: item.id} }">{{ item.title }}</router-link>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-comments"></i>
                                            <router-link :to="{ name: 'chi-tiet-bai-viet', params: {id: item.id} }">03 Comments</router-link>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </article>

                        <nav
                            class="blog-pagination justify-content-center d-flex"
                        >
                            <ul class="pagination">
                                <a-pagination
                                    :current="current"
                                    :page-size="pageSize"
                                    :total="totalNew"
                                    @change="handlePageChange"
                                    @showSizeChange="handlePageSizeChange"
                                />
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Tìm kiếm bài viết"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Tìm kiếm bài viết'"
                                        />
                                        <div class="input-group-append">
                                            <button class="btns" type="button">
                                                <i class="ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"
                                    type="submit"
                                >
                                    Tìm kiếm
                                </button>
                            </form>
                        </aside>

                        <aside
                            class="single_sidebar_widget post_category_widget"
                        >
                            <h4 class="widget_title">Danh mục bài viết</h4>
                            <ul class="list cat-list">
                                <li v-for="category in categories" :key="category.id">
                                    <a href="#" class="d-flex" @click.prevent="searchProductsByCategory(category.id)">
                                        <p class="me-1">{{ category.title }}</p>
                                        <p>({{ category.new_count }})</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>

                        <aside
                            class="single_sidebar_widget popular_post_widget"
                        >
                            <h3 class="widget_title">Bài viết gần đây</h3>
                            <div v-for="(item, index) in newsRecent" :key="index" class="media post_item">
                                <img
                                    :src="`/storage/uploads/news/${item.image}`"
                                    alt="post"
                                    style="width: 80px; height: 80px; object-fit: cover;"
                                />
                                <div class="media-body">
                                    <a href="#">
                                        <router-link :to="{ name: 'chi-tiet-bai-viet', params: {id: item.id} }">
                                            <h3>{{ item.title_new }}</h3>
                                        </router-link>
                                    </a>
                                    <p>{{ format(item.created_at) }}</p>
                                </div>
                            </div>
                        </aside>

                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Bảng tin Instagram</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="assets/img/post/post_5.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="assets/img/post/post_6.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="assets/img/post/post_7.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="assets/img/post/post_8.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="assets/img/post/post_9.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="assets/img/post/post_10.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Bản tin</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input
                                        type="email"
                                        class="form-control"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Nhập email của bạn'"
                                        placeholder="Nhập email của bạn"
                                        required
                                    />
                                </div>
                                <button
                                    class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"
                                    type="submit"
                                >
                                    Đăng ký
                                </button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { ref, defineComponent } from 'vue';
import axios from 'axios';

export default defineComponent({
    setup(){
        const news = ref([]);
        const totalNew = ref(0);
        const pageSize = ref(4);
        const current = ref(1);
        const categories = ref([]);
        const selectedCategory = ref(null);
        const newsRecent = ref([]);

        const getAllNews = (page, pageSize, category_id = null) => {
            axios.get(`http://127.0.0.1:8000/api/getAllNews`, {
                params: {
                    page: page,
                    pageSize: pageSize,
                    category_id: category_id
                }
            })
            .then(res => {
                const processedNews = res.data.news.map(item => ({
                    ...item,
                    image: item.image.replace(/"/g, '')
                }));

                news.value = processedNews;
                totalNew.value = res.data.totalNew;
            })
            .catch(errors => {
                console.log(errors);
            });
        };

        const getAllCategories = () => {
            axios.get(`http://127.0.0.1:8000/api/getAllCategories`)
            .then(res => {
                categories.value = res.data;
            })
            .catch(errors => {
                console.log(errors);
            });
        }

        const getRecentNews = () => {
            axios.get(`http://127.0.0.1:8000/api/getNewsRecent`)
            .then(res => {
                const processedNews = res.data.map(item => ({
                    ...item,
                    image: item.image.replace(/"/g, '')
                }));

                newsRecent.value = processedNews;
            })
            .catch(errors => {
                console.log(errors);
            });
        }

        function format(inputDate) {
            var date = new Date(inputDate);
            if (!isNaN(date.getTime())) {
                var formattedDate = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' +
                                    ((date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1)) + '/' +
                                    date.getFullYear();

                return formattedDate;
            } else {
                return 'Invalid Date';
            }
        }

        const searchProductsByCategory = (categoryId) => {
            selectedCategory.value = categoryId;
            current.value = 1;
            getAllNews(1, pageSize.value, categoryId);
        };

        const handlePageChange = (page) => {
            current.value = page;
            getAllNews(page, pageSize.value, selectedCategory.value); // Cập nhật danh sách bài viết khi thay đổi trang
        };

        const handlePageSizeChange = (current, size) => {
            pageSize.value = size;
            getAllNews(current, size, selectedCategory.value); // Cập nhật danh sách bài viết khi thay đổi kích thước trang
        };

        getAllNews();
        getAllCategories();
        getRecentNews();

        return {
            news,
            format,
            current,
            pageSize,
            totalNew,
            handlePageChange,
            handlePageSizeChange,
            searchProductsByCategory,

            categories,
            newsRecent,
        }
    }
})
</script>
