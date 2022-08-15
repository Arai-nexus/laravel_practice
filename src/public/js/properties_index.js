$("contact-content").submit(function() {
     //エラーの初期化
    $("p.error").remove();
    $("table tr td").removeClass("error");
    $(":text,textarea").filter(".validate").each(function(){
    $(this).filter(".required").each(function(){
        if($(this).val() =="") {
            $(this).parent().prepend("
            <p class="error">必須項目です</p>
        ");
        }
    });
