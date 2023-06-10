<template>
    <span @click="addLike()" class="badge likesButton" :class="isLike ? 'bg-primary': 'bg-danger'">{{ LikesNumber }} <i class="far fa-thumbs-up"></i></span>
</template>

<script>
export default {
    computed: {
        isLike() {
            return this.$store.state.article.likeIt;
        },
        LikesNumber() {
            return this.$store.getters.articleLikes;
        }
    },
    methods: {
        addLike() {
            const slug = this.$store.state.slug;
            const increment = !this.isLike; // Инвертируем значение isLike для инкремента или декремента

            this.$store.dispatch('addLike', { slug, increment });
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>
.likesButton {
    cursor: pointer;
}
</style>
