<script>
    import Format from '../../shared/utils/Format'
    import Alert from '../components/Alert.vue';
    import UserService from '../../data/users'

    export default {
        name: "Posts",
        data() {
            return {
                users: {},
                selectedUser: '',
                selectedData: {}
            }
        },
        methods: {
            async getUsers() {
                const response = await UserService.getUsers();
                this.users = response;
            },
            getCurrentUser() {
                const found = this.users.find(element => element.id === this.selectedUser);
                this.selectedData = found;

                Format.ProxyToRaw(this.selectedData);
            }
        },
        components: {
            Alert: Alert
        },
        mounted() {
            this.getUsers();
        }
    }
</script>

<template>
    <select v-model="selectedUser" @change="getCurrentUser" class="styled-select">
        <option selected value="">Selecione uma opção</option>
        <option v-for="data in users" v-bind:value="data.id" :key="data.id">{{ data.name }}</option>
    </select>

    <div class="form-container">
        <Alert label="Name" :info="selectedData?.name" />
        <Alert label="Username" :info="selectedData?.username" />
        <Alert label="Email" :info="selectedData?.email" />
        <Alert label="Phone" :info="selectedData?.phone" />
        <Alert label="Street" :info="selectedData?.address?.street" />
        <Alert label="City" :info="selectedData?.address?.city" />
    </div>
</template>

<style scoped>

    .styled-select {
        padding: 10px;
        border-radius: 8px;
        border: 0;
        background-color: var(--primary);
        color: var(--white);
        font-size: 15px;
        margin-bottom: 50px;
        font-weight: 500;
    }

    .styled-select:focus-visible {
        outline: -webkit-focus-ring-color auto 0px;
    }

    .form-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    @media screen and (max-width: 600px) {
        .form-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>