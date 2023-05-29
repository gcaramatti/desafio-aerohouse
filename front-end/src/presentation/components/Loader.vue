<script setup>
    const props = defineProps({
        isLoading: {
            type: Boolean,
            default: false
        }
    })
</script>

<template>
    <div class="loader-wrapper" v-if="isLoading">
        <div class="loader"></div>
    </div>
</template>

<style scoped>
    .loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgb(255, 255, 255, 0.6);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }
    .loader {
        border: 0.3rem solid var(--primary);
        border-radius: 50%;
        border-top: 0.3rem solid transparent;
        width: 3.2rem;
        height: 3.2rem;
        animation: spin 1s linear infinite;

        @keyframes spin {
            to {
            transform: rotate(360deg);
            }
        }
    }

        /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>