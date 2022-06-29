require("./bootstrap");
// import { vue } from "laravel-mix";
import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes";
import VNepaliDatePicker from "v-nepalidatepicker";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Vue = Vue; //this is important! Do not use require('vue') for livewire-vue

// Register Vue components
Vue.component("navbar", require("./components/Navbar.vue").default);
Vue.component("fields-form", require("./components/FieldsForm.vue").default);
Vue.component("project-form", require("./components/ProjectForm.vue").default);
Vue.component("project-physical-progress", require("./components/ProjectPhysicalProgress.vue").default);
Vue.component("payment-form", require("./components/PaymentForm.vue").default);
Vue.component("DrinkingWaterOffice-form", require("./components/DrinkingWaterOffice.vue").default);
Vue.component(
    "resource-data-form",
    require("./components/ResourceDataForm.vue").default
);
Vue.component("data-viewer", require("./components/DataViewer.vue").default);
Vue.component("pie-chart", require("./charts/PieChart.vue").default);
Vue.component("bar-chart", require("./charts/BarChart.vue").default);
// Vue.component("economical-situation", require("./pages/economical-situation/Index.vue").default);

Vue.use(VueRouter);
Vue.use(VNepaliDatePicker);
Vue.use(VueSweetalert2);

// Initialize Vue
const app = new Vue({
    el: "#app",
    router: new VueRouter(routes),
});
