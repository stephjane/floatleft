Vue.component("featured-row", {
    props: ["aspect", "layout", "data"],
    template: "#featured-row-template",
});
Vue.component("playlist-row", {
    props: ["title", "aspect", "size"],
    template: "#playlist-template",
});
Vue.component("Featured", {
    props: ["title"],
    template: "#featured-template",
    data: function() {
        return {
            componentMenu: true,
            featured: {'aspect': '16x9', 'layout': 'standard', 'data': 'bottom'},
            playlists: [
                {'title': 'Playlist One', 'aspect': '16x9', 'size': 'large'},
                {'title': 'Playlist Two', 'aspect': '4x3', 'size': 'small'}
            ]
        }
    },
    methods: {
        addrow: function(currentScreen) {
            this.playlists.push({'title': 'New Playlist', 'aspect': '16x9', 'size': 'large'});
        }
    }
});
Vue.component("Library", {
    props: ["title"],
    template: "#featured-template",
    data: function() {
        return {
            componentMenu: false,
            featured: {'aspect': '16x9', 'layout': 'standard', 'data': 'bottom'},
            playlists: []
        }
    },
    methods: {
        addrow: function(currentScreen) {
            this.playlists.push({'title': 'New Playlist', 'aspect': '16x9', 'size': 'large'});
        }
    }
});

new Vue({
    el: document.getElementById('app'),
    data: {
        currentTab: "Featured",
        screens: ["Featured", "Library"]
    }
})