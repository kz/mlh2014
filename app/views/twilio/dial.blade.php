<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<Response>
    <Say>Welcome to Tutor For You. We will now connect you with your chosen tutor.</Say>
    <Dial callerId="+442033897557">
        <Number>{{{ $tutor_number }}}</Number>
    </Dial>
</Response>
