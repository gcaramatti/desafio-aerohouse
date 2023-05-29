<script setup>
    const props = defineProps({
        label: {
            type: String,
            default: ""
        },
        info: {
            type: String,
            default: ""
        }
    })
</script>

<template>
    <div class="wrapper">
        <label>{{ label }}</label>
        <div class="alert">{{ info }}</div>
    </div>
</template>

<style scoped>

    .wrapper {
        display: flex;
        flex-direction: column;
    }

    .wrapper > label {
        font-size: 18px;
        color: var(--active);
        font-weight: 600;
    }
    .alert {
        min-height: 22px;
        background-color: var(--gray);
        padding: 10px;
        border-radius: 8px;
        border: 0;
        box-shadow: 1px 3px 5px var(--shadow);
    }
</style>