<template>
    <div>
        <div class="trainning" id="trainning" v-if="app == 'trainning'">
            <h1>説明</h1>
            <router-link to="/trainning/1" tag="button">スタートボタン</router-link>
        </div>
        <div class="meditation" id="meditation" v-if="app == 'meditation'">
            <h1>説明</h1>
            <router-link to="/meditation/1" tag="button">スタートボタン</router-link>
        </div>
        <div class="exw" id="exw" v-if="app == 'exw'">
            <h1>説明</h1>
            <router-link to="/exw/1" tag="button">スタートボタン</router-link>
        </div>
    </div>
    
</template>

<script>
export default {
    props:["app"],
    mounted(){
        console.log("intro: " + this.app);
    }
}

</script>