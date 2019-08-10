<template>
    <div>
        <table class="text-left w-full border-collapse">
            <thead>
            <tr>
                <th v-for="(item, $i) of headers" :key="$i"
                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"
                    v-html="item"></th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="(comment, $i) in items" :key="$i" class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">{{ comment.name }}</td>
                <td class="py-4 px-6 border-b border-grey-light w-1/2">{{ comment.text }}</td>
                <td class="py-4 px-2 border-b border-grey-light">{{ comment.created_at }}</td>
                <td class="py-4 px-6 w-1 border-b border-grey-light text-center cursor-pointer hover:text-accent"
                    @click="edit(comment)">
                    <i class="far fa-edit"></i>
                </td>
                <td class="py-4 px-6 w-1 border-b border-grey-light text-center cursor-pointer text-grey hover:text-danger"
                    @click="destroy(comment)">
                    <i class="far fa-trash-alt"></i>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    const root = 'resource-tool/comments'

    export default {
        props: {
            resourceName: {},
            resourceId: {},
        },

        data() {
            return {
                items: [],
                loading: false,
                lastRetrievedAt: null,
                headers: [
                    this.__('Автор'),
                    this.__('Комментарий'),
                    this.__('Время'),
                    '',
                    '',
                ]
            }
        },

        created() {
            this.fetch()
        },

        methods: {
            fetch() {
                App.api.request({
                    url: root + '/' + this.resourceName + '/' + this.resourceId,
                }).then(data => {
                    this.items = data

                    this.updateLastRetrievedAtTimestamp()
                })
            },

            updateLastRetrievedAtTimestamp() {
                this.lastRetrievedAt = Math.floor(new Date().getTime() / 1000)
            },

            edit(comment) {
                window.open(
                    '/admin/resource/comment/' + comment.id + '/edit',
                    '_blank'
                );
            },

            destroy(comment) {
                if (! confirm(this.__('Are you sure to delete this comment?')))
                    return

                App.api.request({
                    method: 'DELETE',
                    url: 'comment/destroy',
                    data: {
                        resources: [comment.id]
                    }
                }).then(() => {
                    App.$emit('commentDestroyed', this.selected)

                    this.fetch()

                    this.$toasted.show(
                        this.__('Comment was deleted!'),
                        {type: 'success'}
                    )
                })
            }
        },
    }
</script>
