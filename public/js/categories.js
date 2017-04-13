/**
 * Created by adi on 4/10/17.
 */
    $('#btn').click(function(event){
        event.preventDefault(); // this prevents the form from submitting
        $.ajax({
            url: url,
            type: "POST",
            data: {'name':$('#name').val(), _token: token},
            dataType: 'JSON',
            success: function (data) {
                console.log(data); // this is good
            },
            error: function (x) {
                alert(x.responseText +" "+ x.status);
            }
        });
    });


