<template>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div v-if="news" class="feature-img">
                            <img
                                class="img-fluid"
                                :src="`/storage/uploads/news/${news.image}`"
                                alt=""
                                style="width: 830px; height: 480px;"
                            />
                        </div>
                        <div class="blog_details">
                            <h2>
                                {{ news.title_new }}
                            </h2>
                            <ul v-if="cateOfNew" class="blog-info-link mt-3 mb-4">
                                <li>
                                    <a href="#"
                                        ><i class="fa-solid fa-layer-group"></i> {{ cateOfNew.title }}</a
                                    >
                                </li>
                                <li>
                                    <a href="#"
                                        ><i class="fa fa-comments"></i> 03
                                        Comments</a
                                    >
                                </li>
                            </ul>
                            <p v-for="detail in detailNew" class="excert">
                                {{ detail.main_content }}
                            </p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div
                            class="d-sm-flex justify-content-between text-center"
                        >
                            <ul class="social-icons">
                                <li>
                                    <a href="#"
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><i class="fab fa-dribbble"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><i class="fab fa-behance"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>05 Comments</h4>
                        <div class="comment-list">
                            <div
                                class="single-comment justify-content-between d-flex"
                            >
                                <div
                                    class="user justify-content-between d-flex"
                                >
                                    <div class="thumb">
                                        <img
                                            src="/assets/img/comment/comment_1.png"
                                            alt=""
                                        />
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            Multiply sea night grass fourth day
                                            sea lesser rule open subdue female
                                            fill which them Blessed, give fill
                                            lesser bearing multiply sea night
                                            grass fourth day sea lesser
                                        </p>
                                        <div
                                            class="d-flex justify-content-between"
                                        >
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <h5>
                                                    <a href="#">Emilly Blunt</a>
                                                </h5>
                                                <p class="date">
                                                    December 4, 2017 at 3:12 pm
                                                </p>
                                            </div>
                                            <div class="reply-btn">
                                                <a
                                                    href="#"
                                                    class="btn-reply text-uppercase"
                                                    >reply</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div
                                class="single-comment justify-content-between d-flex"
                            >
                                <div
                                    class="user justify-content-between d-flex"
                                >
                                    <div class="thumb">
                                        <img
                                            src="/assets/img/comment/comment_2.png"
                                            alt=""
                                        />
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            Multiply sea night grass fourth day
                                            sea lesser rule open subdue female
                                            fill which them Blessed, give fill
                                            lesser bearing multiply sea night
                                            grass fourth day sea lesser
                                        </p>
                                        <div
                                            class="d-flex justify-content-between"
                                        >
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <h5>
                                                    <a href="#">Emilly Blunt</a>
                                                </h5>
                                                <p class="date">
                                                    December 4, 2017 at 3:12 pm
                                                </p>
                                            </div>
                                            <div class="reply-btn">
                                                <a
                                                    href="#"
                                                    class="btn-reply text-uppercase"
                                                    >reply</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div
                                class="single-comment justify-content-between d-flex"
                            >
                                <div
                                    class="user justify-content-between d-flex"
                                >
                                    <div class="thumb">
                                        <img
                                            src="/assets/img/comment/comment_3.png"
                                            alt=""
                                        />
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            Multiply sea night grass fourth day
                                            sea lesser rule open subdue female
                                            fill which them Blessed, give fill
                                            lesser bearing multiply sea night
                                            grass fourth day sea lesser
                                        </p>
                                        <div
                                            class="d-flex justify-content-between"
                                        >
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <h5>
                                                    <a href="#">Emilly Blunt</a>
                                                </h5>
                                                <p class="date">
                                                    December 4, 2017 at 3:12 pm
                                                </p>
                                            </div>
                                            <div class="reply-btn">
                                                <a
                                                    href="#"
                                                    class="btn-reply text-uppercase"
                                                    >reply</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Bình luận</h4>
                        <form
                            class="form-contact comment_form"
                            action="#"
                            id="commentForm"
                        >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea
                                            class="form-control w-100"
                                            name="comment"
                                            id="comment"
                                            cols="30"
                                            rows="9"
                                            placeholder="Bình luận bài viết"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button
                                    type="submit"
                                    class="button button-contactForm btn_1 boxed-btn"
                                >
                                    Gửi bình luận
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
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
                                            src="/assets/img/post/post_5.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="/assets/img/post/post_6.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="/assets/img/post/post_7.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="/assets/img/post/post_8.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="/assets/img/post/post_9.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                            class="img-fluid"
                                            src="/assets/img/post/post_10.png"
                                            alt=""
                                        />
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { ref, defineComponent, watch } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';

export default defineComponent({
    setup(){
        const route = useRoute();
        const news = ref([]);
        const cateOfNew = ref([]);
        const detailNew = ref([]);
        const categories = ref([]);
        const newsRecent = ref([]);

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

        const getDetailNew = (idNew) => {
            axios.get(`http://127.0.0.1:8000/api/getDetailNew/${idNew}`)
            .then(res => {
                if(res.data.new.image) {
                    res.data.new.image = res.data.new.image.replace(/"/g, '');
                }
                news.value = res.data.new;
                detailNew.value = res.data.detailNew;
                cateOfNew.value = res.data.new.category;
            })
            .catch(errors => {
                console.log(errors);
            });
        }

        watch(route, (newRoute) => {
            const idNew = newRoute.params.id;
            getDetailNew(idNew);
        });

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

        getAllCategories();
        getRecentNews();
        getDetailNew(route.params.id);

        return {
            news,
            detailNew,
            cateOfNew,
            format,

            categories,
            newsRecent,
        }
    }
})
</script>
