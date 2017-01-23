# Captcha
Captcha integration for WebEd CMS

##Installation
- Download this plugin and places it at **/plugins**
- Go through to your **dashboard/plugins**, **active** and **install** this plugin.

###Google Recaptcha
- Go to **Settings/Captcha**, add the **Google recaptcha site key** and ** Google recaptcha secret key**.

####Add new captcha field
- In your controller:
```
$hookName = 'front_footer_js';
google_recaptcha()
    ->setLanguage('vi')
    ->registerForm('contactFormRecaptcha')
    ->renderScript($hookName);
```
If you don't pass the hook name to method ```renderScript```, this method will return a html that contains
the scripts to render recaptcha. You can echo this string everywhere you want in view.

Of course, you can have multi captcha in your page.

- In your views:
```
<div id="contactFormRecaptcha"></div>
```
So easy, right?

####Validate Google recaptcha
```
$rules = [
    'g-recaptcha-response' => 'required|google_recaptcha'
];
```
