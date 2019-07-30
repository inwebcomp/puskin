import Schedule from './components/Schedule'

App.booting((Vue, router) => {
    Vue.component('schedule-tool', Schedule)
})