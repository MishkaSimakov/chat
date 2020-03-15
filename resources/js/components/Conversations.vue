<template>
    <div class="card">
        <div class="card-header">
            Все сообщения
        </div>
        <div class="card-body">
            <div v-if="loading" class="d-flex spinner-border my-4 mx-auto" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="media" v-for="conversation in conversations" v-else-if="conversations.length">
                <div class="media-body">
                    <a href="#" @click.prevent="getConversation(conversation.id)">{{ trunc(conversation.body, 50) }}</a>
                    <p class="text-muted">
                        You and {{ conversation.participant_count }} {{ pluralize('other', conversation.participant_count) }}
                    </p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <img v-bind:alt="user.name + ' avatar'" v-bind:src="user.avatar" v-bind:title="user.name" v-for="user in conversation.users.data">
                        </li>
                        <li class="list-inline-item">
                           last reply {{ conversation.last_reply_human }}
                        </li>
                    </ul>
                </div>
            </div>
            <div v-else>Нет сообщений</div>
        </div>
    </div>
</template>

<script>
    import pluralize from 'pluralize'
    import trunc from '../helpers/trunc'
    import { mapActions, mapGetters } from 'vuex'

    export default {
        computed: mapGetters({
            conversations: 'allConversations',
            loading: 'loadingConversations'
        }),
        methods: {
            ...mapActions([
                'getConversation',
                'getConversations',
            ]),
            trunc: trunc,
            pluralize: pluralize
        },
        mounted() {
            this.getConversations(1)
        }
    }
</script>
