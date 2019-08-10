import Comments from './components/Comments'

App.booting((Vue, router) => {
    Vue.component('comments-tool', Comments)
})