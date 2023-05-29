<script >
    import Alert from '../components/Alert.vue';
    import UserService from '../../data/users';
    import PostService from '../../data/posts';
    import SvgIcon from '@jamescoyle/vue-icon'
    import { mdiTrashCanOutline  } from '@mdi/js';
    import { mdiPencilOutline } from '@mdi/js';
    import { toast } from 'vue3-toastify'
import Loader from '../components/Loader.vue';

    export default {
        name: "Posts",
        data() {
            return {
                trashIcon: mdiTrashCanOutline,
                pencilIcon: mdiPencilOutline,
                users: {},
                selectedUserId: {},
                selectedUserData: {},
                userPosts: [],
                isLoading: false,
                isEditForm: false,
                form: {
                    name: '',
                    body: '',
                    userId: ''
                }
            }
        },
        methods: {
            async getUsers() {
                const response = await UserService.getUsers();
                this.users = response;
            },
            async getCurrentUser() {
                const found = this.users.find(element => element.id === this.selectedUserId);
                this.selectedUserData = found;

                this.isLoading = true;
                const response = await PostService.getPostsByUser(this.selectedUserData.id);
                this.isLoading = false;

                this.userPosts = response;
            },
            remove(id) {
                const indexOfObject = this.userPosts.findIndex(object => {
                    return object.id === id;

                });

                this.userPosts.splice(indexOfObject, 1);
            },
            editPost(id) {
                this.isEditForm = true;
                const found = this.userPosts.find(element => element.id === id);
                this.form = found;
                this.form.userId = this.selectedUserId?.id;
            },
            async submit() {
                this.isLoading = true;

                if(this.isEditForm) {
                    const response = await PostService.editPost(this.form);
                    if(response)
                        toast.success('Post editado com sucesso!');
                } else {
                    this.form.userId = this.selectedUserData?.id;
                    const response = await PostService.newPost(this.form);

                    if(response) {
                        this.userPosts.push(response);
                        toast.success('Post criado com sucesso!');
                    }
                }
                this.form = {};
                this.isLoading = false;
            }
        },
        components: {
            Alert: Alert,
            Loader: Loader,
            SvgIcon
        },
        mounted() {
            this.getUsers();
        }
    }
</script>

<template>
    <Loader :is-loading="isLoading" />

    <select v-model="selectedUserId" @change="getCurrentUser" class="styled-select">
        <option selected disabled value="">Selecione uma opção</option>
        <option v-for="data in users" v-bind:value="data.id" :key="data.id">{{ data.name ?? data.title }}</option>
    </select>

    <div class="grid-posts-form">
        <div>
            <h2 class="title">Posts</h2>

            <div v-if="userPosts.length > 0" class="post-item-wrapper">
                <div class="post-item" v-for="data in userPosts" :key="data.id">
                    <p>{{data.name ?? data.title}}</p>
                    
                    <div>
                        <button class="invisible" @click="remove(data.id)">
                            <svg-icon type="mdi" :path="trashIcon"></svg-icon>
                        </button>
                        <button class="invisible" @click="editPost(data.id)">
                            <svg-icon type="mdi" :path="pencilIcon"></svg-icon>
                        </button>
                    </div>
                </div>
            </div>
            
            <Alert v-else info="Você deve selecionar um usuário antes" />
        </div>

        <div>
            <h2 class="title">Create / Edit Post</h2>
            <form class="styled-form" @submit.prevent="submit">

                <div class="styled-input-container">
                    <input class="styled-input" required v-model="form.name" placeholder="Title post" :disabled="userPosts.length === 0" />
                </div>

                <textarea class="styled-input" required v-model="form.body" placeholder="Post Body" :disabled="userPosts.length === 0" />

                <button :disabled="userPosts.length === 0">Salvar</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
    .post-item-wrapper {
        display: flex;
        gap: 5px;
        flex-direction: column;
        text-transform: capitalize;
    }
    .post-item {
        padding: 10px;
        border-radius: 8px;
        background-color: var(--third-blue);
        display: flex;
        justify-content: space-between;
    }
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
    .title {
        color: var(--primary);
    }

    .styled-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .styled-form > button {
        max-width: 100px;
    }

    .styled-form > div {
        width: 50% !important;
    }
    .form-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .grid-posts-form {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        column-gap: 40px;
    }

    @media screen and (max-width: 600px) {
        .form-container,
        .grid-posts-form {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>