function JCNxUser(data, tUrl) {
    $.ajax({
        type: "POST",
        url: tUrl,
        data: {
            data
        },
        success: function(data) {

        }
    });
}