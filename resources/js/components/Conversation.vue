<template>
    <div v-if="conversation">
        <div class="list-inline" v-if="conversation.users.data.length">
            <li class="list-inline-item"><strong>In conversation: </strong></li>
            <li class="list-inline-item" v-for="user in conversation.users.data">{{ user.name }}</li>
        </div>

        <hr>

        <div class="media" v-for="reply in conversation.replies.data">
            <div class="m-1 float-left">
                <img v-bind:src="reply.user.data.avatar" v-bind:alt="reply.user.data.name + ' avatar'">
            </div>
            <div class="media-body">
                <p>{{ reply.user.data.name }} &bull; {{ reply.created_at_human }}</p>
                <div class="card">
                    <div class="card-body">
                        {{ reply.body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="media">
            <div class="m-1 float-left">
                <img v-bind:src="conversation.user.data.avatar" v-bind:alt="conversation.user.data.name + ' avatar'">
            </div>
            <div class="media-body">
                <p>{{ conversation.user.data.name }} &bull; {{ conversation.created_at_human }}</p>
                <div class="card">
                    <div class="card-body">
                        {{ conversation.body }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        computed: mapGetters({
            conversation: 'currentConversation',
        }),
    }
</script>
