<template>
    <div class="w-96 mx-auto">
        <Stat :stats="stats"></Stat>
        <div class="mb-4">
            <div class=" mb-3">
                <input v-model="title" class="w-96 rounded-3xl border p-2 border-slate-300" type="text"
                       placeholder="title">
                <div v-if="errors.title">
                    <p v-for="error in errors.title" class="text-sm mt-2 text-red-500">{{ error }}</p>
                </div>
            </div>
            <div class=" mb-3">
                <textarea v-model="content" class="w-96 rounded-3xl border p-2 border-slate-300"
                          placeholder="content"></textarea>
                <div v-if="errors.content">
                    <p v-for="error in errors.content" class="text-sm mb-2 text-red-500">{{ error }}</p>
                </div>
            </div>
            <div class="flex mb-3 items-center">
                <div>
                    <input @change="storeImage" ref="file" type="file" class="hidden">
                    <a href="#" class="block p-2 w-16 text-center text-sm rounded-3xl bg-sky-500 text-white"
                       @click.prevent="selectFile()">Image</a>
                </div>
                <div>
                    <a v-if="image" @click.prevent="image = null" class="ml-3" href="#">Cancel</a>
                </div>
            </div>
            <div v-if="image">
                <img :src="image.url" alt="preview">
            </div>
            <div>
                <a @click.prevent="store" href="#" class="block p-2 w-32 text-center rounded-3xl bg-green-600 text-white
                hover:bg-white hover:border hover:border-green-600 hover:text-green-600 box-border ml-auto">Publish</a>
            </div>
        </div>

        <div v-if="posts">
            <h1 class="mb-8 pb-8 border-b border-gray-400">Posts</h1>
            <Post v-for="post in posts" :post="post"></Post>
        </div>

    </div>
</template>

<script>
import Post from "../../components/Post.vue";
import Stat from "../../components/Stat.vue";
export default {
    name: "Personal",

    data() {
        return {
            title: '',
            content: '',
            image: null,
            posts: [],
            errors: [],
            stats: []
        }
    },

    components: {
        Post,
        Stat
    },

    mounted() {
        this.getPosts()
        this.getStats()
    },

    methods: {

        getStats() {
            axios.post('/api/users/stats', { user_id: null})
            .then( res => {
                this.stats = res.data.data
            })
        },

        getPosts() {
            axios.get('/api/posts')
                .then(res => {
                    this.posts = res.data.data
                })
        },

        store() {
            const id = this.image ? this.image.id : null
            axios.post('/api/posts', {title: this.title, content: this.content, image_id: id})
                .then(res => {
                    this.title = ''
                    this.content = ''
                    this.image = null
                    this.posts.unshift(res.data.data)
                })
            .catch( e => {
                this.errors = e.response.data.errors
            })
        },
        selectFile() {
            this.fileInput = this.$refs.file;
            this.fileInput.click();
        },

        storeImage(e) {
            const file = e.target.files[0]
            const formData = new FormData()
            formData.append('image', file)

            axios.post('/api/post_images', formData)
                .then(res => {
                    this.image = res.data.data
                })
        }

    }
}
</script>

<style scoped>

</style>
