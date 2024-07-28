import './bootstrap';
import { createApp } from 'vue';
import router from './resourcesVuejs/router/index';
import App from './resourcesVuejs/App.vue';

// pinia: lưu trữ khi chuyển hướng đường dẫn để có thể đồng bộ với nhau qua các màn hình khác nhau (desktop, phone...)
import { createPinia } from 'pinia';

// axios
import axios from 'axios';

// formData
import 'formdata-polyfill';

// font-awesome
import './resourcesVuejs/static/fontawesome-free-6.5.2-web/css/all.min.css';

// bootstrap
import '../../node_modules/bootstrap/dist/css/bootstrap-grid.min.css';
import '../../node_modules/bootstrap/dist/css/bootstrap-utilities.min.css';

// ant-design-vue
import 'ant-design-vue/dist/reset.css';
import {
    Pagination,
    Form,
    Upload,
    Checkbox,
    Input,
    Select,
    Avatar,
    Table,
    Card,
    List,
    Menu,
    Drawer,
    Button,
    message
} from 'ant-design-vue';

// Khởi tạo axios
window.axios = axios;

// Khởi tạo resources vueJS
const app = createApp(App);
app.use(createPinia())
app.use(router)
app.use(Button)
    .use(Drawer)
    .use(List)
    .use(Menu)
    .use(Card)
    .use(Table)
    .use(Avatar)
    .use(Select)
    .use(Input)
    .use(Checkbox)
    .use(Upload)
    .use(Form)
    .use(Pagination)
    .mount('#app');

app.config.globalProperties.$message = message;
