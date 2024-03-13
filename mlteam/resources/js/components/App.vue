<template>
    <div>
        <div class="flex justify-between p-8 w-96 mx-auto">

            <router-link v-if="!token" :to="{ name: 'user.login'}">Login</router-link>
            <router-link v-if="token" :to="{ name: 'user.index'}">Users</router-link>
            <router-link v-if="token" :to="{ name: 'user.feed'}">Feed</router-link>
            <router-link v-if="token" :to="{ name: 'user.personal'}">Personal</router-link>
            <router-link v-if="!token" :to="{ name: 'user.registration'}">Registration</router-link>
            <a v-if="token" @click.prevent="logout" href="#">Logout</a>
        </div>

        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            token: null
        }
    },
     mounted() {
        this.getUsers()
    },

    methods: {
        getUsers() {
            axios.get('/api/users/')
                .then(res => {
                    this.users = res.data.data
                })
        },

        toggleFollowing(user) {
            axios.post(`/api/users/${user.id}/toggle_following`)
                .then(res => {
                    user.is_followed = res.data.is_followed
                })
        }


    }

   
}
</script>

<style scoped>

</style>
