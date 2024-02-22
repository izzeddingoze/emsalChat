<template>

    <div class="direct-chat-msg right" v-if="direction==='right'">

        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right rounded bg-info">{{ message.user.fullName }}</span>
            <span class="direct-chat-timestamp float-left">{{ message.date }}</span>
        </div>

        <span class="direct-chat-img bg-success text-center">
            <i class="fas fa-user" style="font-size:35px"></i>
        </span>

        <div class="direct-chat-text">
            {{ message.content }}
        </div>

    </div>
    <div class="direct-chat-msg mb-3" v-else>

        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left rounded bg-success px-2">{{ message.senderUser.fullName }}</span>
            <span class="direct-chat-timestamp float-right" style="font-size: 12px">{{ message.createdAt }}</span>
        </div>



        <div class="bg-success rounded p-2">
            {{ message.content }}
        </div>

    </div>
</template>

<script>
export default {
    name: "Login",
    props: {message: null, direction: null},
    data() {
        return {
            user: {
                email: null,
                password: null,
            }
        }

    },
    mounted() {

    }
}
</script>

<style>


.login-heading {
    font-weight: 300;

}

.btn-login {
    font-size: 0.9rem;
    letter-spacing: 0.05rem;
    padding: 0.75rem 1rem;
}
</style>
