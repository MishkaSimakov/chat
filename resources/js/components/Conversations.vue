<template>
    <div class="card">
        <div class="card-header">
            Все сообщения
        </div>
        <div class="card-body">
            <div class="media" v-for="conversation in conversations">
                <div class="media-body">
                    <a href="">{{ conversation.body }}</a>
                    <p class="text-muted">
                        You and {{ conversation.participant_count }} others
                    </p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <img v-bind:src="user.avatar" v-bind:title="user.name" v-bing:alt="user.name + ' avatar'" v-for="user in conversation.users.data">
                        </li>
                        <li class="list-inline-item">
                           last reply {{ conversation.last_reply_human }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        computed: mapGetters({
            conversations: 'allConversations'
        }),
        methods: {
            ...mapActions([
                'getConversations'
            ])
        },
        mounted() {
            this.getConversations(1)
        }
    }
</script>
