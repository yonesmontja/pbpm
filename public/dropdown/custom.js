 $(document).ready(function() {

    $('select[name="level"]').on('change', function(){
        var levelId = $(this).val();
        if(levelId) {
            $.ajax({
                url: '/kompetensidasar/get/'+levelId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },
                
                success:function(data) {

                    $('select[name="ki_deskripsi"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="ki_deskripsi"]').append('<option value="'+ key +'">' + value + '</option>');
                        
                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="ki_deskripsi"]').empty();
        }

    });

});