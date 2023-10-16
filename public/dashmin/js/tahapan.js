$(document).ready(function(){
    
    var current_fs, next_fs, previous_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(67);
    
    function setProgressBar(percent){
        $(".progress-bar").css("width",percent+"%");
        $(".progress-text").text(percent + "%");
    }
        
});