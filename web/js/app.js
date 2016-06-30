///*------------------------------
// SET UP
// ------------------------------*/
//
//var player = {};
//
//player.container    = document.querySelector('.player');
//player.video        = player.container.querySelector('video');
//player.controls     = player.container.querySelector('.player--controls');
//player.mouse_detect = player.container.querySelector('.player--mouse-detect');
//player.play_pause   = player.container.querySelector('.player__button-play');
//player.click_bar    = player.container.querySelector('.player--click-bar');
//player.progress_bar = player.click_bar.querySelector('.player--progress-bar');
//player.time         = player.container.querySelector('.player__time');
//player.total_time   = player.container.querySelector('.player__total-time');
//player.song         = player.container.querySelector('.player__song');
//player.bg_song_bar  = player.container.querySelector('.player--bg-song-bar');
//player.song_bar     = player.container.querySelector('.player--song-bar');
//player.pro_song_bar = player.container.querySelector('.player--progress-song-bar');
//player.duration     = player.video.duration;
//player.fullscreen   = player.container.querySelector('.player__fullscreen');
//
//player.getTimeInMinute = function(time) {
//    var time   = Math.trunc(time),
//        minute = Math.trunc(time / 60),
//        second = time % 60;
//    return minute + ':' + (second < 10 ? '0' + second : second);
//};
//
//player.fadeOut = function(elem) {
//    elem.style.opacity -= "0.1";
//    if ( elem.style.opacity <= 0 )
//        elem.style.display = "none";
//    else
//        window.setTimeout(function(){
//            player.fadeOut(elem);
//        }, 50);
//};
//
//player.fadeIn = function(elem) {
//    elem.style.display = "block";
////  console.log('before' + elem.style.opacity);
////  elem.style.opacity += 0.1; // Ici l'opacité de s'incrémente pas
//    elem.style.opacity = parseFloat( elem.style.opacity ) + 0.1; // Ici aussi
//    console.log(elem.style.opacity);
//    if ( elem.style.opacity >= 1 )
//        return;
//    window.setTimeout(function(){
//        player.fadeIn(elem);
//    }, 50);
//};
//
////player.fadeOut = function(elem) {
////  elem.style.opacity = 1;
////  (function fade() {
////    if ((elem.style.opacity -= 0.1) < 0) {
////      elem.style.display = 'none';
////    } else {
////      requestAnimationFrame(fade);
////    }
////  })();
////};
////
////player.fadeIn = function(elem) {
////  elem.style.opacity = 0;
////  elem.style.display = 'block';
////  (function fade() {
////    var val = parseFloat(elem.style.opacity);
////    if (!((val += 0.1) > 1)) {
////      elem.style.opacity = val;
////      requestAnimationFrame(fade);
////    }
////  })();
////}
//
///*------------------------------
// VISIBILITY
// ------------------------------*/
//
//var in_box = false;
//
//player.video.addEventListener('play', function() {
//    if(!in_box)
//        player.fadeOut(player.controls);
//});
//
//player.video.addEventListener('pause', function() {
//    if(!in_box)
//        player.fadeIn(player.controls);
//});
//
//player.mouse_detect.addEventListener('mouseenter', function() {
//    in_box = true;
//    player.fadeIn(player.controls);
//});
//
//player.mouse_detect.addEventListener('mouseleave', function() {
//    in_box = false;
//    player.fadeOut(player.controls);
//});
//
///*------------------------------
// PLAY/PAUSE
// ------------------------------*/
//
//// Click button & video
//
//player.play_pause.addEventListener('click', function() {
//    if (player.video.paused)
//        player.video.play();
//    else
//        player.video.pause();
//});
//
//player.video.addEventListener('click', function() {
//    if (player.video.paused)
//        player.video.play();
//    else
//        player.video.pause();
//});
//
//// Button change
//
//player.video.addEventListener('play', function() {
//    player.play_pause.classList.add('player__pause');
//    player.play_pause.classList.remove('player__play');
//});
//
//player.video.addEventListener('pause', function() {
//    player.play_pause.classList.add('player__play');
//    player.play_pause.classList.remove('player__pause');
//});
//
//// Keyshort
//
//window.addEventListener('keydown',function(e) {
//    if(e.keyCode == 32) {
//        e.preventDefault();
//        if (player.video.paused)
//            player.video.play();
//        else
//            player.video.pause();
//    }
//}, false);
//
//// Scroll pause
//
//window.addEventListener('scroll', function(e) {
//    if(document.documentElement.scrollTop || document.body.scrollTop > player.video.clientHeight*0.6)
//        player.video.pause();
//});
//
///*------------------------------
// TIME
// ------------------------------*/
//
//player.video.addEventListener('play', function() {
//    var time = setInterval(function(){
//        player.time.innerText = player.getTimeInMinute(player.video.currentTime);
//        player.video.addEventListener('pause', function() {
//            clearInterval(time);
//        });
//    }, 100);
//});
//
///*------------------------------
// SEEK BAR
// ------------------------------*/
//
//window.setInterval(function() {
//    var progress_ratio = player.video.currentTime / player.video.duration;
//
//    player.progress_bar.style.webkitTransform = 'scaleX(' + progress_ratio + ')';
//    player.progress_bar.style.mozTransform    = 'scaleX(' + progress_ratio + ')';
//    player.progress_bar.style.msTransform     = 'scaleX(' + progress_ratio + ')';
//    player.progress_bar.style.oTransform      = 'scaleX(' + progress_ratio + ')';
//    player.progress_bar.style.Transform       = 'scaleX(' + progress_ratio + ')';
//}, 100);
//
//player.click_bar.addEventListener('mousedown', function(e) {
//    var bounding_rect = player.click_bar.getBoundingClientRect(),
//        x             = e.clientX - bounding_rect.left,
//        ratio         = x / bounding_rect.width,
//        time          = ratio * player.video.duration;
//
//    player.video.currentTime = time;
//    player.time.innerText = player.getTimeInMinute(player.video.currentTime);
//    if (time_type)
//        player.time_end();
//});
//
///*------------------------------
// Total-time & Time end
// ------------------------------*/
//
//// Bug fix : NaN if it is instantiated immediatly without cache
//
//window.setTimeout(function() {
//    player.total_time.innerText = player.getTimeInMinute(player.duration);
//}, 100);
//
//var time_type = false;
//
//player.time_end = function(){
//    var time = setInterval(function() {
//        player.total_time.innerText = '-' + (player.getTimeInMinute(player.duration - player.video.currentTime));
//        player.video.addEventListener('pause', function() {
//            clearInterval(time);
//        });
//        if(!time_type)
//            clearInterval(time);
//    }, 100);
//}
//
//// Total time
//
//player.total_time.addEventListener('click', function() {
//    time_type = !time_type;
//    if(time_type)
//        player.time_end();
//    else
//        window.setTimeout(function() {
//            player.total_time.innerText = player.getTimeInMinute(player.duration);
//        }, 150);
//});
//
//player.video.addEventListener('play', function() {
//    if (time_type) {
//        player.time_end();
//    }
//});
//
///*------------------------------
// VOLUME
// ------------------------------*/
//
//player.video.volume = 1;
//
//player.song.addEventListener('mouseenter', function(){
//    player.fadeIn(player.bg_song_bar);
//});
//
//player.song.addEventListener('mouseleave', function(){
//    player.fadeOut(player.bg_song_bar);
//});
//
//player.changeSong = function(progress_ratio_song) {
//    player.pro_song_bar.style.webkitTransform = 'scaleY(' + progress_ratio_song + ')';
//    player.pro_song_bar.style.mozTransform    = 'scaleY(' + progress_ratio_song + ')';
//    player.pro_song_bar.style.msTransform     = 'scaleY(' + progress_ratio_song + ')';
//    player.pro_song_bar.style.oTransform      = 'scaleY(' + progress_ratio_song + ')';
//    player.pro_song_bar.style.Transform       = 'scaleY(' + progress_ratio_song + ')';
//};
//
//player.song_bar.addEventListener('click', function(e){
//    var bounding_rect = player.song_bar.getBoundingClientRect(),
//        x             = e.clientY - bounding_rect.top,
//        ratio         = 1 - (x / 100);
//    player.video.volume = ratio;
//});
//
//player.video.addEventListener('volumechange', function(e){
//    player.changeSong(player.video.volume)
//    if(player.video.volume > 0.6) {
//        player.song.classList.add('player__f3');
//        player.song.classList.remove('player__f2');
//        player.song.classList.remove('player__f1');
//        player.song.classList.remove('player__mute');
//    } else if(player.video.volume > 0.3) {
//        player.song.classList.remove('player__f3');
//        player.song.classList.add('player__f2');
//        player.song.classList.remove('player__f1');
//        player.song.classList.remove('player__mute');
//    } else if(player.video.volume > 0.05) {
//        player.song.classList.remove('player__f3');
//        player.song.classList.remove('player__f2');
//        player.song.classList.add('player__f1');
//        player.song.classList.remove('player__mute');
//    } else {
//        player.song.classList.remove('player__f3');
//        player.song.classList.remove('player__f2');
//        player.song.classList.remove('player__f1');
//        player.song.classList.add('player__mute');
//    }
//
//    if(player.video.muted)
//        player.changeSong(0);
//});
//
//// Keyshort
//
//window.addEventListener('keydown',function(e) {
//    if(e.keyCode == 77) {
//        e.preventDefault();
//        if(player.video.muted || player.video.volume == 0)
//            player.video.volume = 1;
//        else
//            player.video.volume = 0;
//    }
//}, false);
//
///*------------------------------
// Full screen
// ------------------------------*/
//
//var is_fullscreen = false;
//
//player.changeFullscreen = function() {
//    return is_fullscreen = !is_fullscreen;
//};
//
//// FullScreen change
//
//document.addEventListener('fullscreenchange', player.changeFullscreen);
//document.addEventListener('webkitfullscreenchange', player.changeFullscreen);
//document.addEventListener('mozfullscreenchange', player.changeFullscreen);
//document.addEventListener('MSFullscreenChange', player.changeFullscreen);
//
//player.fullscreenMode = function() {
//    if( !is_fullscreen ) {
//        if (player.video.requestFullscreen)
//            player.video.requestFullscreen();
//        else if (player.video.mozRequestFullScreen)
//            player.video.mozRequestFullScreen();
//        else if (player.video.webkitRequestFullscreen)
//            player.video.webkitRequestFullscreen();
//        else if (player.video.msRequestFullscreen)
//            player.video.msRequestFullscreen();
//        player.fullscreen.classList.add('player--fs-on');
//        player.fullscreen.classList.remove('player--fs-off');
//    } else {
//        if (player.video.requestFullscreen)
//            player.video.exitFullscreen();
//        else if (player.video.mozRequestFullScreen)
//            player.video.mozExitFullScreen();
//        else if (player.video.webkitRequestFullscreen)
//            player.video.webkitExitFullScreen();
//        else if (player.video.msExitFullscreen)
//            player.video.msExitFullscreen();
//        player.fullscreen.classList.add('player--fs-off');
//        player.fullscreen.classList.remove('player--fs-on');
//    }
//};
//
//// Click
//
//player.fullscreen.addEventListener('click', player.fullscreenMode);
//
//// Keyshort
//
//window.addEventListener('keydown',function(e) {
//    if(e.keyCode == 70) {
//        e.preventDefault();
//        player.fullscreenMode();
//    }
//}, false);
//
///*------------------------------
// End
// ------------------------------*/
//
//player.scrollToCustom = function(y, progress) {
//    if(y-5 < progress)
//        progress = y;
//    window.scrollTo(0, progress);
//    progress = progress + 4;
//    if( y > progress)
//        window.setTimeout(function() { player.scrollToCustom(y, progress); }, 2);
//};
//
//player.video.addEventListener('ended', function() {
//    player.scrollToCustom(player.video.offsetHeight, document.documentElement.scrollTop || document.body.scrollTop);
//});
