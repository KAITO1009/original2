<template>
    <div class="container">
        <div class="row">
            <div class="app-contents">
                <h1>test</h1>
                <transition appear mode="out-in">
                     <router-view v-bind:app="app" v-on:childEvent="appEvent" />
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:["app"],
        mounted() {
            console.log('App-Component mounted.')
            console.log("props app: " + this.app);
        },
        methods:{
          appEvent:function(point){
              console.log("app情報" + point);
              this.$emit("appEvent", point)
          }
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
