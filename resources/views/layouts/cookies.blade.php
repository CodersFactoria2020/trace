<div class="js-cookie-consent cookie-consent">
    <span class="cookie-consent__message">
      Al fer click en aceptar, estás aceptant les nostres <a href="{{'/legal'}}" target="_blank">polítiques i cookies</a>.
    </span>
    <button class="js-cookie-consent-agree cookie-consent__agree">
        Aceptar
    </button>
  </div>

<script>
  window.laravelCookieConsent = (function () {

  const COOKIE_VALUE = 1;
  const COOKIE_DOMAIN = '127.0.0.1';

  function consentWithCookies() {
      setCookie('laravel_cookie_consent', COOKIE_VALUE, 7300);
      hideCookieDialog();
  }

  function cookieExists(name) {
      return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
  }

  function hideCookieDialog() {
      const dialogs = document.getElementsByClassName('js-cookie-consent');

      for (let i = 0; i < dialogs.length; ++i) {
          dialogs[i].style.display = 'none';
      }
  }

  function setCookie(name, value, expirationInDays) {
      const date = new Date();
      date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
      document.cookie = name + '=' + value
          + ';expires=' + date.toUTCString()
          + ';domain=' + COOKIE_DOMAIN
          + ';path=/'
          + ';samesite=lax';
  }

  if (cookieExists('laravel_cookie_consent')) {
      hideCookieDialog();
  }

  const buttons = document.getElementsByClassName('js-cookie-consent-agree');

  for (let i = 0; i < buttons.length; ++i) {
      buttons[i].addEventListener('click', consentWithCookies);
  }

  return {
      consentWithCookies: consentWithCookies,
      hideCookieDialog: hideCookieDialog
  };
  })();
</script>