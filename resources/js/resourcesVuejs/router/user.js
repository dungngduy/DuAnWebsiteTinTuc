const user = [
    {
        path: "/",
        component: () => import('../layouts/user.vue'),
        children: [
            // Login
            {
                path: "/login",
                name: "dang-nhap",
                component: () => import('../pages/user/login/login.vue'),
            },

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
        ]
    }
]

export default user
