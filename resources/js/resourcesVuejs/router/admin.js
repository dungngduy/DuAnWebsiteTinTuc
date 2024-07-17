const admin = [
    {
        path: "/admin",
        component: () => import('../layouts/admin.vue'),
        children: [
            // Quản lý danh mục bài viết
            {
                path: "categories",
                name: "admin-categories",
                component: () => import('../pages/admin/categories/index.vue'),
            },

            {
                path: "categories/create",
                name: "admin-categories-create",
                component: () => import('../pages/admin/categories/create.vue'),
            },

            {
                path: "categories/:id/edit",
                name: "admin-categories-edit",
                component: () => import('../pages/admin/categories/edit.vue'),
            },

            // Quản lý bài viết
            {
                path: "news",
                name: "admin-news",
                component: () => import('../pages/admin/news/index.vue'),
            },

            {
                path: "news/create",
                name: "admin-news-create",
                component: () => import('../pages/admin/news/create.vue'),
            },

            {
                path: "news/:id/edit",
                name: "admin-news-edit",
                component: () => import('../pages/admin/news/edit.vue'),
            },

            // Quản lý chi tiết bài viết
            {
                path: "detail-new/:id",
                name: "admin-detail-new",
                component: () => import('../pages/admin/detail-new/index.vue'),
            },

            // Quản lý users
            {
                path: "users",
                name: "admin-users",
                component: () => import('../pages/admin/users/index.vue'),
            },
            {
                path: "users/create",
                name: "admin-users-create",
                component: () => import('../pages/admin/users/create.vue'),
            },
            {
                path: "users/:id/edit",
                name: "admin-users-edit",
                component: () => import('../pages/admin/users/edit.vue'),
            },

            // Quản lý roles
            {
                path: "roles",
                name: "admin-roles",
                component: () => import('../pages/admin/roles/index.vue'),
            },

            // Quản lý settings
            {
                path: "settings",
                name: "admin-settings",
                component: () => import('../pages/admin/settings/index.vue'),
            }
        ],
    }
]

export default admin
