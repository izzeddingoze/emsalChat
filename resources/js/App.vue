<template>
    <div class="container">
        <router-view></router-view>
    </div>
</template>

<script>


export default {
    name: "App",
    components: {},
    mounted() {

    }
}
</script>
<style>
body {
}

.vertical-align {
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

.vh-100 {
    min-height: 100vh;
    position: relative;
}
</style>
