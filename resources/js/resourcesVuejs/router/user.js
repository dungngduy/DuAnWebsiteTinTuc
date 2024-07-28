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

            // About
            {
                path: "/gioi-thieu",
                name: "gioi-thieu",
                component: () => import('../pages/user/about.vue'),
            },

            // Contact
            {
                path: "/lien-he",
                name: "lien-he",
                component: () => import('../pages/user/contact.vue'),
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

            {
                path: "/bai-viet-da-luu",
                name: "bai-viet-da-luu",
                component: () => import('../pages/user/storage/new-storage.vue'),
            },

            {
                path: "/bai-viet-da-xem",
                name: "bai-viet-da-xem",
                component: () => import('../pages/user/storage/new-watched.vue'),
            },
        ]
    }
]

export default user
