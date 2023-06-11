<template>
    <div class="row">
        <form @submit.prevent="submit_form()" v-if="!commentSuccess">
            @csrf
            <div class="mb-3">
                <label for="commentSubject" class="form-label">Тема комментария</label>
                <input type="text" class="form-control" id="commentSubject" v-model="subject">
            </div>
            <div class="mb-3">
                <label for="commentBody" class="form-label">Комментарий</label>
                <textarea class="form-control" id="commentBody" rows="3" v-model="body"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
        <div class="alert alert-success" role="alert" v-else>
            Комментарий успешно отправлен!!!!
        </div>
        <div class="toast-container pb-2 mt-5 mx-auto" style="min-width: 100%;" v-for="comment in comments" :key="comment.id">
            <div class="toast show" style="min-width: 100%;">
                <div class="toast-header">
                    <img src="https://via.placeholder.com/50/5F113B/FFFFFF/?text=User" class="rounded me-2" alt="...">
                    <strong class="me-auto">{{comment.subject}}</strong>
                    <small class="text-muted">{{comment.created_at}}</small>
                </div>
                <div class="toast-body">
                    {{comment.body}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            subject: '',
            body: ''
        }
    },
    computed: {
        comments() {
            // const com = this.$store.state.article.article.comments;
            // console.log(com)
            // return com;
            if (this.$store.state.article && this.$store.state.article.comments) {
                return this.$store.state.article.comments;
            } else {
                return [];
            }
            },
            commentSuccess(){
                return this.$store.state.commentSuccess;
            },
            // errorsMessage(){
            //     return this.$store.state.article.errors;
            // }
        },
        methods: {
            submit_form() {
                this.$store.dispatch('addComment', {
                    subject: this.subject,
                    body: this.body,
                    article_id: this.$store.state.article.id
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }



</script>

<style scoped>
.toast-container {
    position: inherit !important;
}
.toast.showing {
    opacity: 100%;
}
</style>
