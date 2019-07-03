<template>
    <div class="container">
        <div class="row">
            <div class="app-contents">
                <h1>test</h1>
                <transition appear mode="out-in">
                     <router-view />
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('App-Component mounted.')
        }
    }
</script>

<style scoped>
    .v-enter-active, .v-leave-active{
        transition:opacity 1s;
    }
    .v-enter, .v-leave-to {
        opacity: 0;
    }
    
</style>
