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
                                    <a href="#">
                                        <i class="fa fa-comments"></i>
                                        {{ countComment > 0 ? (countComment < 10 ? `0${countComment}` : countComment) : '0' }} bình luận
                                    </a>
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
                        <h4>{{ countComment > 0 ? (countComment < 10 ? `0${countComment}` : countComment) : '0' }} bình luận</h4>
                        <div v-for="comment in getDataComment" :key="comment.id" class="comment-list">
                            <div
                                class="single-comment justify-content-between d-flex"
                            >
                                <div
                                    class="user justify-content-between d-flex"
                                >
                                    <div class="thumb">
                                        <img
                                            :src="`/storage/uploads/users/${findUserAvatar(comment.user_id)}`"
                                            alt=""
                                            style="width: 70px; height: 70px; border-radius: 50%;"
                                        />
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            {{ comment.content }}
                                        </p>
                                        <div
                                            class="d-flex justify-content-between"
                                        >
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <h5>
                                                    <a href="#">{{ findUserName(comment.user_id) }}</a>
                                                </h5>
                                                <p class="date">
                                                    {{ format(comment.created_at) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>BÌNH LUẬN</h4>
                        <form
                            class="form-contact comment_form"
                            @submit.prevent="comments"
                            id="commentForm"
                            v-if="user.id"
                        >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea
                                            v-model="content"
                                            class="form-control w-100"
                                            name="comment"
                                            id="comment"
                                            cols="30"
                                            rows="9"
                                            placeholder="Chia sẻ ý kiến của bạn...."
                                        ></textarea>
                                    </div>
                                    <small v-if="errors.content" class="text-danger">{{ errors.content[0] }}</small>
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
                        <span v-else class="text-danger">Hãy đăng nhập để có thể chia sẻ ý kiến của bạn!</span>
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
import { ref, reactive, toRefs, defineComponent, watch } from 'vue';
import axios from 'axios';
import { message } from 'ant-design-vue';
import { useRoute } from 'vue-router';

export default defineComponent({
    setup(){
        const route = useRoute();
        const news = ref([]);
        const cateOfNew = ref([]);
        const detailNew = ref([]);
        const categories = ref([]);
        const newsRecent = ref([]);
        const user = reactive({
            id: "",
            username: "",
            avatar: "",
            name: "",
            email: "",
        });
        const comment = reactive({
            content: "",
            new_id: route.params.id,
            user_id: user.id,
        });
        const getDataComment = ref([]);
        const getDataUserComment = ref({});
        const countComment = ref("");
        const errors = ref({});

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
                countComment.value = res.data.count;
                getComments();
            })
            .catch(errors => {
                console.log(errors);
            });
        }

        const getUsers = () => {
            const userData = localStorage.getItem('user');
            if (userData) {
                const userInfo = JSON.parse(userData);

                if (userInfo.avatar) {
                    userInfo.avatar = userInfo.avatar.replace(/"/g, '');
                } else {
                    userInfo.avatar = userInfo.avatar;
                }
                Object.assign(user, userInfo);

            }
        }


        const comments = () => {
            const formData = new FormData();
            formData.append('content', comment.content);
            formData.append('new_id', comment.new_id);
            formData.append('user_id', comment.user_id);

            axios.post(`http://127.0.0.1:8000/api/comments`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(res => {
                if(res.status == 200) {
                    message.success('Bình luận đã được gửi đi');
                    comment.content = '';
                    getComments();
                }

            })
            .catch(err => {
                if (err.response && err.response.data && err.response.data.errors) {
                    errors.value = err.response.data.errors;
                }
            });
        }

        const getComments = () => {
            const idNew = route.params.id;
            axios.get(`http://127.0.0.1:8000/api/getComments/${idNew}`)
            .then(res => {
                const data = res.data;
                if (Array.isArray(data)) {
                    // Duyệt qua từng phần tử của mảng dữ liệu
                    getDataComment.value = data;

                    data.forEach(item => {
                        if (item.user) {
                            item.user.avatar = item.user.avatar.replace(/"/g, '');
                        }
                    });

                    getDataUserComment.value = data.map(item => item.user);
                    countComment.value = data.length;
                }
            })
            .catch(err => {
                console.log(err);
            });
        }

        const findUserAvatar = (userId) => {
            const user = getDataUserComment.value.find(user => user.id === userId);
            return user ? user.avatar.replace(/"/g, '') : 'default-avatar.jpg'; // Thay đổi giá trị mặc định nếu cần
        };

        // Hàm tìm tên người dùng dựa trên user_id
        const findUserName = (userId) => {
            const user = getDataUserComment.value.find(user => user.id === userId);
            return user ? user.name : 'Unknown User'; // Thay đổi giá trị mặc định nếu cần
        };

        watch(() => route.params.id, (newId) => {
            comment.new_id = newId;
            getDetailNew(newId);
            getComments();
        });

        watch(() => user.id, (newId) => {
            comment.user_id = newId;
        });

        function format(inputDate) {
            var date = new Date(inputDate);
            if (!isNaN(date.getTime())) {
                var formattedDate = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '-' +
                                    ((date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1)) + '-' +
                                    date.getFullYear() + ' ' +
                                    (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':' +
                                    (date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes()) + ':' +
                                    (date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds());

                return formattedDate;
            } else {
                return 'Invalid Date';
            }
        }

        getAllCategories();
        getRecentNews();
        getDetailNew(route.params.id);
        getUsers();
        getComments();

        return {
            news,
            detailNew,
            cateOfNew,
            user,
            ...toRefs(comment),
            comments,
            getDataComment,
            getDataUserComment,
            countComment,
            findUserAvatar,
            findUserName,
            format,
            errors,

            categories,
            newsRecent,
        }
    }
})
</script>
