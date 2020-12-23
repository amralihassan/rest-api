<template>
  <div class="flex flex-col min-h-screen justify-between">
    <app-header></app-header>
    <main class="flex-grow bg-blue-100">
      <router-view></router-view>
    </main>
    <app-footer></app-footer>
  </div>
</template>

<script>
import AppHeader from "./partials/header.vue";
import AppFooter from "./partials/footer.vue";

export default {
  components: {
    AppHeader,
    AppFooter,
  },
};
</script>
