<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AlfaWeb - {{ config('app.name', 'AlfaApps') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="/assets/icons/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIINfQkPHTL44U6Wwa7p4hQ+qEdQnQd6P9Q=" crossorigin="">
    <style>
        :root{--primary:#ff3d1f;--primary-dark:#e82f12;--primary-soft:#fff0ec;--bg:#f4f4f4;--surface:#fff;--surface-alt:#f8f8f8;--text:#22202a;--muted:#7d8494;--border:#ececec;--danger:#ef4444;--success:#22c55e;--warning:#f59e0b;--shadow:0 8px 22px rgba(20,20,20,.06)}
        *{box-sizing:border-box}body{margin:0;min-height:100vh;background:var(--bg);color:var(--text);font-family:Poppins,Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}a{text-decoration:none;color:inherit}button,input,select,textarea{font:inherit}.app{display:grid;grid-template-columns:290px 1fr;min-height:100vh}.sidebar{position:sticky;top:0;height:100vh;overflow:auto;background:#fff;border-right:1px solid var(--border);padding:14px 20px}.brand{display:flex;align-items:center;gap:13px;margin-bottom:22px}.brand-mark{width:50px;height:50px;border-radius:50%;display:grid;place-items:center;background:var(--primary);color:#fff;font-weight:900;font-size:21px;box-shadow:0 0 0 7px var(--primary-soft)}.brand-title{display:block;font-size:30px;font-weight:900;letter-spacing:-.05em;line-height:1}.brand-sub{display:block;color:var(--muted);font-size:14px;margin-top:5px}.sidebar-profile{display:flex;align-items:center;gap:14px;margin:16px 0 18px;padding:12px;border-radius:10px;background:#f3f3f3}.sidebar-avatar{width:54px;height:54px;border-radius:8px;display:grid;place-items:center;background:#d9d9d9;color:var(--primary);font-weight:900;overflow:hidden}.sidebar-profile strong,.sidebar-profile span{display:block}.sidebar-profile span{margin-top:4px;color:var(--muted);font-size:13px}.nav{display:grid;gap:8px}.nav a,.logout{width:100%;min-height:48px;display:flex;align-items:center;gap:14px;padding:0 14px;border:0;border-radius:0;background:transparent;color:#7b8495;font-weight:700;cursor:pointer;transition:.18s}.nav a i,.logout i{width:24px;text-align:center;font-size:18px}.nav a:hover,.nav a.active{background:var(--primary-soft);color:var(--primary);box-shadow:inset -4px 0 0 var(--primary)}.logout{margin-top:18px;color:var(--danger)}.logout:hover{background:#fff1f2}.main{min-width:0;background:var(--bg)}.topbar{height:80px;display:flex;align-items:center;justify-content:space-between;gap:22px;padding:0 32px;background:#fff;border-bottom:1px solid var(--border);position:sticky;top:0;z-index:20}.topbar-left{display:flex;align-items:center;gap:24px;min-width:0}.hamburger{width:34px;height:30px;display:grid;gap:5px;background:transparent;border:0;color:#7b8495}.hamburger span{display:block;height:3px;border-radius:99px;background:currentColor}.title{margin:0;font-size:24px;font-weight:900;letter-spacing:-.03em;white-space:nowrap}.eyebrow{display:none}.search-box{width:min(330px,32vw);height:52px;display:flex;align-items:center;gap:12px;padding:0 18px;border-radius:8px;background:#f4f4f4;color:var(--muted)}.search-box input{width:100%;border:0;outline:0;background:transparent;font-size:15px}.top-actions{display:flex;align-items:center;gap:14px}.icon-button{position:relative;width:44px;height:44px;display:grid;place-items:center;border:0;border-radius:10px;background:#fff;color:#768092;font-size:20px}.icon-button.add{background:#dceceb;color:#005d61;font-size:22px}.notif{position:absolute;top:-6px;right:-6px;min-width:21px;height:21px;padding:0 5px;border-radius:99px;background:var(--primary);color:#fff;font-size:11px;font-weight:900;display:grid;place-items:center}.login-pill{min-height:52px;border:0;border-radius:8px;background:var(--primary);color:white;padding:0 22px;font-weight:900}.profile{display:flex;align-items:center;gap:12px;padding:8px 10px;border-radius:12px;background:#fff}.avatar{width:42px;height:42px;border-radius:12px;display:grid;place-items:center;background:var(--primary-soft);color:var(--primary);font-weight:900;overflow:hidden}.avatar img{width:100%;height:100%;object-fit:cover}.profile strong,.profile span{display:block}.profile span span{font-size:12px;color:var(--muted);margin-top:2px}.content{padding:36px}.notice,.errors{margin-bottom:18px;padding:14px 16px;border-radius:10px;font-weight:800}.notice{background:#e9fbf4;color:#138a62}.errors{background:#fff1f3;color:var(--danger)}.stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px;margin-bottom:24px}.card,.panel,.form-card{background:var(--surface);border:1px solid var(--border);border-radius:10px;box-shadow:var(--shadow)}.stat{padding:26px 28px;min-height:130px}.stat-head{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:18px;color:var(--muted);font-size:14px;font-weight:600}.icon{width:44px;height:44px;border-radius:10px;display:grid;place-items:center}.i-primary{background:var(--primary-soft);color:var(--primary)}.i-mint{background:#e7fbf4;color:#19a978}.i-coral{background:#fff0f3;color:#ff4560}.i-orange{background:#fff6e9;color:#ff9b3d}.stat-value{font-size:32px;font-weight:900;letter-spacing:-.04em}.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:24px}.grid-3{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.panel{padding:28px}.panel h2,.form-card h2{margin:0 0 8px;font-size:24px;font-weight:900;letter-spacing:-.03em}.panel p,.form-card p{margin:0 0 20px;color:var(--muted)}.hero-card{padding:30px;background:#fff;color:var(--text);position:relative;overflow:hidden}.hero-card:after{content:"";position:absolute;right:24px;top:30px;width:120px;height:70px;border-radius:50%;background:linear-gradient(180deg,rgba(255,61,31,.18),transparent)}.hero-card small{color:var(--muted)}.hero-card .big{display:block;margin:10px 0 18px;font-size:36px;font-weight:900;letter-spacing:-.05em}.mini-row{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.mini{padding:14px;border-radius:10px;background:#f7f7f7}.category-grid{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:16px;margin-bottom:24px}.category{padding:20px;border-radius:10px;background:#fff;border:1px solid var(--border);box-shadow:var(--shadow);transition:.18s}.category:hover{transform:translateY(-2px);color:var(--primary)}.category i{margin-bottom:14px}.category strong,.category span{display:block}.category span{margin-top:4px;color:var(--muted);font-size:13px}.form-card{padding:28px}.form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}.field{display:grid;gap:8px}.field.full{grid-column:1/-1}.field label{font-size:13px;font-weight:900}.field input,.field select,.field textarea{width:100%;border:1px solid var(--border);border-radius:10px;background:#fafafa;padding:13px 14px;outline:none}.field input:focus,.field select:focus,.field textarea:focus{border-color:var(--primary);box-shadow:0 0 0 4px rgba(255,61,31,.08);background:white}.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border:0;border-radius:8px;padding:12px 18px;font-weight:900;cursor:pointer}.btn-primary{background:var(--primary);color:white}.btn-soft{background:#f4f4f4;color:#778092}.btn-danger{background:#fff1f3;color:var(--danger)}.list{display:grid;gap:12px}.item{display:flex;align-items:center;justify-content:space-between;gap:14px;padding:16px;border-bottom:1px dashed var(--border);background:#fff}.item:last-child{border-bottom:0}.item-main strong,.item-main span{display:block}.item-main span{margin-top:5px;color:var(--muted);font-size:13px}.badge{display:inline-flex;align-items:center;border-radius:999px;padding:7px 10px;font-size:12px;font-weight:900}.b-primary{background:var(--primary-soft);color:var(--primary)}.b-mint{background:#e7fbf4;color:#159a70}.b-coral{background:#fff0f3;color:#ff4560}.b-orange{background:#fff6e9;color:#d98312}.progress{height:9px;border-radius:999px;background:#f1f1f1;overflow:hidden}.progress span{display:block;height:100%;border-radius:inherit;background:var(--primary)}.tabs{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px}.empty{padding:24px;border-radius:10px;background:#fafafa;text-align:center;color:var(--muted);font-weight:700}.actions{display:flex;gap:8px;align-items:center}.text-income{color:#159a70}.text-expense{color:var(--danger)}.calendar-shell{display:grid;grid-template-columns:1fr 360px;gap:24px;margin-top:24px}.calendar-card{padding:28px}.calendar-head{display:flex;align-items:center;justify-content:space-between;gap:14px;margin-bottom:18px}.calendar-title{margin:0;font-size:24px;font-weight:900;letter-spacing:-.04em}.calendar-nav{display:flex;gap:8px}.calendar-nav button{width:42px;height:42px;display:grid;place-items:center;border:0;border-radius:8px;background:#f4f4f4;color:var(--primary);font-weight:900;cursor:pointer}.calendar-grid.is-loading{opacity:.55}.calendar-week,.calendar-grid{display:grid;grid-template-columns:repeat(7,minmax(0,1fr));gap:10px}.calendar-week{margin-bottom:10px;color:var(--muted);font-size:12px;font-weight:900;text-align:center}.calendar-day{min-height:108px;padding:10px;border:1px solid var(--border);border-radius:10px;background:#fafafa;overflow:hidden;text-align:left;color:var(--text);cursor:pointer;transition:.18s}.calendar-day:hover{transform:translateY(-1px);border-color:var(--primary)}.calendar-day.is-muted{opacity:.42}.calendar-day.is-today{border-color:var(--primary);box-shadow:0 0 0 4px rgba(255,61,31,.08);background:#fff}.calendar-day.is-selected{border-color:var(--primary);background:var(--primary-soft)}.calendar-date{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px;font-weight:900}.calendar-date span:first-child{width:30px;height:30px;display:grid;place-items:center;border-radius:8px}.calendar-day.is-today .calendar-date span:first-child,.calendar-day.is-selected .calendar-date span:first-child{background:var(--primary);color:#fff}.calendar-count{font-size:11px;color:var(--primary);background:#fff;border-radius:999px;padding:4px 8px}.calendar-events{display:grid;gap:6px}.calendar-event{padding:7px 8px;border-radius:8px;background:#fff;color:var(--text);font-size:12px;font-weight:800;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;border-left:4px solid var(--primary)}.calendar-more{color:var(--muted);font-size:12px;font-weight:800}.schedule-side{display:grid;gap:18px}.schedule-legend{display:grid;gap:10px}.legend-item{display:flex;align-items:center;gap:10px;color:var(--muted);font-size:13px;font-weight:800}.legend-dot{width:12px;height:12px;border-radius:999px;background:var(--primary)}.footer{text-align:center;color:var(--muted);padding:24px}.footer span{color:var(--primary)}
        :root{--primary:#0A7C6E;--primary-dark:#075f54;--primary-soft:#e4f5f1;--accent:#F59E0B;--accent-soft:#fff3d7;--coral:#FF6B35;--coral-soft:#fff0e9;--bg:#FAFAFA;--surface:#fff;--surface-alt:#f6faf8;--text:#111827;--muted:#737b91;--border:#e7eee9;--danger:#ef4444;--success:#0A7C6E;--warning:#F59E0B;--shadow:0 22px 55px rgba(10,124,110,.09)}body{background:linear-gradient(135deg,#FAFAFA 0%,#f2faf7 48%,#fff7eb 100%)}.sidebar{background:linear-gradient(180deg,#fff 0%,#fbfffd 100%);border-right:1px solid #dceae5}.brand-mark{background:linear-gradient(135deg,#0A7C6E,#0d9b89);box-shadow:0 0 0 8px #e4f5f1,0 18px 40px rgba(10,124,110,.22)}.brand-title{color:#0b2f2a}.brand-sub{color:#6b7d78}.sidebar-profile{background:linear-gradient(135deg,#e4f5f1,#fff7eb);border:1px solid #d5eee7}.sidebar-avatar{background:#0A7C6E;color:#fff}.nav a{border-radius:16px}.nav a:hover,.nav a.active{background:linear-gradient(135deg,#e4f5f1,#fff7eb);color:#0A7C6E;box-shadow:inset -5px 0 0 #FF6B35}.topbar{background:rgba(255,255,255,.9);backdrop-filter:blur(16px);border-bottom:1px solid #dceae5}.title{color:#0b2f2a}.search-box{background:#f1f6f4;border:1px solid #dceae5}.icon-button.add{background:#dff2ee;color:#0A7C6E}.icon-button{background:#fff;border:1px solid #e7eee9}.notif,.login-pill{background:#FF6B35}.content{background:radial-gradient(circle at top left,rgba(10,124,110,.09),transparent 22rem),radial-gradient(circle at top right,rgba(245,158,11,.14),transparent 24rem);}.card,.panel,.form-card,.category{border-color:#e7eee9;border-radius:22px;box-shadow:0 22px 55px rgba(10,124,110,.09)}.stat{position:relative;overflow:hidden}.stat:before{content:"";position:absolute;right:-26px;top:-30px;width:110px;height:110px;border-radius:999px;background:rgba(10,124,110,.08)}.stat:nth-child(2):before{background:rgba(245,158,11,.16)}.stat:nth-child(3):before{background:rgba(255,107,53,.13)}.stat:nth-child(4):before{background:rgba(10,124,110,.12)}.stat-value{color:#0b2f2a}.i-primary{background:#e4f5f1;color:#0A7C6E}.i-mint{background:#e4f5f1;color:#0A7C6E}.i-coral{background:#fff0e9;color:#FF6B35}.i-orange{background:#fff3d7;color:#F59E0B}.hero-card{background:linear-gradient(145deg,#0A7C6E,#0d9b89);color:#fff}.hero-card small,.hero-card p{color:rgba(255,255,255,.78)}.hero-card:after{background:linear-gradient(180deg,rgba(245,158,11,.38),rgba(255,107,53,.18))}.mini{background:rgba(255,255,255,.14);color:#fff}.category:hover{color:#0A7C6E;border-color:#0A7C6E}.category .icon{background:#fff0e9;color:#FF6B35}.btn-primary{background:linear-gradient(135deg,#0A7C6E,#075f54)}.btn-soft{background:#e4f5f1;color:#0A7C6E}.btn-danger{background:#fff0e9;color:#FF6B35}.b-primary{background:#e4f5f1;color:#0A7C6E}.b-orange{background:#fff3d7;color:#F59E0B}.b-coral{background:#fff0e9;color:#FF6B35}.progress span{background:linear-gradient(135deg,#0A7C6E,#F59E0B)}.calendar-day.is-today,.calendar-day.is-selected{border-color:#FF6B35;box-shadow:0 0 0 4px rgba(255,107,53,.12)}.calendar-day.is-selected{background:#fff0e9}.calendar-day.is-today .calendar-date span:first-child,.calendar-day.is-selected .calendar-date span:first-child{background:#FF6B35}.calendar-event{border-left-color:#0A7C6E;background:#fff}.calendar-nav button{background:#e4f5f1;color:#0A7C6E}.footer span{color:#0A7C6E}
        body{background:linear-gradient(135deg,#f9faf7 0%,#eef8f4 42%,#fff8ec 100%)}.app{grid-template-columns:300px 1fr}.sidebar{background:linear-gradient(180deg,#083f38 0%,#0A7C6E 72%,#08695e 100%);border-right:0;color:#fff;padding:24px 22px;box-shadow:18px 0 55px rgba(10,124,110,.12)}.brand{margin-bottom:26px}.brand-mark{background:#fff;color:#0A7C6E;box-shadow:0 14px 38px rgba(0,0,0,.16)}.brand-title{color:#fff}.brand-sub{color:rgba(255,255,255,.7)}.sidebar-profile{background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);backdrop-filter:blur(16px);border-radius:24px}.sidebar-profile span,.sidebar-profile strong{color:#fff}.sidebar-profile span span{color:rgba(255,255,255,.72)}.sidebar-avatar{background:#F59E0B;color:#fff;border-radius:18px}.nav{gap:10px}.nav a,.logout{border-radius:18px;color:rgba(255,255,255,.72);font-weight:800}.nav a:hover,.nav a.active{background:rgba(255,255,255,.96);color:#0A7C6E;box-shadow:0 16px 35px rgba(0,0,0,.16)}.nav a.active i{color:#FF6B35}.logout{color:#fff;background:rgba(255,107,53,.18)}.logout:hover{background:#FF6B35;color:#fff}.main{background:transparent}.topbar{height:86px;margin:18px 24px 0;border-radius:28px;border:1px solid rgba(10,124,110,.12);box-shadow:0 18px 45px rgba(10,124,110,.08)}.content{padding:30px 32px;background:radial-gradient(circle at 8% 0%,rgba(10,124,110,.12),transparent 26rem),radial-gradient(circle at 92% 10%,rgba(245,158,11,.16),transparent 28rem)}.title{font-size:28px;color:#083f38}.hamburger{color:#0A7C6E}.search-box{height:56px;border-radius:18px;background:#fff;border:1px solid rgba(10,124,110,.14);box-shadow:0 10px 26px rgba(10,124,110,.06)}.icon-button{border-radius:18px;box-shadow:0 10px 25px rgba(10,124,110,.07)}.icon-button.add{background:#0A7C6E;color:#fff}.login-pill{border-radius:18px;background:#FF6B35}.stats{gap:20px}.stat{min-height:150px;border-radius:28px;background:rgba(255,255,255,.88);backdrop-filter:blur(18px);border:1px solid rgba(10,124,110,.10);box-shadow:0 22px 55px rgba(10,124,110,.08)}.stat:before{right:-34px;top:-42px;width:140px;height:140px}.stat-head{font-size:15px}.stat-value{font-size:34px}.card,.panel,.form-card,.category{border-radius:30px;border:1px solid rgba(10,124,110,.10);box-shadow:0 28px 70px rgba(10,124,110,.09);background:rgba(255,255,255,.9);backdrop-filter:blur(18px)}.hero-card{border:0;background:linear-gradient(140deg,#083f38 0%,#0A7C6E 58%,#109985 100%);box-shadow:0 30px 75px rgba(10,124,110,.22)}.hero-card:after{right:34px;top:30px;width:150px;height:90px;background:linear-gradient(135deg,rgba(245,158,11,.65),rgba(255,107,53,.28));filter:blur(.2px)}.mini{background:rgba(255,255,255,.16);border:1px solid rgba(255,255,255,.16);border-radius:20px}.category-grid{gap:18px}.category{min-height:150px;padding:24px}.category:hover{transform:translateY(-5px);box-shadow:0 34px 80px rgba(10,124,110,.14)}.category .icon{border-radius:18px;background:#fff3d7;color:#F59E0B}.calendar-shell{grid-template-columns:minmax(0,1fr) 330px;gap:26px;margin-top:26px}.calendar-card{padding:30px}.calendar-title{font-size:28px;color:#083f38}.calendar-head p{font-size:16px}.calendar-week{font-size:13px;color:#60736e}.calendar-day{min-height:98px;border-radius:18px;background:rgba(255,255,255,.72);border:1px solid rgba(10,124,110,.10)}.calendar-day:hover{transform:translateY(-3px);box-shadow:0 16px 35px rgba(10,124,110,.12)}.calendar-day.is-selected{background:linear-gradient(135deg,#fff0e9,#fff8ed);border-color:#FF6B35;box-shadow:0 18px 40px rgba(255,107,53,.18)}.calendar-day.is-today{background:#fff;border-color:#0A7C6E;box-shadow:0 0 0 4px rgba(10,124,110,.10)}.calendar-date span:first-child{font-size:18px}.calendar-event{border-radius:12px;background:#e4f5f1;color:#083f38}.schedule-side .panel,.schedule-side .category{min-height:auto}.item{border-radius:18px;border:1px solid rgba(10,124,110,.08);background:#fbfefd}.empty{border-radius:20px;background:#f7fbf9;color:#6d7b78}.footer{padding:36px 0 8px;color:#7d8b86}.footer span{font-weight:900}.btn{border-radius:16px}.field input,.field select,.field textarea{border-radius:16px;background:#fbfefd}.panel h2,.form-card h2{color:#0b2f2a}.panel p,.form-card p{color:#6c778f}
        .stat:before,.hero-card:after{display:none}.stat{border-top:4px solid rgba(10,124,110,.18)}.stat:nth-child(2){border-top-color:rgba(245,158,11,.35)}.stat:nth-child(3){border-top-color:rgba(255,107,53,.35)}.stat:nth-child(4){border-top-color:rgba(10,124,110,.28)}.hero-card{background:linear-gradient(135deg,#083f38 0%,#0A7C6E 100%)}.hero-card:before{content:"";position:absolute;inset:auto 0 0 0;height:6px;background:linear-gradient(90deg,#0A7C6E,#F59E0B,#FF6B35)}.category .icon,.icon{border-radius:14px}.calendar-day.is-today .calendar-date span:first-child,.calendar-day.is-selected .calendar-date span:first-child{border-radius:10px}
        .map-card{overflow:hidden}.leaflet-map{width:100%;height:420px;min-height:320px;border-radius:22px;border:1px solid var(--border);overflow:hidden;background:#dbeafe}.leaflet-map.leaflet-container{height:420px}.leaflet-container{position:relative;overflow:hidden;font:inherit;touch-action:pan-x pan-y}.leaflet-pane,.leaflet-tile,.leaflet-marker-icon,.leaflet-marker-shadow,.leaflet-tile-container,.leaflet-pane>svg,.leaflet-pane>canvas,.leaflet-zoom-box,.leaflet-image-layer,.leaflet-layer{position:absolute;left:0;top:0}.leaflet-tile,.leaflet-marker-icon,.leaflet-marker-shadow{user-select:none;-webkit-user-drag:none}.leaflet-container img,.leaflet-container .leaflet-tile{max-width:none!important;max-height:none!important}.leaflet-tile{width:256px;height:256px}.leaflet-map-pane{z-index:400}.leaflet-tile-pane{z-index:200}.leaflet-overlay-pane{z-index:400}.leaflet-shadow-pane{z-index:500}.leaflet-marker-pane{z-index:600}.leaflet-tooltip-pane{z-index:650}.leaflet-popup-pane{z-index:700}.leaflet-control{position:relative;z-index:800;pointer-events:auto}.leaflet-top,.leaflet-bottom{position:absolute;z-index:1000;pointer-events:none}.leaflet-top{top:0}.leaflet-right{right:0}.leaflet-bottom{bottom:0}.leaflet-left{left:0}.leaflet-control-container .leaflet-top,.leaflet-control-container .leaflet-bottom{pointer-events:none}.leaflet-control-zoom{border:1px solid rgba(10,124,110,.18);border-radius:12px;overflow:hidden;box-shadow:0 10px 24px rgba(10,124,110,.14)}.leaflet-control-zoom a{display:block;width:34px;height:34px;line-height:34px;text-align:center;background:#fff;color:#0A7C6E;font-weight:900}.leaflet-control-zoom a+a{border-top:1px solid #e7eee9}.leaflet-div-icon{background:transparent;border:0}.alfa-map-pin{width:34px;height:34px;border-radius:999px 999px 999px 8px;background:#FF6B35;transform:rotate(-45deg);box-shadow:0 12px 24px rgba(255,107,53,.35);border:3px solid #fff}.alfa-map-pin:after{content:"";position:absolute;inset:8px;border-radius:999px;background:#fff}.alfa-map-pin.saved{background:#0A7C6E;box-shadow:0 12px 24px rgba(10,124,110,.32)}.map-help{display:flex;align-items:center;gap:10px;margin-top:12px;color:var(--muted);font-size:13px}.map-search{display:grid;grid-template-columns:1fr auto;gap:10px;margin:14px 0}.map-search input{width:100%;height:46px;border:1px solid var(--border);border-radius:16px;padding:0 14px;background:#fff;color:var(--text)}.map-search-results{display:grid;gap:8px;margin-bottom:14px}.map-search-result{width:100%;border:1px solid var(--border);border-radius:16px;background:#fff;padding:10px 12px;text-align:left;color:var(--text);cursor:pointer}.map-search-result:hover{border-color:#0A7C6E;background:#f2faf7}.map-search-result strong{display:block;font-size:13px}.map-search-result span{display:block;color:var(--muted);font-size:12px;margin-top:3px}.leaflet-popup-content{font-family:Poppins,Inter,ui-sans-serif,system-ui,sans-serif}.leaflet-popup-content strong{display:block;margin-bottom:4px;color:#083f38}.leaflet-popup-content span{display:block;color:#737b91;font-size:12px}.leaflet-container a{color:#0A7C6E}
        @media(max-width:1180px){.app{grid-template-columns:1fr}.sidebar{position:static;height:auto}.nav{grid-template-columns:repeat(3,minmax(0,1fr))}.stats,.category-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.grid-2,.calendar-shell{grid-template-columns:1fr}.search-box{display:none}.topbar{margin:0;border-radius:0}.content{padding:24px}.sidebar{border-radius:0}}
        @media(max-width:720px){.topbar{height:auto;align-items:flex-start;flex-direction:column;padding:18px}.content,.sidebar{padding:18px}.item{align-items:flex-start;flex-direction:column}.stats,.grid-3,.category-grid,.form-grid,.mini-row,.nav{grid-template-columns:1fr}.profile{width:100%}.actions{width:100%;justify-content:flex-end}.title{font-size:26px}.top-actions{flex-wrap:wrap}.calendar-week,.calendar-grid{gap:6px}.calendar-day{min-height:82px;padding:8px}.calendar-event{display:none}.calendar-count{font-size:10px;padding:3px 6px}.calendar-title{font-size:20px}}
    </style>
    @livewireStyles
</head>
<body>
    <livewire:web-app :page="$page" :finance-filter="request('type')" :work-target-filter="request('status')" :month="request('month')" />
    @livewireScripts
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        (() => {
            const defaultCenter = [-6.2000000, 106.8166660];
            let map;
            let pickedMarker;
            let lastSearchResults = [];
            let mapResizeObserver;

            const savedPinIcon = () => L.divIcon({
                className: '',
                html: '<span class="alfa-map-pin saved"></span>',
                iconSize: [34, 34],
                iconAnchor: [17, 34],
                popupAnchor: [0, -30],
            });

            const pickedPinIcon = () => L.divIcon({
                className: '',
                html: '<span class="alfa-map-pin"></span>',
                iconSize: [34, 34],
                iconAnchor: [17, 34],
                popupAnchor: [0, -30],
            });

            const readMarkers = () => {
                const source = document.getElementById('vacation-map-markers');
                if (!source) return [];
                try { return JSON.parse(source.textContent || '[]'); } catch (_) { return []; }
            };

            const escapeHtml = (value) => String(value ?? '').replace(/[&<>'"]/g, (char) => ({
                '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#039;', '"': '&quot;',
            }[char]));

            const dispatchPickedLocation = (latitude, longitude, address = null) => {
                if (window.Livewire) window.Livewire.dispatch('vacation-map-picked', { latitude, longitude, address });
            };

            const setPickedMarker = (latitude, longitude, label = 'Lokasi dipilih') => {
                if (!map) return;
                const position = [Number(latitude), Number(longitude)];
                if (pickedMarker) map.removeLayer(pickedMarker);
                pickedMarker = L.marker(position, { icon: pickedPinIcon() }).addTo(map).bindPopup(escapeHtml(label)).openPopup();
                map.setView(position, 15);
                refreshMapSize();
            };

            const refreshMapSize = () => {
                [0, 60, 180, 360, 800, 1400].forEach((delay) => {
                    setTimeout(() => {
                        if (map) map.invalidateSize(true);
                    }, delay);
                });
            };

            const renderSearchResults = (items) => {
                const target = document.getElementById('vacation-map-search-results');
                if (!target) return;
                if (!items.length) {
                    target.innerHTML = '<div class="empty">Lokasi tidak ditemukan.</div>';
                    return;
                }
                target.innerHTML = items.map((item, index) => {
                    const title = item.name || item.display_name?.split(',')[0] || 'Lokasi';
                    return `<button class="map-search-result" type="button" data-map-search-index="${index}"><strong>${escapeHtml(title)}</strong><span>${escapeHtml(item.display_name)}</span></button>`;
                }).join('');
            };

            const searchPlaces = async (query) => {
                const target = document.getElementById('vacation-map-search-results');
                if (target) target.innerHTML = '<div class="empty">Mencari lokasi...</div>';
                const params = new URLSearchParams({ format: 'jsonv2', limit: '5', addressdetails: '1', q: query });
                const response = await fetch(`https://nominatim.openstreetmap.org/search?${params.toString()}`);
                if (!response.ok) throw new Error('Gagal mencari lokasi.');
                lastSearchResults = await response.json();
                renderSearchResults(lastSearchResults);
            };

            const initVacationMap = () => {
                const el = document.getElementById('vacation-map');
                if (!el || typeof L === 'undefined') return;

                if (map) {
                    if (mapResizeObserver) mapResizeObserver.disconnect();
                    map.remove();
                    map = null;
                    pickedMarker = null;
                }

                const markers = readMarkers();
                const first = markers.find((item) => item.latitude && item.longitude);
                const center = first ? [Number(first.latitude), Number(first.longitude)] : defaultCenter;
                map = L.map(el, { scrollWheelZoom: true }).setView(center, first ? 12 : 6);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors',
                    crossOrigin: true,
                }).addTo(map);

                const bounds = [];
                markers.forEach((item) => {
                    if (!item.latitude || !item.longitude) return;
                    const position = [Number(item.latitude), Number(item.longitude)];
                    bounds.push(position);
                    L.marker(position, { icon: savedPinIcon() }).addTo(map).bindPopup(`<strong>${escapeHtml(item.title)}</strong><span>${escapeHtml(item.destination)}</span>`);
                });

                if (bounds.length > 1) map.fitBounds(bounds, { padding: [28, 28] });

                map.on('click', (event) => {
                    const lat = Number(event.latlng.lat.toFixed(7));
                    const lng = Number(event.latlng.lng.toFixed(7));
                    setPickedMarker(lat, lng);
                    dispatchPickedLocation(lat, lng);
                });

                if ('ResizeObserver' in window) {
                    mapResizeObserver = new ResizeObserver(() => refreshMapSize());
                    mapResizeObserver.observe(el);
                }

                refreshMapSize();
            };

            document.addEventListener('livewire:init', initVacationMap);
            document.addEventListener('livewire:navigated', initVacationMap);
            document.addEventListener('DOMContentLoaded', initVacationMap);
            window.addEventListener('load', initVacationMap);
            window.addEventListener('resize', refreshMapSize);
            document.addEventListener('submit', (event) => {
                if (event.target?.id !== 'vacation-map-search-form') return;
                event.preventDefault();
                const input = document.getElementById('vacation-map-search');
                const query = input?.value?.trim();
                if (!query) return;
                searchPlaces(query).catch(() => {
                    const target = document.getElementById('vacation-map-search-results');
                    if (target) target.innerHTML = '<div class="errors">Gagal mencari lokasi. Coba kata kunci lain.</div>';
                });
            });
            document.addEventListener('click', (event) => {
                const button = event.target?.closest?.('[data-map-search-index]');
                if (!button) return;
                const item = lastSearchResults[Number(button.dataset.mapSearchIndex)];
                if (!item) return;
                const lat = Number(Number(item.lat).toFixed(7));
                const lng = Number(Number(item.lon).toFixed(7));
                setPickedMarker(lat, lng, item.display_name || 'Lokasi dipilih');
                dispatchPickedLocation(lat, lng, item.display_name || null);
            });
        })();
    </script>
</body>
</html>
