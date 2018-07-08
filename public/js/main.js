var square_id;
var position_x;
var position_y;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var content_top = $('.content').offset().top;
$( function() {
    $(".draggable").draggable(
        {
            stop:function (event,ui) {
                square_id = $(this).attr("data-id");
                position_x =$(this).offset().top - content_top;
                position_y = $(this).offset().left;
                    $.ajax({
                        url : '/positions',
                        type : 'post',
                        data : {
                            _token: CSRF_TOKEN,
                            squareId:square_id,
                            positionX:position_x,
                            positionY:position_y
                        },
                });
            }
        }
    );
} );



