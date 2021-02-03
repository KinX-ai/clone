var youtubeUrl = document.getElementById('int');

function startVideo(){

    if(youtubeUrl.value==""){
        alert("Enter The URL");
    }
    else{
        document.getElementById("information").style.display="block";
        getthumb(youtubeUrl.value);
    }
}

function download() {
    var videourl = youtubeUrl.value;
    console.log(videourl);
    sendURL(videourl);
}
function sendURL(URL) {
    window.location.href = `http://localhost:4000/download?URL=${URL}`;
}

function download1(){
    var videourl = youtubeUrl.value;
    sendurl360p(videourl);

}

function sendurl360p(URL){
    window.location.href=`http://localhost:4000/download360p?URL=${URL}`
}

function download2(){
    var videourl = youtubeUrl.value;
    sendurl480p(videourl);
}
function sendurl480p(URL){
    window.location.href=`http://localhost:4000/download480p?URL=${URL}`
}

function getthumb(url){
    var Youtube = (function () {
        'use strict';
    
        var video, results;
    
        var getThumb = function (url, size) {
            if (url === null) {
                return '';
            }
            size    = (size === null) ? 'big' : size;
            results = url.match('[\\?&]v=([^&#]*)');
            video   = (results === null) ? url : results[1];
    
            if (size === 'small') {
                return 'http://img.youtube.com/vi/' + video + '/2.jpg';
            }
            return 'http://img.youtube.com/vi/' + video + '/hqdefault.jpg';
        };
    
        return {
            thumb: getThumb
        };
    }());
    var thumb = Youtube.thumb(url,'big');
    document.getElementById('myimg').src=thumb;
}
