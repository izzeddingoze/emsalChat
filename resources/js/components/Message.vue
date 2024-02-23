<template>

    <div class="direct-chat-msg right mb-3" v-if="direction==='right'">

        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right rounded bg-primary px-4">{{ message.senderUser.fullName }}</span>
            <span class="direct-chat-timestamp float-left" style="font-size: 12px">{{ message.createdAt }}</span>
        </div>


        <div class="bg-gradient-blue rounded p-2">
            {{ message.content }}
        </div>

    </div>
    <div class="direct-chat-msg mb-3" v-else-if="direction==='left'">

        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left rounded bg-success px-4">{{ message.senderUser.fullName }}</span>
            <span class="direct-chat-timestamp float-right" style="font-size: 12px">{{ message.createdAt }}</span>
        </div>



        <div class="bg-gradient-success rounded p-2">
            {{ message.content }}
        </div>

    </div>
    <div class="direct-chat-msg mb-3" v-else>

        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-timestamp float-right" style="font-size: 12px">{{ message.time }}</span>
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
