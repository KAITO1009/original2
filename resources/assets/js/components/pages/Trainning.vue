<template>
    <div>
        <h1>Attention Trainning</h1>
        <div id="timer">残り{{ setTime }}分</div>
        <p id="point">{{ point }}</p>
        <div class="load-imgs">
            <img
              v-for="photo in photos"
              v-bind:key="photo.id"
              v-bind:src="photo.imageURL"
              v-bind:alt="photo.text"
              width="250"
              height="250"
              v-bind:class="photo.kind"
              v-on:click="photos = [],pointup(photo.kind),fetchImagesFromFlickr('smile people',2),fetchImagesFromFlickr('sad people',6)"
            />
    </div>
    </div>
</template>

<script>
    // Flickr API key
    var API_KEY = "855f42e9292ee097a8f0f217d7b3ce78";
    var setTime = 1;

    export default {
        data(){
            return {
                photos:[],
                searchText: "",
                setTime:setTime,
                point:0
            }
        },
        mounted() {
            //初期画像取得
            this.fetchImagesFromFlickr("smile people",2);
            this.fetchImagesFromFlickr("sad  people",6);
            
            //タイマー
            var vm = this;
            var t = setInterval(function(){
                vm.countDown();
                if(vm.setTime == 0){
                    console.log(vm.setTime)
                    clearTimeout(t);
                }
            },6000);
            
    
        },
        watch:{
          setTime:function(n,o){
              
              if(n == 0){
                  console.log("終了画面へ移動");
                  this.$emit("childEvent", this.point);
                  this.$router.push("/trainning/2");
              }
              
          }
          
          
        },
        methods: {
            countDown(){
                
                this.setTime --;
                
            },
            photosSort(){
                console.log("sort");
                var list = this.photos;
                for (var i = list.length - 1; i > 0; i--) {
                		var j = Math.floor(Math.random() * (i + 1));
                		if (i == j) continue;
                		var k = list[i];
                		list[i] = list[j];
                		list[j] = k;
                	}
                this.photos = list;
                console.log(list);

            },
            pointup(kind){
                console.log(kind);
                if(kind == "smile"){
                    this.point += 10;
                }
                
            },
            // photoオブジェクトから画像のURLを作成して返す
            getFlickrImageURL(photo, size) {
              var url =
                "https://farm" +
                photo.farm +
                ".staticflickr.com/" +
                photo.server +
                "/" +
                photo.id +
                "_" +
                photo.secret;
              if (size) {
                // サイズ指定ありの場合
                url += "_" + size;
              }
              url += ".jpg";
              console.log(url);
              return url;
            },
            // photoオブジェクトからページのURLを作成して返す
            getFlickrPageURL(photo) {
              return "https://www.flickr.com/photos/" + photo.owner + "/" + photo.id;
            },
            // photoオブジェクトからaltテキストを生成して返す
            getFlickrText(photo) {
              var text = "\"" + photo.title + "\" by " + photo.ownername;
              if (photo.license == "4") {
                // Creative Commons Attribution（CC BY）ライセンス
                text += " / CC BY";
              }
              return text;
            },
            fetchImagesFromFlickr(searchText,number) {
              var vm = this;
              
              
              
              var parameters = $.param({
                method: "flickr.photos.search",
                api_key: API_KEY,
                text: searchText, // 検索テキスト
                sort: "interestingness-desc", // 興味深さ順
                per_page: 100, // 取得件数
                license: "4", // Creative Commons Attributionのみ
                extras: "owner_name,license", // 追加で取得する情報
                format: "json", // レスポンスをJSON形式に
                nojsoncallback: 1 // レスポンスの先頭に関数呼び出しを含めない
              });
              
              var flickr_url = "https://api.flickr.com/services/rest/?" + parameters;
              console.log(flickr_url);
        
        
              // Vueインスタンスのデータとして、検索テキストを保持しておく
              vm.searchText = searchText;
        
              $.getJSON(flickr_url, function(data) {
                if (data.stat !== "ok") {
                    console.log('data.stat error')
                    return;
                }
        
                var _photos = data.photos.photo;
        
                // 検索テキストに該当する写真データがない場合
                if (_photos.length === 0) {
                    console.log('no image')
                  return;
                }
        
                var kind;
                if(number == 2){
                    kind = "smile";
                }else{
                    kind = "angly";
                }
                
        
                _photos = _photos.map(function(photo) {
                  return {
                    id: photo.id,
                    imageURL: vm.getFlickrImageURL(photo, "q"),
                    pageURL: vm.getFlickrPageURL(photo),
                    text: vm.getFlickrText(photo),
                    kind:kind
                  };
                });
                
               
                for(var i=1; i<=number; i++){
                    console.log(_photos.length)
                     var r = Math.floor(Math.random() * _photos.length); 
                     console.log(r);
                     vm.photos.push(_photos[r]);
                     vm.photosSort();
                }
               
                


                
              }).fail(function() {
                    console.log('json取得失敗')
              });
            }
        }
    }

</script>

<stale scoped>
    
</style>