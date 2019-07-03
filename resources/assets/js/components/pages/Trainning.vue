<template>
    <div>
        <h1>Attention Trainning</h1>
        <div class="load-imgs">
        <a
            v-for="photo in photos"
            v-bind:key="photo.id"
            v-bind:href="photo.pageURL"
            v-tooltip="photo.text"
            class="flickr-link"
            target="_blank"
          >
            <img
              v-bind:src="photo.imageURL"
              v-bind:alt="photo.text"
              width="150"
              height="150"
            />
          </a>
    </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                photos:[],
                prevSearchText: "",
                headers: {
                            'Content-Type': 'application/json;charset=UTF-8',
                            'Access-Control-Allow-Origin': '*',
                          }
            }
        },
        created() {
            this.fetchImagesFromFlickr();
        },
        methods: {
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
            fetchImagesFromFlickr(event) {
              // Flickr API key
              var API_KEY = "855f42e9292ee097a8f0f217d7b3ce78";
              var vm = this;
              var searchText = 'smile';
              var parameters = $.param({
                method: "flickr.photos.search",
                api_key: API_KEY,
                text: searchText, // 検索テキスト
                sort: "interestingness-desc", // 興味深さ順
                per_page: 6, // 取得件数
                license: "4", // Creative Commons Attributionのみ
                extras: "owner_name,license", // 追加で取得する情報
                format: "json", // レスポンスをJSON形式に
                nojsoncallback: 1 // レスポンスの先頭に関数呼び出しを含めない
              });
              var flickr_url = "https://api.flickr.com/services/rest/?" + parameters;
              console.log(flickr_url);
        
        
              // Vueインスタンスのデータとして、検索テキストを保持しておく
              vm.prevSearchText = searchText;
             
              axios({method: "GET", url:flickr_url,headers: vm.headers}).then(response => {vm.data = response})
                if (vm.data.stat !== "ok") {
                  
                  return;
                }
        
                var _photos = this.data.photos.photo;
        
                // 検索テキストに該当する写真データがない場合
                if (_photos.length === 0) {
                  return;
                }
        
                vm.photos = _photos.map(function(photo) {
                  return {
                    id: photo.id,
                    imageURL: vm.getFlickrImageURL(photo, "q"),
                    pageURL: vm.getFlickrPageURL(photo),
                    text: vm.getFlickrText(photo)
                  };
                });
            }
        }
    }
</script>

<stayle scoped>
    
</stayle>