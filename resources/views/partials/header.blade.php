<header class="header mw-1220 m-auto">
  <a href="{{ route('home-page') }}" class="header__logo-group">
    <img src="{{ asset('images/Vector.png') }}" alt="Logo của Thiennhai" class="header__logo">
    <h1 class="header__title">Thiennhai</h1>
  </a>
  <div class="header__right">
    <!-- <a href="{{ route('login') }}" class="header__tiktok-link">
      <img src="{{ asset('images/tiktok.png') }}" alt="">
    </a> -->
    <!-- <div class="btn-group dropstart">
      <div class="dropdown">
        <button style="background-color: transparent !important;" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
          </svg>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Trang chủ</a></li>
          <li><a class="dropdown-item" href="#">Sản phẩm</a></li>
          <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
        </ul>
      </div>
    </div> -->
    <!-- Default dropstart button -->
    <div class="btn-group dropstart">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
        </svg>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/">Trang chủ</a></li>
        <li><a class="dropdown-item" href="{{route('products')}}">Sản phẩm</a></li>
        <li><a class="dropdown-item" href="{{route('suport')}}">Hỗ trợ</a></li>
        <li><a class="dropdown-item" href="{{route('blogs.userShow')}}">Blogs</a></li>
      </ul>
    </div>
  </div>
</header>
<style>
  .dropstart .dropdown-toggle::before {
    content: none;
  }

  .btn-secondary, .btn-secondary:hover{
    background-color: transparent;
  }

  .dropdown-menu {
    border: 2px solid #392b82;
    background-color: #020202;
    margin-right: 10px !important;
  }

  .dropdown-item {
    color: white;
    font-size: 18px;
    margin-bottom: 5px;
  }

  .btn-check:active+.btn-secondary:focus, .btn-check:checked+.btn-secondary:focus, .btn-secondary.active:focus, .btn-secondary:active:focus, .show>.btn-secondary.dropdown-toggle:focus{
    box-shadow: 0 0 0 0 rgba(130, 138, 145, .5);
  }

  .btn-check:focus+.btn-secondary, .btn-secondary:focus{
    box-shadow: 0 0 0 0 rgba(130, 138, 145, .5);
  }
</style>
<script>
  ! function(w, d, t) {
    w.TiktokAnalyticsObject = t;
    var ttq = w[t] = w[t] || [];
    ttq.methods = ["page", "track", "identify", "instances", "debug", "on", "off", "once", "ready", "alias", "group", "enableCookie", "disableCookie", "holdConsent", "revokeConsent", "grantConsent"], ttq.setAndDefer = function(t, e) {
      t[e] = function() {
        t.push([e].concat(Array.prototype.slice.call(arguments, 0)))
      }
    };
    for (var i = 0; i < ttq.methods.length; i++) ttq.setAndDefer(ttq, ttq.methods[i]);
    ttq.instance = function(t) {
      for (
        var e = ttq._i[t] || [], n = 0; n < ttq.methods.length; n++) ttq.setAndDefer(e, ttq.methods[n]);
      return e
    }, ttq.load = function(e, n) {
      var r = "https://analytics.tiktok.com/i18n/pixel/events.js",
        o = n && n.partner;
      ttq._i = ttq._i || {}, ttq._i[e] = [], ttq._i[e]._u = r, ttq._t = ttq._t || {}, ttq._t[e] = +new Date, ttq._o = ttq._o || {}, ttq._o[e] = n || {};
      n = document.createElement("script");
      n.type = "text/javascript", n.async = !0, n.src = r + "?sdkid=" + e + "&lib=" + t;
      e = document.getElementsByTagName("script")[0];
      e.parentNode.insertBefore(n, e)
    };


    ttq.load('CSPHE1RC77UCS5RPAFIG');
    ttq.page();
  }(window, document, 'ttq');
</script>