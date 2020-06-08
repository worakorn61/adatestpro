<script src="<?php echo base_url(); ?>application/modules/common/assets/vendor/rabbitmq/stomp.js"></script>

<script>


    $(document).ready(function() {

        var client = Stomp.client('ws://127.0.0.1:15674/ws');

        var on_connect = function(x) {
            client.subscribe('/queue/TEST_PRO', function(res) {
                console.log(res.body);

            });

        }
        var on_error = function(x) {
            console.log(x);
        }
        client.connect('newadmin', 's0m3p4ssw0rd', on_connect, on_error, '/');


        console.log(client);


    });
</script>