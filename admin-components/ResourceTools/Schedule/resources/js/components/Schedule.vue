<template>
    <div>
        <table class="text-left w-full border-collapse" v-for="(data, day) in items" :key="day">
            <caption class="py-4 px-6 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">{{
                data.dayName }}
            </caption>

            <thead>
            <tr>
                <th v-for="(item, $i) of headers" :key="$i"
                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"
                    v-html="item">
                </th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="(item, $i) of data.subjects" :key="$i" class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">{{ item.subject_number }}</td>
                <td class="px-6 pr-0 border-b border-grey-light w-1/2">
                    <search-input
                            small
                            v-model="item.subject"
                            @search="search(item, $event)"
                            immediate
                            :options="options"
                            @blur="save(item, item.subject)"
                            @enter.prevent="save(item)"/>
                </td>
                <td class="px-6 border-b border-grey-light">
                    <app-select
                            small
                            :search="false"
                            :options="teachers"
                            v-model="item.teacher_id"
                            @change="save(item, true)"
                    />
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    const root = 'resource-tool/schedule'

    export default {
        props: {
            resourceName: {},
            resourceId: {},
        },

        data() {
            return {
                items: [],
                teachers: [],
                headers: [
                    '№',
                    this.__('Предмет'),
                    this.__('Преподаватель'),
                ],
                loading: false,
                lastRetrievedAt: null,
                options: [],
            }
        },

        created() {
            this.fetch()

            App.$on('saveResource', () => {
                this.save()
            })
        },

        destroyed() {
            App.$off('saveResource')
        },

        methods: {
            fetch() {
                App.api.request({
                    url: root + '/' + this.resourceName + '/' + this.resourceId,
                }).then(({schedule, teachers}) => {
                    this.items = schedule
                    this.teachers = teachers

                    this.updateLastRetrievedAtTimestamp()
                })
            },

            /**
             * Update the last retrieved at timestamp to the current UNIX timestamp.
             */
            updateLastRetrievedAtTimestamp() {
                this.lastRetrievedAt = Math.floor(new Date().getTime() / 1000)
            },

            save(subject, force = false) {
                this.loading = true

                if (! force && subject.subject == subject.original)
                    return

                App.api.request({
                    method: 'POST',
                    url: root + '/' + this.resourceName + '/' + this.resourceId,
                    data: {
                        day: subject.day,
                        subject_number: subject.subject_number,
                        subject: subject.subject,
                        teacher_id: subject.teacher_id,
                    }
                }).then(() => {
                    this.loading = false

                    subject.original = subject.subject

                    App.$emit('scheduleUpdate', subject)

                    this.$toasted.show(
                        this.__('Расписание сохранено'),
                        {type: 'success'}
                    )

                    this.updateLastRetrievedAtTimestamp()
                }).catch(({data, status}) => {
                    this.loading = false

                    if (status == 409) {
                        this.$toasted.show(
                            this.__('Another user has updated schedule since this page was loaded. Please refresh the page and try again.'),
                            {type: 'error'}
                        )
                    }
                })
            },

            search(param, word) {
                if (this.loading)
                    return

                this.loading = true

                App.api.request({
                    url: root + '/search',
                    params: {
                        query: word
                    }
                }).then(({values}) => {
                    this.loading = false
                    this.options = values
                })
            },
        },
    }
</script>
