window.addEventListener('DOMContentLoaded', function(){

    const playback_position_jp = document.getElementById("playback_position_jp");
    const end_position_jp = document.getElementById("end_position_jp");
    const slider_progress_jp = document.getElementById("progress_jp");
    const audioElement_jp = document.querySelector("#audio_jp");
  
    var playtimer_jp = null;

    const btn_jp  = document.querySelector("#btn-play_jp");   // <button>

    const playback_position_en = document.getElementById("playback_position_en");
    const end_position_en = document.getElementById("end_position_en");
    const slider_progress_en = document.getElementById("progress_en");
    const audioElement_en = document.querySelector("#audio_en");
    var playtimer_en = null;
    const btn_en  = document.querySelector("#btn-play_en");   // <button>


  btn_jp.addEventListener("click", ()=>{
    // pausedがtrue=>停止, false=>再生中
    
    if( !audioElement_jp.paused ){
      btn_jp.innerHTML = '<i class="fas fa-play"></i>';  // 「再生ボタン」に切り替え
      audioElement_jp.pause();
      stopTimer_jp();
    }
    else{
      btn_jp.innerHTML = '<i class="fas fa-pause"></i>';  // 「一時停止ボタン」に切り替え
      audioElement_jp.play();
      startTimer_jp();
    }
  });

  btn_en.addEventListener("click", ()=>{
    // pausedがtrue=>停止, false=>再生中
    
    if( !audioElement_en.paused ){
      btn_en.innerHTML = '<i class="fas fa-play"></i>';  // 「再生ボタン」に切り替え
      audioElement_en.pause();
      stopTimer_en();
    }
    else{
      btn_en.innerHTML = '<i class="fas fa-pause"></i>';  // 「一時停止ボタン」に切り替え
      audioElement_en.play();
      startTimer_en();
    }
  });

  /**
   * [event] 再生終了時に実行
   */
   audioElement_jp.addEventListener("ended", ()=>{
    audioElement_jp.currentTime = 0;  // 再生位置を先頭に移動(こいつはなくても大丈夫です)
    btn_jp.innerHTML = '<i class="fas fa-play"></i>';  // 「再生ボタン」に変更
  });

  audioElement_en.addEventListener("ended", ()=>{
    audioElement_en.currentTime = 0;  // 再生位置を先頭に移動(こいつはなくても大丈夫です)
    btn_en.innerHTML = '<i class="fas fa-play"></i>';  // 「再生ボタン」に変更
  });
  
    // 再生開始したときに実行
    const startTimer_jp = function(){
      playtimer_jp = setInterval(function(){
        playback_position_jp.textContent = convertTime(audioElement_jp.currentTime);
        end_position_jp.textContent = calTime(audioElement_jp.currentTime,audioElement_jp.duration);
        slider_progress_jp.value = Math.floor( (audioElement_jp.currentTime / audioElement_jp.duration) * audioElement_jp.duration);
      }, 500);
    };

    const startTimer_en = function(){
      playtimer_en = setInterval(function(){
        playback_position_en.textContent = convertTime(audioElement_en.currentTime);
        end_position_en.textContent = calTime(audioElement_en.currentTime,audioElement_en.duration);
        slider_progress_en.value = Math.floor( (audioElement_en.currentTime / audioElement_en.duration) * audioElement_en.duration);
      }, 500);
    };
  
    // 停止したときに実行
    const stopTimer_jp = function(){
      clearInterval(playtimer_jp);
      playback_position_jp.textContent = convertTime(audioElement_jp.currentTime);
      end_position_jp.textContent = calTime(audioElement_jp.currentTime,audioElement_jp.duration);
    };

    const stopTimer_en = function(){
      clearInterval(playtimer_en);
      playback_position_en.textContent = convertTime(audioElement_en.currentTime);
      end_position_en.textContent = calTime(audioElement_en.currentTime,audioElement_en.duration);
    };
  
    // 再生時間の表記を「mm:ss」に整える
    const convertTime = function(time_position) {
      
      time_position = Math.floor(time_position);
      var res = null;
  
      if( 60 <= time_position ) {
        res = Math.floor(time_position / 60);
        res += ":" + Math.floor(time_position % 60).toString().padStart( 2, '0');
      } else {
        res = "0:" + Math.floor(time_position % 60).toString().padStart( 2, '0');
      }
  
      return res;
    };

    // 再生時間の表記を「mm:ss」に整える
    const calTime = function(currenttime,durationtime) {
      
        currenttime = Math.floor(currenttime);
        durationtime = Math.floor(durationtime);
        var res = null;
        var caltime = Math.floor(durationtime-currenttime);
        
        if(caltime==0){
            res = "0:00";
        }else if( 60 <= caltime ) {
          res = Math.floor(caltime / 60);
          res += ":" + Math.floor(caltime % 60).toString().padStart( 2, '0');
          res = "-" + res;
        } else {
          res = "-0:" + Math.floor(caltime % 60).toString().padStart( 2, '0');
        }
    
        return res;
      };
  
    // 音声ファイルの再生準備が整ったときに実行
    audioElement_jp.addEventListener('loadeddata', (e)=> {
      slider_progress_jp.max = audioElement_jp.duration;
  
      playback_position_jp.textContent = convertTime(audioElement_jp.currentTime);
      end_position_jp.textContent = calTime(audioElement_jp.currentTime,audioElement_jp.duration);
    });

    audioElement_en.addEventListener('loadeddata', (e)=> {
      slider_progress_en.max = audioElement_en.duration;
  
      playback_position_en.textContent = convertTime(audioElement_en.currentTime);
      end_position_en.textContent = calTime(audioElement_en.currentTime,audioElement_en.duration);
    });
  
    // 音声ファイルが最後まで再生されたときに実行
    audioElement_jp.addEventListener("ended", e => {
      stopTimer_jp();
    });

    audioElement_en.addEventListener("ended", e => {
      stopTimer_en();
    });
  
    // プログレスバーが操作されたときに実行（メモリを動かしているとき）
    slider_progress_jp.addEventListener("input", e => {
      stopTimer_jp();
      audioElement_jp.currentTime = slider_progress_jp.value;
    });

    slider_progress_en.addEventListener("input", e => {
      stopTimer_en();
      audioElement_en.currentTime = slider_progress_en.value;
    });
  
    // プログレスバーが操作完了したときに実行
    slider_progress_jp.addEventListener("change", e => {
      startTimer_jp();
    });

    slider_progress_en.addEventListener("change", e => {
      startTimer_en();
    });
  
  });