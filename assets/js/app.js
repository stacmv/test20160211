$(function(){
    $("a.int").on("click", function(e){
        e.preventDefault();
        $("#expr").val(this.innerHTML);
        return false;
    });
    
    $("form").on("submit", function(e){
        e.preventDefault();
        $.ajax({
          dataType: "jsonp",
          method: "post",
          url: this.action,
          data: $(this).serialize(),
          success: success,
          error: error
        });
        return false;
    });
    
    var isResContainerHidden = $(".res-container").hasClass("hidden");
    var success = function(json){
        var data = JSON.parse(json);
        if (isResContainerHidden){
            $(".res-container").removeClass("hidden");
        };
            
        if (data.dt && data.expression && (typeof data.res !== "undefined") ){
            $(".res-container ul.res").prepend("<li><small class='muted'>" + data.dt + "</small>: <span>" + data.expression + "</span> = <b>" + data.res + "</b></li>");
        }else if (data.error){
            $(".res-container ul.res").prepend("<li><span class='label label-important'>Ошибка: " + data.error + "</span></li>");
        }else{
            $(".res-container ul.res").apreend("<li><span class='label label-important'>Ошибка: обратитесь в техподдержку.</li>");
        }
    };
    
    var error = function (){
        if (isResContainerHidden){
            $(".res-container").removeClass("hidden");
        };
        $(".res-container ul.res").prepend("<li><span class='label label-important'>Ошибка связи: попробуйте провести вычисление чуть позже или обратитесь в техподдержку.</li>");
    }

});