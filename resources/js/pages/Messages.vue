<template>

    <div class="row justify-content-center vh-100">
        <div class="col-12 col-md-6 vertical-align">
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header ui-sortable-handle">
                    <h3 class="card-title my-2">EmsalCHAT - Mesajlar</h3>
                    <div class="card-tools">

                        <button type="button" class="btn my-2l  btn-light mr-2" data-card-widget="remove"
                                @click="getPublicMessages">
                            <i class="fas fa-sync-alt" style="font-size:15px"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger my-2l" data-card-widget="remove"
                                @click="logout">
                            <i class="fas fa-times " style="font-size:15px"></i>
                        </button>

                    </div>
                </div>

                <div class="card-body">

                    <div ref="messageContainer" class="direct-chat-messages px-4" style="height:500px !important">

                        <Message v-for="publicMessage in this.publicMessages" :key="publicMessage.id"
                                 :direction="publicMessage.senderUser.id===user.id ? 'right' : 'left'"
                                 :message="publicMessage"></Message>

                    </div>


                </div>

                <div class="card-footer">
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Mesaj" class="form-control"
                                   v-model="newMessage.messageContent">
                            <span class="input-group-append">
                             <button type="button" class="btn btn-primary" @click="sendMessage"><i
                                 class="fas fa-paper-plane"></i></button>
                            </span>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>


</template>

<script>
import SWAlert from "sweetalert2";
import Message from "../components/Message.vue";
import {mapGetters} from "vuex";

export default {
    name: "Messages",
    components: {Message},
    computed: {
        ...mapGetters(['user'])
    },
    data() {
        return {
            newMessage: {
                messageContent: null,
                to: 'public'
            },
            publicMessages: {},
        }
    },
    created() {
        this.getPublicMessages()
    },
    mounted() {

        const channel = Echo.channel('emsalChat')

        channel.listen('.newMessage', (event) => {
                this.publicMessages.push(event.message)
        })

        channel.listen('.timeReminder', (event) => {
            let currentTime = new Date();
            let formattedTime = currentTime.toLocaleString();
            this.publicMessages.push({'time': formattedTime})
        })

    },
    methods: {

        resetNewMessage() {
            this.newMessage = {
                messageContent: null,
                to: 'public'
            }
        },
        scrollBottom() {
            let container = this.$refs.messageContainer;

        },
        logout() {
            return axios.get('/api/logout').then(res => {
                this.$router.push('/login')
            }).catch(() => {

            })
        },
        async sendMessage() {
            if (this.newMessage.messageContent && this.newMessage.messageContent.length < 10) {
                return SWAlert.fire({
                    icon: 'error',
                    title: 'Hata!',
                    timer: 1500,
                    timerProgressBar: true,
                    position: 'top',
                    showConfirmButton: false,
                    text: "Mesaj en az 10 karakter içermeli"
                })
            }

            await axios.post('/api/new-message', {...this.newMessage}).then(async res => {
                this.resetNewMessage()
                this.scrollBottom()

            }).catch((err) => {
                SWAlert.fire({
                    icon: 'error',
                    title: 'Hata!',
                    timerProgressBar: true,
                    position: 'top',
                    showConfirmButton: false,
                    text: err.response.data.message
                })
            })

        },

        async getPublicMessages() {
            axios.get('/api/get-public-messages',).then(async res => {
                this.publicMessages = res.data.data
            }).catch((err) => {
                SWAlert.fire({
                    icon: 'error',
                    title: 'Hata!',
                    timer: 1500,
                    timerProgressBar: true,
                    position: 'top',
                    showConfirmButton: false,
                    text: err.response.data.message
                })
            })

            this.scrollBottom()
        }
    }
}
</script>
