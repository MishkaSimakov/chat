<template>
    <div class="mb-2 card">
        <div class="card-header">
            New message
        </div>
        <div class="card-body">
            <form action="#" @submit.prevent="send">
                <div class="form-group">
                    <input type="text" id="users" placeholder="Start typing users" class="form-control">
                </div>

                <ul v-if="recipients.length" class="list-inline">
                    <li class="list-inline-item"><strong>To: </strong></li>
                    <li class="list-inline-item" v-for="recipient in recipients">{{ recipient.name }} [<a href="#" @click.prevent="removeRecipient(recipient)">x</a>]</li>
                </ul>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea cols="30" v-model="body" rows="4" id="message" placeholder="Message" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
           </form>
        </div>
    </div>
</template>

<script>
    import { userautocomplete } from '../../helpers/autocomplete'
    import {mapActions, mapGetters} from 'vuex'

    export default {
        data() {
            return {
                body: null,
                recipients: []
            }
        },
        methods: {
            ...mapActions([
                'createConversation'
            ]),
            addRecipient(recipient) {
                var existing = this.recipients.find((r) => {
                    return r.id === recipient.id
                });

                if (typeof existing !== 'undefined') {
                    return
                }

                this.recipients.push(recipient)
            },
            removeRecipient(recipient) {
                this.recipients = this.recipients.filter((r) => {
                    return r.id !== recipient.id
                })
            },
            send() {
                this.createConversation({
                    body: this.body,
                    recipients: this.recipients.map((r) => {
                        return r.id
                    })
                }).then(() => {
                    this.recipients = []
                    this.body = null
                })
            }
        },
        mounted() {
            var users = userautocomplete('#users').on('autocomplete:selected', (e, selection) => {
                this.addRecipient(selection)
                users.autocomplete.setVal('')
            })
        }
    }
</script>
