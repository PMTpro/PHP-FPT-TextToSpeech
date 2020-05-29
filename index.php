<!DOCTYPE html>
<html>
    <head>
        <title>Text To Speech</title>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>
    </head>
    
    <body>
        
        <h1>Text To Speech</h1><hr />
        
        <form method="post" action="">
            <textarea id="content" rows="9" cols="auto" style="width: 98%"></textarea>
            <button id="button" type="button">OK</buton>
        </form>
        
        
        
        <script type="text/javascript">
            $(document).ready(function () {
                $('#button').click(function(){
                    
                    $.ajax({
                        url: '/api.php',
                        type: 'POST',
                        timeout: 10000,
                        dataType: 'json',
                        data: {
                            content: $.trim($('#content').val())
                        },
                        
                        success: function (data) {
                            if (data.async != '') {                     
                                $.playSound(data.async);
                            }
                            
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    
                });
            });
        </script>
    </body>
</html>