<template>
    <div id="app">
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        name: 'app',
    }
</script>

<style>
    #nprogress .bar {
        background: #FFA500 !important;
    }

    #nprogress .peg {
        box-shadow: 0 0 10px #FFA500, 0 0 5px #FFA500 !important;
    }

    #nprogress .spinner-icon {
        display: none;
    }

    #app {
        font-family: 'Roboto', sans-serif
    }
</style>
