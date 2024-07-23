const user = [
    {
        path: "/",
        component: () => import('../layouts/user.vue'),
        children: [
            // Index
            {
                path: "/",
                name: "trang-chu",
                component: () => import('../pages/user/index.vue'),
            },

            // Categories
            {
                path: "/danh-muc",
                name: "danh-muc",
                component: () => import('../pages/user/categories.vue'),
            },

            // Detail-blog
            {
                path: "/chi-tiet-bai-viet",
                name: "chi-tiet-bai-viet",
                component: () => import('../pages/user/detail-blog.vue'),
            },

            // Info-user
            {
                path: "/thong-tin-nguoi-dung",
                name: "thong-tin-nguoi-dung",
                component: () => import('../pages/user/login/info-user.vue'),
            },
        ]
    }
]

export default user
