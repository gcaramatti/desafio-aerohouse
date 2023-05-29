<template>
  <div class="header">
    <h1>
      Post-list
    </h1>

    <div class="menu">
      <router-link to="/posts">Post</router-link>
      <router-link to="/">Users</router-link>
    </div>
  </div>
</template>

<style scoped>
.header {
  width: 100%;
  background-color: var(--primary);
  text-align: center;
  padding: 20px 0px 0px 0px;
}

.header > h1 {
  font-weight: 600;
  padding-bottom: 20px;
  color: var(--white);
}

.menu {
  display: flex;
  gap: 20px;
  padding: 20px;
  background-color: var(--secondary-blue);
  text-align: left;
}

.menu > a {
  font-weight: 500;
  font-size: 20px;
}
.menu > a:not(.router-link-active) {
  color: var(--active);
}

.router-link-active {
  color: var(--white);
}
</style>
