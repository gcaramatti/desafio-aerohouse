import Users from "../../presentation/pages/Users.vue";
import Posts from "../../presentation/pages/Posts.vue";
import { createRouter, createWebHistory } from "vue-router";

const routes = [
  { path: "/", component: Users },
  { path: "/posts", component: Posts },
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});
