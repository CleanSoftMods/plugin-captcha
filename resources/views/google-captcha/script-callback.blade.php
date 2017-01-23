<script src='//www.google.com/recaptcha/api.js?onload=onloadGoogleCaptchaCallback&render=explicit&hl={{ $language }}'></script>
<script type="text/javascript">
    var onloadGoogleCaptchaCallback = function () {
        @foreach($forms as $elementId => $form)
        if (document.getElementById('{{ $elementId }}')) {
            grecaptcha.render('{{ $elementId }}', {
                'sitekey': ' {{ $siteKey }}',
                'theme': '{{ array_get($form, 'theme') }}'
            });
        }
        @endforeach
    };
</script>