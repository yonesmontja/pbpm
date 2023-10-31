<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c8xdSfDZX7SNfRX3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4jWeHaHcQM4N3KjV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8BlewMAUCrwvIagm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wLVYELQB0b7kkmly',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fvqsGzh77JhX4ftc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3Xa7XKrW2tk6959n',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard_siswa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard_siswa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard_guru' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard_guru',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard_tu' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard_tu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/postlogin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'postlogin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reset',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/hero' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hNUzZJSMO1Gh6qhA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/hero/herocreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ETj4zhDR9o4SsB8u',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nilai' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nilai',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/testimony' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LloKp9R4TfGKHxXq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/testimony/testimonycreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mBzFqRg02MOM1v8f',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usertest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usertest.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'usertest.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usertest/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usertest.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/siswa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UqZN3Rmm9TRbnblF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/siswa/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eaGffFgRTkctDmgQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/siswa/export_excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::C0SfjLbfsaEFQc4g',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/siswa/import_excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nwIzg1KhKSKPKM0G',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/penilaian' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::367ZzlI2E8Wc4EBU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/penilaian/penilaiancreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mbMNwOvXEoLjtQ1C',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/level' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9VAABE4d6wJHcj9L',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/level/levelcreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rXU8CirXqKv7UzuK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kelas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kelas',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kelas/kelascreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QO6Ljp3dzB5EsvbN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jurnalringkasan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jurnalringkasan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jurnalsiswa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jurnalsiswa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jurnalkelas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jurnalkelas',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jurnalbelajar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jurnalbelajar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jurnalpost' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jurnalpost',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jurnalcreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zeozTbn4U1D2nPcJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/grafiknilai' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'grafiknilai',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/grafikmateri' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'grafikmateri',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/grafikkompetensi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'grafikkompetensi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kalender' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kalender',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/full-calender' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QoHnxeYKv20UteQ2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/full-calender/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WFDBLUsT6N3y3UvA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jadwal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kalender.jadwal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'eventStore',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/incalendar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kalender.incalendar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/instorecalendar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kalender.instorecalendar',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/calendar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kkPRDpJdzDuvZxll',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/load-events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'routeLoadEvents',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/event-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'routeEventUpdate',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/event-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'routeEventStore',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/event-destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'routeEventDelete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/fast-event-destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'routeFastEventDelete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/fast-event-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'routeFastEventUpdate',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/fast-event-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'routeFastEventStore',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inbox' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xHqPDewCCcWB6oJ9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/compose' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s2SzTBKHC2psInN7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/read' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ftOCzPq8IQWtXFqy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portofolio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'portofolio',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projects' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projects',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projects-add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3viYtL1u9gQpvXZk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projects-create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LAQd2eGSzfx6DyEv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projects-edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PJhoD3HSLpAaGu5H',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/online-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hkKuiTHEUbjmjIAI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2w7fyybACBVFXZX4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/input_to' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ML47i2pvzMIBR8hH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/save_user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AXysqPbkntalr6MK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/skl' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ANMt5OVN4DgemYyM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/skl/sklcreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2Ad1pnCJ1iechege',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kompetensiinti' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XoT35XZcvK2fmjNB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kompetensiinti/kompetensiinticreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0hGmahN7Ge0yNtln',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kompetensidasar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4fwGar9FXqmXWqqO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kompetensidasar/kompetensidasarcreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HF3kkiUbZpj0c0WW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/visi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BVmcg7DjBQv1lehR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/visi/visicreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::z1SfLNzXQq265fAO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/misi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IHFJdEjTVY1ue4Nx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/misi/misicreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TxOgEoIyBdRyMUPP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tujuan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LXE9CFhkxoSUp2ta',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tujuan/tujuancreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LrMTof9sjTNeRpbi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/audit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tCHzgw9ACXs0JGH8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sasaran' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ULntPUxvrLiBivL2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sasaran/sasarancreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zIeoZDyjLc7dpZnn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/swot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pkeVLnaCa0byorBn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/swot/swotcreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CwT9GsphseBkt8L2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/swotanalysis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OkxSDk7NFUnQ3pne',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/swotanalysis/swotanalysiscreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NGxYg82czsTLH03i',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/langkahstrategis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LuYgTXgidrhNNH5n',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/langkahstrategis/langkahstrategiscreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FrBgSclFwYKX8eSx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dependent-dropdown' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dependent-dropdown.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/merk' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::t3QJgL6fjJOETaVI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/spmi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tp6flVKVRis32m9v',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/spmi/spmicreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6sSan5Gkuw37RQF5',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ppkn' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ppkn.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ppkn.import',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sekolah' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EH1kqueVZKdJHZto',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sekolah/sekolahcreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VJnmtQu9RmNnvgtE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/contacts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contacts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tahunpel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tahunpel.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tahunpel.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tahunpel/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tahunpel.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mapel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapel.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mapel.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mapel/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapel.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/posting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'posting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'posting.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/posting/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'posting.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/gurucreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r3bH8okCXRH4LNci',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rombel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rombel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rombel/rombelcreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::feVPig22zTn4kWJT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rombel_siswa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rombel-siswa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rombel/rombelsiswacreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HQpjJodIiyonkiZj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/moodle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m1gCYArksxdE9iLE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/extra/import_extra_excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hKLbjehlfgNQ4rC2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/extra' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'extra',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/extra/extracreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hBaasfuj71dZ9HPc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/extra_filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OUd48CXY1b2p60My',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/siswa/editnilai' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'siswa.editnilai',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'test',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test/testcreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ymZNJV9cOEWn3K7R',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tdu' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tdu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kurikulum' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kurikulum',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kesiswaan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kesiswaan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/widget' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uQVVBmTdbmvjDQ7k',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nilai_filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fWLxV5YRlb4ANeYj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nilai/import_excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LQeUT67AnNnsieKh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nilai/export_excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7r9AKNWXJkxl5mqm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/nilai/nilaicreate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MPeMaz97if1YGNWn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/selected-nilai' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hapusBanyak',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/posts/multi-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nilai.multi-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/audits' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6bU5Z4It24PEBPEK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/api/siswa/([^/]++)/editnilai(*:110)|/p(?|assword/reset/([^/]++)(*:145)|enilaian/([^/]++)/p(?|enilaian(?|edit(*:190)|update(*:204)|delete(*:218))|rofile(*:233))|ro(?|file/([^/]++)/profile(*:268)|jects/([^/]++)/detail(*:297))|pkn/([^/]++)/(?|edit(?|(*:329))|delete(*:344))|osting/([^/]++)(?|(*:371)|/edit(*:384)|(*:392)))|/user(?|test/([^/]++)(?|(*:426)|/edit(*:439)|(*:447))|/([^/]++)/(?|profile(*:476)|edit(*:488)|update(*:502)|delete(*:516)))|/s(?|iswa/([^/]++)/(?|e(?|dit(*:555)|xport_pdf(*:572))|update(*:587)|cover_pdf(*:604)|biodata_pdf(*:623))|kl/([^/]++)/skl(?|delete(*:656)|edit(*:668)|update(*:682))|asaran/([^/]++)/sasaran(?|delete(*:723)|edit(*:735)|update(*:749))|wot(?|/([^/]++)/swot(?|delete(*:787)|edit(*:799)|update(*:813))|analysis/([^/]++)/swotanalysis(?|delete(*:861)|edit(*:873)|update(*:887)))|pmi/([^/]++)/spmi(?|edit(*:921)|delete(*:935)|update(*:949))|ekolah/([^/]++)/(?|sekolah(?|edit(*:991)|update(*:1005)|delete(*:1020))|profile(*:1037)))|/l(?|evel/([^/]++)/(?|level(?|edit(*:1082)|update(*:1097)|delete(*:1112))|profile(*:1129))|angkahstrategis/([^/]++)/langkahstrategis(?|delete(*:1189)|edit(*:1202)|update(*:1217)))|/k(?|elas/([^/]++)/(?|kelas(?|edit(*:1262)|update(*:1277)|delete(*:1292))|profile(*:1309))|ompetensi(?|inti/([^/]++)/kompetensiinti(?|delete(*:1368)|edit(*:1381)|update(*:1396))|dasar/get/([^/]++)(*:1424)))|/jurnal/([^/]++)/(?|edit(*:1459)|update(*:1474)|delete(*:1489))|/i(?|n(?|updatecalendar/([^/]++)(*:1531)|deletecalendar/([^/]++)(*:1563))|sinilai/([^/]++)(*:1589))|/m(?|y_profile/([^/]++)/myprofile(*:1632)|isi/([^/]++)/(?|misi(?|delete(*:1670)|edit(*:1683)|update(*:1698)|profile(*:1714))|visimisiadd(*:1735))|erk/([^/]++)(*:1757)|apel/([^/]++)(?|(*:1782)|/edit(*:1796)|(*:1805)))|/visi/([^/]++)/visi(?|delete(*:1844)|edit(*:1857)|update(*:1872)|profile(*:1888)|misiadd(*:1904))|/t(?|ujuan/([^/]++)/tujuan(?|delete(*:1949)|edit(*:1962)|update(*:1977))|ahunpel/([^/]++)(?|(*:2006)|/edit(*:2020)|(*:2029))|est/([^/]++)/(?|profile(*:2062)|edit(*:2075)|update(*:2090)|delete(*:2105)|addnilai(*:2122)|([^/]++)/testdeletenilai(*:2155)|aktivasi(*:2172)))|/g(?|uru/([^/]++)/(?|guru(?|edit(*:2215)|update(*:2230)|delete(*:2245))|profile(*:2262))|et(?|Siswa/([^/]++)(*:2291)|Nama(?|Siswa/([^/]++)(*:2321)|Depan/([^/]++)(*:2344)|Belakang/([^/]++)(*:2370))))|/rombel/([^/]++)(?|/(?|profile(*:2412)|rombelsiswadelete(*:2438))|(*:2448))|/extra/([^/]++)/extra(?|delete(*:2488)|edit(*:2501)|update(*:2516))|/nilai/([^/]++)/nilai(?|delete(*:2556)|edit(*:2569)|update(*:2584))|/([^/]++)(*:2603))/?$}sDu',
    ),
    3 => 
    array (
      39 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      73 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      110 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tzlxV27yCe2pQukM',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      145 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      190 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KgsUeTmJyEE1m5ie',
          ),
          1 => 
          array (
            0 => 'penilaian',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      204 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BeHopoy6uYvyUJEX',
          ),
          1 => 
          array (
            0 => 'penilaian',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      218 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::90qOleenANo9Mbcx',
          ),
          1 => 
          array (
            0 => 'penilaian',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s2yz3X6rbiv8B4H7',
          ),
          1 => 
          array (
            0 => 'penilaian',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      268 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WNzxJPq9csmGCZmv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      297 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xwzWWi667OPR085c',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      329 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ppkn.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ppkn.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      344 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ppkn.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      371 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'posting.show',
          ),
          1 => 
          array (
            0 => 'posting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      384 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'posting.edit',
          ),
          1 => 
          array (
            0 => 'posting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      392 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'posting.update',
          ),
          1 => 
          array (
            0 => 'posting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'posting.destroy',
          ),
          1 => 
          array (
            0 => 'posting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      426 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usertest.show',
          ),
          1 => 
          array (
            0 => 'usertest',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      439 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usertest.edit',
          ),
          1 => 
          array (
            0 => 'usertest',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      447 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usertest.update',
          ),
          1 => 
          array (
            0 => 'usertest',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'usertest.destroy',
          ),
          1 => 
          array (
            0 => 'usertest',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      476 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QDwZOj0Wb9YhLefi',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::V9VF6rcFtB4xtuOg',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WVJuE91yUzgd7qC9',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YhorqevaAG9t4DxT',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      555 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aUFZp1MMVMRlMRK9',
          ),
          1 => 
          array (
            0 => 'siswa',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      572 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wG49ZGdrbr4PqYnH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7akbYbjZa9UWiMzd',
          ),
          1 => 
          array (
            0 => 'siswa',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      604 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZdOB23Y6DUhC7JpM',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      623 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R876HWspqUK8zix7',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      656 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KjgFjD6TfgzEHXFS',
          ),
          1 => 
          array (
            0 => 'skl',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      668 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lUJNGLaPWsyiYRDD',
          ),
          1 => 
          array (
            0 => 'skl',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VBU3rX1c7EPK7X5z',
          ),
          1 => 
          array (
            0 => 'skl',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      723 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QTAXZfTZqL881S2n',
          ),
          1 => 
          array (
            0 => 'sasaran',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      735 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9NNiG2paJMXTIk3v',
          ),
          1 => 
          array (
            0 => 'sasaran',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      749 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::h1N3AL6ISmrgf5oB',
          ),
          1 => 
          array (
            0 => 'sasaran',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      787 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Vt5Ie0zbajisXP7y',
          ),
          1 => 
          array (
            0 => 'swot',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      799 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::39dvooNyGIxM5SdU',
          ),
          1 => 
          array (
            0 => 'swot',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      813 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Pwx5PDgB4pnbnumM',
          ),
          1 => 
          array (
            0 => 'swot',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      861 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1f7zdfBeSKcgRHvC',
          ),
          1 => 
          array (
            0 => 'swotanalysis',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      873 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hcO5WPOJtF3P7bja',
          ),
          1 => 
          array (
            0 => 'swotanalysis',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      887 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NeesXw5oi8gMXJ7a',
          ),
          1 => 
          array (
            0 => 'swotanalysis',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      921 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KZxxCBdU6WRmtPZk',
          ),
          1 => 
          array (
            0 => 'spmi',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      935 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fcgcmh26YC7VZG7J',
          ),
          1 => 
          array (
            0 => 'spmi',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      949 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::z2NgbTn4NUA1Nbkf',
          ),
          1 => 
          array (
            0 => 'spmi',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      991 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZsiiFudme3bmey6E',
          ),
          1 => 
          array (
            0 => 'sekolah',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1005 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vfFWOE8PbrJGgnpE',
          ),
          1 => 
          array (
            0 => 'sekolah',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1020 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::58jKokRph3xIKVKz',
          ),
          1 => 
          array (
            0 => 'sekolah',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1037 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fN0IHm5E5zOu7ICW',
          ),
          1 => 
          array (
            0 => 'sekolah',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1082 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0JrLsCZJZPEK1ZKN',
          ),
          1 => 
          array (
            0 => 'level',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1097 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6OsJjr1LEEsEBiUe',
          ),
          1 => 
          array (
            0 => 'level',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aaKngfPWfdWQK6Cp',
          ),
          1 => 
          array (
            0 => 'level',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1129 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::69b66c9VLNFoO4mi',
          ),
          1 => 
          array (
            0 => 'level',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::74KBFk1dsBfp7tw2',
          ),
          1 => 
          array (
            0 => 'langkahstrategis',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1202 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6ij4gsUnsa40EOow',
          ),
          1 => 
          array (
            0 => 'langkahstrategis',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0J1kWFuIYJ2DPjB7',
          ),
          1 => 
          array (
            0 => 'langkahstrategis',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1262 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m4JcsHsWpWrx56lc',
          ),
          1 => 
          array (
            0 => 'kelas',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1277 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yGQfLuK0Si9aaAMA',
          ),
          1 => 
          array (
            0 => 'kelas',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1292 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dLdHE6jG6HPCJK6m',
          ),
          1 => 
          array (
            0 => 'kelas',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ucjIwAeR2X6DP5st',
          ),
          1 => 
          array (
            0 => 'kelas',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Yb7d4VvDljN4gfqL',
          ),
          1 => 
          array (
            0 => 'ki',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1381 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hFZ2l2KTj17KGOAJ',
          ),
          1 => 
          array (
            0 => 'ki',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1396 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RWtvXpUc141Xu6um',
          ),
          1 => 
          array (
            0 => 'ki',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RIZ1j5Z2Iotscxqk',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ao9hWnH1Jzpk5SgN',
          ),
          1 => 
          array (
            0 => 'jurnal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4ZdXNhPXhuPz4vRY',
          ),
          1 => 
          array (
            0 => 'jurnal',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9HMRIYbPWec51vOT',
          ),
          1 => 
          array (
            0 => 'jurnal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1531 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kalender.inupdatecalendar',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1563 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kalender.indeletecalendar',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1589 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'isinilai',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1632 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aegOgBv50XhaT6Oc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1670 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3ikNEEtu55yj9cIQ',
          ),
          1 => 
          array (
            0 => 'misi',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1683 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mHDYLaU8A6zHsRaA',
          ),
          1 => 
          array (
            0 => 'misi',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1698 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F6LbVRwMrFkvUM5g',
          ),
          1 => 
          array (
            0 => 'misi',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1714 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RJRS9IaDniEk9Bac',
          ),
          1 => 
          array (
            0 => 'misi',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1735 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::okH2R5EWM0IBRpuT',
          ),
          1 => 
          array (
            0 => 'misi',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9CnFPAtlFSTx0cqJ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1782 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapel.show',
          ),
          1 => 
          array (
            0 => 'mapel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1796 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapel.edit',
          ),
          1 => 
          array (
            0 => 'mapel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1805 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapel.update',
          ),
          1 => 
          array (
            0 => 'mapel',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mapel.destroy',
          ),
          1 => 
          array (
            0 => 'mapel',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1844 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IqQsEM2ANWvo6QYG',
          ),
          1 => 
          array (
            0 => 'visi',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1857 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1B01udOSfKrH3ITp',
          ),
          1 => 
          array (
            0 => 'visi',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1872 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zNy1ZrepYBJPWzu9',
          ),
          1 => 
          array (
            0 => 'visi',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1888 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QasVQ2GdiwWDjn3z',
          ),
          1 => 
          array (
            0 => 'visi',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1904 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nifoVhuFbVysfBGZ',
          ),
          1 => 
          array (
            0 => 'visi',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1949 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Gi0r0t6z2edP3Go6',
          ),
          1 => 
          array (
            0 => 'tujuan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1962 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tpBkpERHk3qiSXxE',
          ),
          1 => 
          array (
            0 => 'tujuan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1977 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9pyLo6nzdJMU33SG',
          ),
          1 => 
          array (
            0 => 'tujuan',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tahunpel.show',
          ),
          1 => 
          array (
            0 => 'tahunpel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2020 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tahunpel.edit',
          ),
          1 => 
          array (
            0 => 'tahunpel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2029 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tahunpel.update',
          ),
          1 => 
          array (
            0 => 'tahunpel',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tahunpel.destroy',
          ),
          1 => 
          array (
            0 => 'tahunpel',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2062 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'testsiswaprofile',
          ),
          1 => 
          array (
            0 => 'siswa',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2075 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CRSGwSwi3e7RbbCs',
          ),
          1 => 
          array (
            0 => 'siswa',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2090 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nFi5yZbChy3sDqPN',
          ),
          1 => 
          array (
            0 => 'siswa',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2105 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bQusRF0CZ0SP4qGM',
          ),
          1 => 
          array (
            0 => 'siswa',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2122 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::08nxhHW8TdlWEqSK',
          ),
          1 => 
          array (
            0 => 'siswa',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OKnQKXRRMNa2qT2X',
          ),
          1 => 
          array (
            0 => 'siswa',
            1 => 'idmapel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2172 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AjCryFjJ2e5rVu9L',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2215 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::woKwYR4x8ItRNOku',
          ),
          1 => 
          array (
            0 => 'guru',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2230 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3mxj8zetumxzRKGi',
          ),
          1 => 
          array (
            0 => 'guru',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2245 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pSDuiXvZgMaRfQYn',
          ),
          1 => 
          array (
            0 => 'guru',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2262 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gHzS6tUoPysWpIjY',
          ),
          1 => 
          array (
            0 => 'guru',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2291 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hv3z9GvU6JhZkgjh',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2321 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g11aorKKaaWNe7Cc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2344 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QgBOtECBtJ0xnVSA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2370 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Hs4Jj7CcxP7XYSha',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2412 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LFSBTVKw44lyfLnx',
          ),
          1 => 
          array (
            0 => 'rombel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JMR7XPm6wrR4jMzc',
          ),
          1 => 
          array (
            0 => 'siswa_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2448 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XgvsTHq6SSbTXLz8',
          ),
          1 => 
          array (
            0 => 'rombel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JgylvUObLPPqWREH',
          ),
          1 => 
          array (
            0 => 'extra',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2501 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OZIfAjEnC8SXNihE',
          ),
          1 => 
          array (
            0 => 'extra',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vCaHV7INK7ZaTSxg',
          ),
          1 => 
          array (
            0 => 'extra',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2556 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IOsQ7QXbOGrjdruB',
          ),
          1 => 
          array (
            0 => 'nilai',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2569 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8qhh1cdM6Gy0YaCz',
          ),
          1 => 
          array (
            0 => 'nilai',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2584 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mupoxTNlokdPmVwp',
          ),
          1 => 
          array (
            0 => 'nilai',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2603 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'site.single.post',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c8xdSfDZX7SNfRX3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005d40000000000000000";}";s:4:"hash";s:44:"QDugm1GmZMdlN6JfQ+J07hSDLC5MWc47h8WUpJpnJIE=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::c8xdSfDZX7SNfRX3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tzlxV27yCe2pQukM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/siswa/{id}/editnilai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@editnilai',
        'controller' => 'App\\Http\\Controllers\\ApiController@editnilai',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::tzlxV27yCe2pQukM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4jWeHaHcQM4N3KjV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HeroController@index',
        'controller' => 'App\\Http\\Controllers\\HeroController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4jWeHaHcQM4N3KjV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8BlewMAUCrwvIagm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8BlewMAUCrwvIagm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fvqsGzh77JhX4ftc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::fvqsGzh77JhX4ftc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3Xa7XKrW2tk6959n' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::3Xa7XKrW2tk6959n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard_siswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard_siswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@dashboard_siswa',
        'controller' => 'App\\Http\\Controllers\\DashboardController@dashboard_siswa',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard_siswa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard_guru' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard_guru',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@dashboard_guru',
        'controller' => 'App\\Http\\Controllers\\DashboardController@dashboard_guru',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard_guru',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard_tu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard_tu',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@dashboard_tu',
        'controller' => 'App\\Http\\Controllers\\DashboardController@dashboard_tu',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard_tu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'postlogin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'postlogin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@postlogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@postlogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'postlogin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wLVYELQB0b7kkmly' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::wLVYELQB0b7kkmly',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@reset',
        'controller' => 'App\\Http\\Controllers\\AuthController@reset',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hNUzZJSMO1Gh6qhA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'hero',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HeroController@hero',
        'controller' => 'App\\Http\\Controllers\\HeroController@hero',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hNUzZJSMO1Gh6qhA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ETj4zhDR9o4SsB8u' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'hero/herocreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HeroController@herocreate',
        'controller' => 'App\\Http\\Controllers\\HeroController@herocreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ETj4zhDR9o4SsB8u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nilai' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nilai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@nilai',
        'controller' => 'App\\Http\\Controllers\\NilaiController@nilai',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'nilai',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LloKp9R4TfGKHxXq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'testimony',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TestimonyController@testimony',
        'controller' => 'App\\Http\\Controllers\\TestimonyController@testimony',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LloKp9R4TfGKHxXq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mBzFqRg02MOM1v8f' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'testimony/testimonycreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TestimonyController@testimonycreate',
        'controller' => 'App\\Http\\Controllers\\TestimonyController@testimonycreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mBzFqRg02MOM1v8f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usertest.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usertest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'as' => 'usertest.index',
        'uses' => 'App\\Http\\Controllers\\UsertestController@index',
        'controller' => 'App\\Http\\Controllers\\UsertestController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usertest.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usertest/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'as' => 'usertest.create',
        'uses' => 'App\\Http\\Controllers\\UsertestController@create',
        'controller' => 'App\\Http\\Controllers\\UsertestController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usertest.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usertest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'as' => 'usertest.store',
        'uses' => 'App\\Http\\Controllers\\UsertestController@store',
        'controller' => 'App\\Http\\Controllers\\UsertestController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usertest.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usertest/{usertest}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'as' => 'usertest.show',
        'uses' => 'App\\Http\\Controllers\\UsertestController@show',
        'controller' => 'App\\Http\\Controllers\\UsertestController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usertest.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usertest/{usertest}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'as' => 'usertest.edit',
        'uses' => 'App\\Http\\Controllers\\UsertestController@edit',
        'controller' => 'App\\Http\\Controllers\\UsertestController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usertest.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'usertest/{usertest}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'as' => 'usertest.update',
        'uses' => 'App\\Http\\Controllers\\UsertestController@update',
        'controller' => 'App\\Http\\Controllers\\UsertestController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usertest.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'usertest/{usertest}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'as' => 'usertest.destroy',
        'uses' => 'App\\Http\\Controllers\\UsertestController@destroy',
        'controller' => 'App\\Http\\Controllers\\UsertestController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UqZN3Rmm9TRbnblF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@index',
        'controller' => 'App\\Http\\Controllers\\SiswaController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::UqZN3Rmm9TRbnblF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eaGffFgRTkctDmgQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'siswa/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@create',
        'controller' => 'App\\Http\\Controllers\\SiswaController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::eaGffFgRTkctDmgQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aUFZp1MMVMRlMRK9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/{siswa}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@edit',
        'controller' => 'App\\Http\\Controllers\\SiswaController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::aUFZp1MMVMRlMRK9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7akbYbjZa9UWiMzd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'siswa/{siswa}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@update',
        'controller' => 'App\\Http\\Controllers\\SiswaController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::7akbYbjZa9UWiMzd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::C0SfjLbfsaEFQc4g' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/export_excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@export_excel',
        'controller' => 'App\\Http\\Controllers\\SiswaController@export_excel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::C0SfjLbfsaEFQc4g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nwIzg1KhKSKPKM0G' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'siswa/import_excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@import_excel',
        'controller' => 'App\\Http\\Controllers\\SiswaController@import_excel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nwIzg1KhKSKPKM0G',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::367ZzlI2E8Wc4EBU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'penilaian',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PenilaianController@index',
        'controller' => 'App\\Http\\Controllers\\PenilaianController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::367ZzlI2E8Wc4EBU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mbMNwOvXEoLjtQ1C' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'penilaian/penilaiancreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PenilaianController@penilaiancreate',
        'controller' => 'App\\Http\\Controllers\\PenilaianController@penilaiancreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mbMNwOvXEoLjtQ1C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KgsUeTmJyEE1m5ie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'penilaian/{penilaian}/penilaianedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PenilaianController@penilaianedit',
        'controller' => 'App\\Http\\Controllers\\PenilaianController@penilaianedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::KgsUeTmJyEE1m5ie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BeHopoy6uYvyUJEX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'penilaian/{penilaian}/penilaianupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PenilaianController@penilaianupdate',
        'controller' => 'App\\Http\\Controllers\\PenilaianController@penilaianupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::BeHopoy6uYvyUJEX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::90qOleenANo9Mbcx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'penilaian/{penilaian}/penilaiandelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PenilaianController@penilaiandelete',
        'controller' => 'App\\Http\\Controllers\\PenilaianController@penilaiandelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::90qOleenANo9Mbcx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s2yz3X6rbiv8B4H7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'penilaian/{penilaian}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PenilaianController@profile',
        'controller' => 'App\\Http\\Controllers\\PenilaianController@profile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::s2yz3X6rbiv8B4H7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9VAABE4d6wJHcj9L' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'level',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LevelController@index',
        'controller' => 'App\\Http\\Controllers\\LevelController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9VAABE4d6wJHcj9L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rXU8CirXqKv7UzuK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'level/levelcreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LevelController@levelcreate',
        'controller' => 'App\\Http\\Controllers\\LevelController@levelcreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::rXU8CirXqKv7UzuK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0JrLsCZJZPEK1ZKN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'level/{level}/leveledit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LevelController@leveledit',
        'controller' => 'App\\Http\\Controllers\\LevelController@leveledit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0JrLsCZJZPEK1ZKN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6OsJjr1LEEsEBiUe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'level/{level}/levelupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LevelController@levelupdate',
        'controller' => 'App\\Http\\Controllers\\LevelController@levelupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::6OsJjr1LEEsEBiUe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aaKngfPWfdWQK6Cp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'level/{level}/leveldelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LevelController@leveldelete',
        'controller' => 'App\\Http\\Controllers\\LevelController@leveldelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::aaKngfPWfdWQK6Cp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::69b66c9VLNFoO4mi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'level/{level}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LevelController@profile',
        'controller' => 'App\\Http\\Controllers\\LevelController@profile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::69b66c9VLNFoO4mi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kelas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kelas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KelasController@index',
        'controller' => 'App\\Http\\Controllers\\KelasController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kelas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QO6Ljp3dzB5EsvbN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'kelas/kelascreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KelasController@kelascreate',
        'controller' => 'App\\Http\\Controllers\\KelasController@kelascreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::QO6Ljp3dzB5EsvbN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::m4JcsHsWpWrx56lc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kelas/{kelas}/kelasedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KelasController@kelasedit',
        'controller' => 'App\\Http\\Controllers\\KelasController@kelasedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::m4JcsHsWpWrx56lc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yGQfLuK0Si9aaAMA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'kelas/{kelas}/kelasupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KelasController@kelasupdate',
        'controller' => 'App\\Http\\Controllers\\KelasController@kelasupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::yGQfLuK0Si9aaAMA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dLdHE6jG6HPCJK6m' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kelas/{kelas}/kelasdelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KelasController@kelasdelete',
        'controller' => 'App\\Http\\Controllers\\KelasController@kelasdelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::dLdHE6jG6HPCJK6m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ucjIwAeR2X6DP5st' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kelas/{kelas}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KelasController@profile',
        'controller' => 'App\\Http\\Controllers\\KelasController@profile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ucjIwAeR2X6DP5st',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jurnalringkasan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jurnalringkasan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@index',
        'controller' => 'App\\Http\\Controllers\\JurnalController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'jurnalringkasan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jurnalsiswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jurnalsiswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@jurnalsiswa',
        'controller' => 'App\\Http\\Controllers\\JurnalController@jurnalsiswa',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'jurnalsiswa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jurnalkelas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jurnalkelas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@jurnalkelas',
        'controller' => 'App\\Http\\Controllers\\JurnalController@jurnalkelas',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'jurnalkelas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jurnalbelajar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jurnalbelajar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@jurnalbelajar',
        'controller' => 'App\\Http\\Controllers\\JurnalController@jurnalbelajar',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'jurnalbelajar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jurnalpost' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jurnalpost',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@jurnalpost',
        'controller' => 'App\\Http\\Controllers\\JurnalController@jurnalpost',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'jurnalpost',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zeozTbn4U1D2nPcJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'jurnalcreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@jurnalcreate',
        'controller' => 'App\\Http\\Controllers\\JurnalController@jurnalcreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::zeozTbn4U1D2nPcJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ao9hWnH1Jzpk5SgN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jurnal/{jurnal}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@jurnaledit',
        'controller' => 'App\\Http\\Controllers\\JurnalController@jurnaledit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ao9hWnH1Jzpk5SgN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4ZdXNhPXhuPz4vRY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'jurnal/{jurnal}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@jurnalupdate',
        'controller' => 'App\\Http\\Controllers\\JurnalController@jurnalupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4ZdXNhPXhuPz4vRY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9HMRIYbPWec51vOT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jurnal/{jurnal}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@jurnaldelete',
        'controller' => 'App\\Http\\Controllers\\JurnalController@jurnaldelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9HMRIYbPWec51vOT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'grafiknilai' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'grafiknilai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\GrafikController@grafiknilai',
        'controller' => 'App\\Http\\Controllers\\GrafikController@grafiknilai',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'grafiknilai',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'grafikmateri' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'grafikmateri',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\GrafikController@grafikmateri',
        'controller' => 'App\\Http\\Controllers\\GrafikController@grafikmateri',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'grafikmateri',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'grafikkompetensi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'grafikkompetensi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\GrafikController@grafikkompetensi',
        'controller' => 'App\\Http\\Controllers\\GrafikController@grafikkompetensi',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'grafikkompetensi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kalender' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kalender',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KalenderController@kalender',
        'controller' => 'App\\Http\\Controllers\\KalenderController@kalender',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kalender',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QoHnxeYKv20UteQ2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'full-calender',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KalenderController@index',
        'controller' => 'App\\Http\\Controllers\\KalenderController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::QoHnxeYKv20UteQ2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WFDBLUsT6N3y3UvA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'full-calender/action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KalenderController@action',
        'controller' => 'App\\Http\\Controllers\\KalenderController@action',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::WFDBLUsT6N3y3UvA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kalender.jadwal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jadwal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JadwalController@index',
        'controller' => 'App\\Http\\Controllers\\JadwalController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kalender.jadwal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'eventStore' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JadwalController@store',
        'controller' => 'App\\Http\\Controllers\\JadwalController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'eventStore',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kalender.incalendar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'incalendar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KalenderController@incalendar',
        'controller' => 'App\\Http\\Controllers\\KalenderController@incalendar',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kalender.incalendar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kalender.instorecalendar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'instorecalendar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KalenderController@instorecalendar',
        'controller' => 'App\\Http\\Controllers\\KalenderController@instorecalendar',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kalender.instorecalendar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kalender.inupdatecalendar' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'inupdatecalendar/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KalenderController@inupdatecalendar',
        'controller' => 'App\\Http\\Controllers\\KalenderController@inupdatecalendar',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kalender.inupdatecalendar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kalender.indeletecalendar' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'indeletecalendar/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KalenderController@indeletecalendar',
        'controller' => 'App\\Http\\Controllers\\KalenderController@indeletecalendar',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kalender.indeletecalendar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kkPRDpJdzDuvZxll' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'calendar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FullCalendarController@index',
        'controller' => 'App\\Http\\Controllers\\FullCalendarController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::kkPRDpJdzDuvZxll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'routeLoadEvents' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'load-events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@loadEvents',
        'controller' => 'App\\Http\\Controllers\\EventController@loadEvents',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'routeLoadEvents',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'routeEventUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'event-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@update',
        'controller' => 'App\\Http\\Controllers\\EventController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'routeEventUpdate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'routeEventStore' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'event-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@store',
        'controller' => 'App\\Http\\Controllers\\EventController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'routeEventStore',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'routeEventDelete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'event-destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@destroy',
        'controller' => 'App\\Http\\Controllers\\EventController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'routeEventDelete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'routeFastEventDelete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'fast-event-destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FastEventController@destroy',
        'controller' => 'App\\Http\\Controllers\\FastEventController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'routeFastEventDelete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'routeFastEventUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'fast-event-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FastEventController@update',
        'controller' => 'App\\Http\\Controllers\\FastEventController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'routeFastEventUpdate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'routeFastEventStore' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'fast-event-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FastEventController@store',
        'controller' => 'App\\Http\\Controllers\\FastEventController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'routeFastEventStore',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xHqPDewCCcWB6oJ9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inbox',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MailboxController@inbox',
        'controller' => 'App\\Http\\Controllers\\MailboxController@inbox',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::xHqPDewCCcWB6oJ9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s2SzTBKHC2psInN7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'compose',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MailboxController@compose',
        'controller' => 'App\\Http\\Controllers\\MailboxController@compose',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::s2SzTBKHC2psInN7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ftOCzPq8IQWtXFqy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MailboxController@read',
        'controller' => 'App\\Http\\Controllers\\MailboxController@read',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ftOCzPq8IQWtXFqy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WNzxJPq9csmGCZmv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/{id}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@profile1',
        'controller' => 'App\\Http\\Controllers\\UserController@profile1',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::WNzxJPq9csmGCZmv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'portofolio' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portofolio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@portofolio',
        'controller' => 'App\\Http\\Controllers\\UserController@portofolio',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'portofolio',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projects' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@projects',
        'controller' => 'App\\Http\\Controllers\\ProjectController@projects',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'projects',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3viYtL1u9gQpvXZk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects-add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@projects_add',
        'controller' => 'App\\Http\\Controllers\\ProjectController@projects_add',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::3viYtL1u9gQpvXZk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LAQd2eGSzfx6DyEv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'projects-create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@projects_create',
        'controller' => 'App\\Http\\Controllers\\ProjectController@projects_create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LAQd2eGSzfx6DyEv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PJhoD3HSLpAaGu5H' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects-edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@projects_edit',
        'controller' => 'App\\Http\\Controllers\\ProjectController@projects_edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::PJhoD3HSLpAaGu5H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xwzWWi667OPR085c' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects/{id}/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@projects_detail',
        'controller' => 'App\\Http\\Controllers\\ProjectController@projects_detail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::xwzWWi667OPR085c',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hkKuiTHEUbjmjIAI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'online-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\UserController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hkKuiTHEUbjmjIAI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@user',
        'controller' => 'App\\Http\\Controllers\\UserController@user',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QDwZOj0Wb9YhLefi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/{id}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,siswa,guru,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@userprofile',
        'controller' => 'App\\Http\\Controllers\\UserController@userprofile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::QDwZOj0Wb9YhLefi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aegOgBv50XhaT6Oc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'my_profile/{id}/myprofile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,siswa,guru,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@my_profile',
        'controller' => 'App\\Http\\Controllers\\UserController@my_profile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::aegOgBv50XhaT6Oc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2w7fyybACBVFXZX4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@create',
        'controller' => 'App\\Http\\Controllers\\UserController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::2w7fyybACBVFXZX4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::V9VF6rcFtB4xtuOg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,siswa,guru,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@useredit',
        'controller' => 'App\\Http\\Controllers\\UserController@useredit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::V9VF6rcFtB4xtuOg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WVJuE91yUzgd7qC9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/{user}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,siswa,guru,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@userupdate',
        'controller' => 'App\\Http\\Controllers\\UserController@userupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::WVJuE91yUzgd7qC9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YhorqevaAG9t4DxT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/{user}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@userdelete',
        'controller' => 'App\\Http\\Controllers\\UserController@userdelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::YhorqevaAG9t4DxT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ML47i2pvzMIBR8hH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'input_to',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:272:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:54:"function () {
        return \\view(\'user.form\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000009e90000000000000000";}";s:4:"hash";s:44:"5ZSQiJ7Rl4Qc0a94930FghPBMykpIDTItLBySgefnw4=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ML47i2pvzMIBR8hH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AXysqPbkntalr6MK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'save_user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@save_user',
        'controller' => 'App\\Http\\Controllers\\UserController@save_user',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::AXysqPbkntalr6MK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ANMt5OVN4DgemYyM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'skl',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SklController@skl',
        'controller' => 'App\\Http\\Controllers\\SklController@skl',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ANMt5OVN4DgemYyM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2Ad1pnCJ1iechege' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'skl/sklcreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SklController@sklcreate',
        'controller' => 'App\\Http\\Controllers\\SklController@sklcreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::2Ad1pnCJ1iechege',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KjgFjD6TfgzEHXFS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'skl/{skl}/skldelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SklController@skldelete',
        'controller' => 'App\\Http\\Controllers\\SklController@skldelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::KjgFjD6TfgzEHXFS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lUJNGLaPWsyiYRDD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'skl/{skl}/skledit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SklController@skledit',
        'controller' => 'App\\Http\\Controllers\\SklController@skledit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::lUJNGLaPWsyiYRDD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VBU3rX1c7EPK7X5z' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'skl/{skl}/sklupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SklController@sklupdate',
        'controller' => 'App\\Http\\Controllers\\SklController@sklupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VBU3rX1c7EPK7X5z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XoT35XZcvK2fmjNB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kompetensiinti',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiinti',
        'controller' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiinti',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::XoT35XZcvK2fmjNB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0hGmahN7Ge0yNtln' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'kompetensiinti/kompetensiinticreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiinticreate',
        'controller' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiinticreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0hGmahN7Ge0yNtln',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Yb7d4VvDljN4gfqL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kompetensiinti/{ki}/kompetensiintidelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiintidelete',
        'controller' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiintidelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Yb7d4VvDljN4gfqL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hFZ2l2KTj17KGOAJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kompetensiinti/{ki}/kompetensiintiedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiintiedit',
        'controller' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiintiedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hFZ2l2KTj17KGOAJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RWtvXpUc141Xu6um' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'kompetensiinti/{ki}/kompetensiintiupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiintiupdate',
        'controller' => 'App\\Http\\Controllers\\KompetensiintiController@kompetensiintiupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::RWtvXpUc141Xu6um',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4fwGar9FXqmXWqqO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kompetensidasar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KompetensidasarController@kompetensidasar',
        'controller' => 'App\\Http\\Controllers\\KompetensidasarController@kompetensidasar',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4fwGar9FXqmXWqqO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HF3kkiUbZpj0c0WW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'kompetensidasar/kompetensidasarcreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KompetensidasarController@kompetensidasarcreate',
        'controller' => 'App\\Http\\Controllers\\KompetensidasarController@kompetensidasarcreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HF3kkiUbZpj0c0WW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RIZ1j5Z2Iotscxqk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kompetensidasar/get/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KompetensidasarController@getStates',
        'controller' => 'App\\Http\\Controllers\\KompetensidasarController@getStates',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::RIZ1j5Z2Iotscxqk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BVmcg7DjBQv1lehR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'visi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VisiController@visi',
        'controller' => 'App\\Http\\Controllers\\VisiController@visi',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::BVmcg7DjBQv1lehR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::z1SfLNzXQq265fAO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'visi/visicreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VisiController@visicreate',
        'controller' => 'App\\Http\\Controllers\\VisiController@visicreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::z1SfLNzXQq265fAO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IqQsEM2ANWvo6QYG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'visi/{visi}/visidelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VisiController@visidelete',
        'controller' => 'App\\Http\\Controllers\\VisiController@visidelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::IqQsEM2ANWvo6QYG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1B01udOSfKrH3ITp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'visi/{visi}/visiedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VisiController@visiedit',
        'controller' => 'App\\Http\\Controllers\\VisiController@visiedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::1B01udOSfKrH3ITp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zNy1ZrepYBJPWzu9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'visi/{visi}/visiupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VisiController@visiupdate',
        'controller' => 'App\\Http\\Controllers\\VisiController@visiupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::zNy1ZrepYBJPWzu9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QasVQ2GdiwWDjn3z' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'visi/{visi}/visiprofile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VisiController@visiprofile',
        'controller' => 'App\\Http\\Controllers\\VisiController@visiprofile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::QasVQ2GdiwWDjn3z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nifoVhuFbVysfBGZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'visi/{visi}/visimisiadd',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VisiController@visimisiadd',
        'controller' => 'App\\Http\\Controllers\\VisiController@visimisiadd',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nifoVhuFbVysfBGZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IHFJdEjTVY1ue4Nx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'misi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MisiController@misi',
        'controller' => 'App\\Http\\Controllers\\MisiController@misi',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::IHFJdEjTVY1ue4Nx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TxOgEoIyBdRyMUPP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'misi/misicreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MisiController@misicreate',
        'controller' => 'App\\Http\\Controllers\\MisiController@misicreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::TxOgEoIyBdRyMUPP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3ikNEEtu55yj9cIQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'misi/{misi}/misidelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MisiController@misidelete',
        'controller' => 'App\\Http\\Controllers\\MisiController@misidelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::3ikNEEtu55yj9cIQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mHDYLaU8A6zHsRaA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'misi/{misi}/misiedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MisiController@misiedit',
        'controller' => 'App\\Http\\Controllers\\MisiController@misiedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mHDYLaU8A6zHsRaA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F6LbVRwMrFkvUM5g' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'misi/{misi}/misiupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MisiController@misiupdate',
        'controller' => 'App\\Http\\Controllers\\MisiController@misiupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::F6LbVRwMrFkvUM5g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RJRS9IaDniEk9Bac' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'misi/{misi}/misiprofile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MisiController@misiprofile',
        'controller' => 'App\\Http\\Controllers\\MisiController@misiprofile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::RJRS9IaDniEk9Bac',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::okH2R5EWM0IBRpuT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'misi/{misi}/visimisiadd',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MisiController@visimisiadd',
        'controller' => 'App\\Http\\Controllers\\MisiController@visimisiadd',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::okH2R5EWM0IBRpuT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LXE9CFhkxoSUp2ta' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tujuan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TujuanController@tujuan',
        'controller' => 'App\\Http\\Controllers\\TujuanController@tujuan',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LXE9CFhkxoSUp2ta',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LrMTof9sjTNeRpbi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'tujuan/tujuancreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TujuanController@tujuancreate',
        'controller' => 'App\\Http\\Controllers\\TujuanController@tujuancreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LrMTof9sjTNeRpbi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Gi0r0t6z2edP3Go6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tujuan/{tujuan}/tujuandelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TujuanController@tujuandelete',
        'controller' => 'App\\Http\\Controllers\\TujuanController@tujuandelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Gi0r0t6z2edP3Go6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tpBkpERHk3qiSXxE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tujuan/{tujuan}/tujuanedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TujuanController@tujuanedit',
        'controller' => 'App\\Http\\Controllers\\TujuanController@tujuanedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::tpBkpERHk3qiSXxE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9pyLo6nzdJMU33SG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'tujuan/{tujuan}/tujuanupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TujuanController@tujuanupdate',
        'controller' => 'App\\Http\\Controllers\\TujuanController@tujuanupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9pyLo6nzdJMU33SG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tCHzgw9ACXs0JGH8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'audit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@audit',
        'controller' => 'App\\Http\\Controllers\\NilaiController@audit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::tCHzgw9ACXs0JGH8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ULntPUxvrLiBivL2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sasaran',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SasaranController@sasaran',
        'controller' => 'App\\Http\\Controllers\\SasaranController@sasaran',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ULntPUxvrLiBivL2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zIeoZDyjLc7dpZnn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sasaran/sasarancreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SasaranController@sasarancreate',
        'controller' => 'App\\Http\\Controllers\\SasaranController@sasarancreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::zIeoZDyjLc7dpZnn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QTAXZfTZqL881S2n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sasaran/{sasaran}/sasarandelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SasaranController@sasarandelete',
        'controller' => 'App\\Http\\Controllers\\SasaranController@sasarandelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::QTAXZfTZqL881S2n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9NNiG2paJMXTIk3v' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sasaran/{sasaran}/sasaranedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SasaranController@sasaranedit',
        'controller' => 'App\\Http\\Controllers\\SasaranController@sasaranedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9NNiG2paJMXTIk3v',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::h1N3AL6ISmrgf5oB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sasaran/{sasaran}/sasaranupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SasaranController@sasaranupdate',
        'controller' => 'App\\Http\\Controllers\\SasaranController@sasaranupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::h1N3AL6ISmrgf5oB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pkeVLnaCa0byorBn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'swot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotController@swot',
        'controller' => 'App\\Http\\Controllers\\SwotController@swot',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pkeVLnaCa0byorBn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CwT9GsphseBkt8L2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'swot/swotcreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotController@swotcreate',
        'controller' => 'App\\Http\\Controllers\\SwotController@swotcreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::CwT9GsphseBkt8L2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Vt5Ie0zbajisXP7y' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'swot/{swot}/swotdelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotController@swotdelete',
        'controller' => 'App\\Http\\Controllers\\SwotController@swotdelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Vt5Ie0zbajisXP7y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::39dvooNyGIxM5SdU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'swot/{swot}/swotedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotController@swotedit',
        'controller' => 'App\\Http\\Controllers\\SwotController@swotedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::39dvooNyGIxM5SdU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Pwx5PDgB4pnbnumM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'swot/{swot}/swotupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotController@swotupdate',
        'controller' => 'App\\Http\\Controllers\\SwotController@swotupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Pwx5PDgB4pnbnumM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OkxSDk7NFUnQ3pne' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'swotanalysis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysis',
        'controller' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysis',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OkxSDk7NFUnQ3pne',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NGxYg82czsTLH03i' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'swotanalysis/swotanalysiscreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysiscreate',
        'controller' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysiscreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::NGxYg82czsTLH03i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1f7zdfBeSKcgRHvC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'swotanalysis/{swotanalysis}/swotanalysisdelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysisdelete',
        'controller' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysisdelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::1f7zdfBeSKcgRHvC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hcO5WPOJtF3P7bja' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'swotanalysis/{swotanalysis}/swotanalysisedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysisedit',
        'controller' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysisedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hcO5WPOJtF3P7bja',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NeesXw5oi8gMXJ7a' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'swotanalysis/{swotanalysis}/swotanalysisupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysisupdate',
        'controller' => 'App\\Http\\Controllers\\SwotanalysisController@swotanalysisupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::NeesXw5oi8gMXJ7a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LuYgTXgidrhNNH5n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'langkahstrategis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategis',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategis',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LuYgTXgidrhNNH5n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FrBgSclFwYKX8eSx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'langkahstrategis/langkahstrategiscreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategiscreate',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategiscreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::FrBgSclFwYKX8eSx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::74KBFk1dsBfp7tw2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'langkahstrategis/{langkahstrategis}/langkahstrategisdelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategisdelete',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategisdelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::74KBFk1dsBfp7tw2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6ij4gsUnsa40EOow' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'langkahstrategis/{langkahstrategis}/langkahstrategisedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategisedit',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategisedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::6ij4gsUnsa40EOow',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0J1kWFuIYJ2DPjB7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'langkahstrategis/{langkahstrategis}/langkahstrategisupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategisupdate',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@langkahstrategisupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0J1kWFuIYJ2DPjB7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dependent-dropdown.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dependent-dropdown',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\DependentDropdownController@store',
        'controller' => 'App\\Http\\Controllers\\DependentDropdownController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dependent-dropdown.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::t3QJgL6fjJOETaVI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'merk',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PagesController@index',
        'controller' => 'App\\Http\\Controllers\\PagesController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::t3QJgL6fjJOETaVI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9CnFPAtlFSTx0cqJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'merk/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PagesController@merkAjax',
        'controller' => 'App\\Http\\Controllers\\PagesController@merkAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9CnFPAtlFSTx0cqJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tp6flVKVRis32m9v' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'spmi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@spmi',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@spmi',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::tp6flVKVRis32m9v',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6sSan5Gkuw37RQF5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'spmi/spmicreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@spmicreate',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@spmicreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::6sSan5Gkuw37RQF5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KZxxCBdU6WRmtPZk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'spmi/{spmi}/spmiedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@spmiedit',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@spmiedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::KZxxCBdU6WRmtPZk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fcgcmh26YC7VZG7J' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'spmi/{spmi}/spmidelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@spmidelete',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@spmidelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::fcgcmh26YC7VZG7J',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::z2NgbTn4NUA1Nbkf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'spmi/{spmi}/spmiupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LangkahstrategisController@spmiupdate',
        'controller' => 'App\\Http\\Controllers\\LangkahstrategisController@spmiupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::z2NgbTn4NUA1Nbkf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ppkn.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ppkn',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PpknController@index',
        'controller' => 'App\\Http\\Controllers\\PpknController@index',
        'namespace' => NULL,
        'prefix' => '/ppkn',
        'where' => 
        array (
        ),
        'as' => 'ppkn.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ppkn.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ppkn',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PpknController@import',
        'controller' => 'App\\Http\\Controllers\\PpknController@import',
        'namespace' => NULL,
        'prefix' => '/ppkn',
        'where' => 
        array (
        ),
        'as' => 'ppkn.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ppkn.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ppkn/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PpknController@edit',
        'controller' => 'App\\Http\\Controllers\\PpknController@edit',
        'namespace' => NULL,
        'prefix' => '/ppkn',
        'where' => 
        array (
        ),
        'as' => 'ppkn.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ppkn.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ppkn/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PpknController@update',
        'controller' => 'App\\Http\\Controllers\\PpknController@update',
        'namespace' => NULL,
        'prefix' => '/ppkn',
        'where' => 
        array (
        ),
        'as' => 'ppkn.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ppkn.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'ppkn/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PpknController@delete',
        'controller' => 'App\\Http\\Controllers\\PpknController@delete',
        'namespace' => NULL,
        'prefix' => '/ppkn',
        'where' => 
        array (
        ),
        'as' => 'ppkn.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EH1kqueVZKdJHZto' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sekolah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\SekolahController@index',
        'controller' => 'App\\Http\\Controllers\\SekolahController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::EH1kqueVZKdJHZto',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VJnmtQu9RmNnvgtE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sekolah/sekolahcreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\SekolahController@sekolahcreate',
        'controller' => 'App\\Http\\Controllers\\SekolahController@sekolahcreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VJnmtQu9RmNnvgtE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZsiiFudme3bmey6E' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sekolah/{sekolah}/sekolahedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\SekolahController@sekolahedit',
        'controller' => 'App\\Http\\Controllers\\SekolahController@sekolahedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ZsiiFudme3bmey6E',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vfFWOE8PbrJGgnpE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sekolah/{sekolah}/sekolahupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\SekolahController@sekolahupdate',
        'controller' => 'App\\Http\\Controllers\\SekolahController@sekolahupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vfFWOE8PbrJGgnpE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::58jKokRph3xIKVKz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sekolah/{sekolah}/sekolahdelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\SekolahController@sekolahdelete',
        'controller' => 'App\\Http\\Controllers\\SekolahController@sekolahdelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::58jKokRph3xIKVKz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fN0IHm5E5zOu7ICW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sekolah/{sekolah}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\SekolahController@profile',
        'controller' => 'App\\Http\\Controllers\\SekolahController@profile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::fN0IHm5E5zOu7ICW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
          3 => 'cache.headers:private;max_age=3600',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\DashboardController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contacts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'contacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@contacts',
        'controller' => 'App\\Http\\Controllers\\UserController@contacts',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'contacts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tahunpel.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tahunpel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'tahunpel.index',
        'uses' => 'App\\Http\\Controllers\\TahunpelController@index',
        'controller' => 'App\\Http\\Controllers\\TahunpelController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tahunpel.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tahunpel/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'tahunpel.create',
        'uses' => 'App\\Http\\Controllers\\TahunpelController@create',
        'controller' => 'App\\Http\\Controllers\\TahunpelController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tahunpel.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'tahunpel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'tahunpel.store',
        'uses' => 'App\\Http\\Controllers\\TahunpelController@store',
        'controller' => 'App\\Http\\Controllers\\TahunpelController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tahunpel.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tahunpel/{tahunpel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'tahunpel.show',
        'uses' => 'App\\Http\\Controllers\\TahunpelController@show',
        'controller' => 'App\\Http\\Controllers\\TahunpelController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tahunpel.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tahunpel/{tahunpel}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'tahunpel.edit',
        'uses' => 'App\\Http\\Controllers\\TahunpelController@edit',
        'controller' => 'App\\Http\\Controllers\\TahunpelController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tahunpel.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'tahunpel/{tahunpel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'tahunpel.update',
        'uses' => 'App\\Http\\Controllers\\TahunpelController@update',
        'controller' => 'App\\Http\\Controllers\\TahunpelController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tahunpel.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'tahunpel/{tahunpel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'tahunpel.destroy',
        'uses' => 'App\\Http\\Controllers\\TahunpelController@destroy',
        'controller' => 'App\\Http\\Controllers\\TahunpelController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mapel.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mapel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'mapel.index',
        'uses' => 'App\\Http\\Controllers\\MapelController@index',
        'controller' => 'App\\Http\\Controllers\\MapelController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mapel.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mapel/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'mapel.create',
        'uses' => 'App\\Http\\Controllers\\MapelController@create',
        'controller' => 'App\\Http\\Controllers\\MapelController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mapel.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mapel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'mapel.store',
        'uses' => 'App\\Http\\Controllers\\MapelController@store',
        'controller' => 'App\\Http\\Controllers\\MapelController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mapel.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mapel/{mapel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'mapel.show',
        'uses' => 'App\\Http\\Controllers\\MapelController@show',
        'controller' => 'App\\Http\\Controllers\\MapelController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mapel.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mapel/{mapel}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'mapel.edit',
        'uses' => 'App\\Http\\Controllers\\MapelController@edit',
        'controller' => 'App\\Http\\Controllers\\MapelController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mapel.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'mapel/{mapel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'mapel.update',
        'uses' => 'App\\Http\\Controllers\\MapelController@update',
        'controller' => 'App\\Http\\Controllers\\MapelController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mapel.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'mapel/{mapel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'mapel.destroy',
        'uses' => 'App\\Http\\Controllers\\MapelController@destroy',
        'controller' => 'App\\Http\\Controllers\\MapelController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'posting.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'posting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'posting.index',
        'uses' => 'App\\Http\\Controllers\\PostingController@index',
        'controller' => 'App\\Http\\Controllers\\PostingController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'posting.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'posting/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'posting.create',
        'uses' => 'App\\Http\\Controllers\\PostingController@create',
        'controller' => 'App\\Http\\Controllers\\PostingController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'posting.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'posting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'posting.store',
        'uses' => 'App\\Http\\Controllers\\PostingController@store',
        'controller' => 'App\\Http\\Controllers\\PostingController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'posting.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'posting/{posting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'posting.show',
        'uses' => 'App\\Http\\Controllers\\PostingController@show',
        'controller' => 'App\\Http\\Controllers\\PostingController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'posting.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'posting/{posting}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'posting.edit',
        'uses' => 'App\\Http\\Controllers\\PostingController@edit',
        'controller' => 'App\\Http\\Controllers\\PostingController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'posting.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'posting/{posting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'posting.update',
        'uses' => 'App\\Http\\Controllers\\PostingController@update',
        'controller' => 'App\\Http\\Controllers\\PostingController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'posting.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'posting/{posting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'as' => 'posting.destroy',
        'uses' => 'App\\Http\\Controllers\\PostingController@destroy',
        'controller' => 'App\\Http\\Controllers\\PostingController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruController@index',
        'controller' => 'App\\Http\\Controllers\\GuruController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r3bH8okCXRH4LNci' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'guru/gurucreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruController@gurucreate',
        'controller' => 'App\\Http\\Controllers\\GuruController@gurucreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::r3bH8okCXRH4LNci',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::woKwYR4x8ItRNOku' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/{guru}/guruedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruController@guruedit',
        'controller' => 'App\\Http\\Controllers\\GuruController@guruedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::woKwYR4x8ItRNOku',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3mxj8zetumxzRKGi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'guru/{guru}/guruupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruController@guruupdate',
        'controller' => 'App\\Http\\Controllers\\GuruController@guruupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::3mxj8zetumxzRKGi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pSDuiXvZgMaRfQYn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/{guru}/gurudelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruController@gurudelete',
        'controller' => 'App\\Http\\Controllers\\GuruController@gurudelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pSDuiXvZgMaRfQYn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rombel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rombel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\RombelController@index',
        'controller' => 'App\\Http\\Controllers\\RombelController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'rombel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::feVPig22zTn4kWJT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'rombel/rombelcreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\RombelController@rombelcreate',
        'controller' => 'App\\Http\\Controllers\\RombelController@rombelcreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::feVPig22zTn4kWJT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LFSBTVKw44lyfLnx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rombel/{rombel}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\RombelController@rombelprofile',
        'controller' => 'App\\Http\\Controllers\\RombelController@rombelprofile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LFSBTVKw44lyfLnx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rombel-siswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rombel_siswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\RombelController@rombel_siswa',
        'controller' => 'App\\Http\\Controllers\\RombelController@rombel_siswa',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'rombel-siswa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HQpjJodIiyonkiZj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'rombel/rombelsiswacreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\RombelController@rombelsiswacreate',
        'controller' => 'App\\Http\\Controllers\\RombelController@rombelsiswacreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HQpjJodIiyonkiZj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JMR7XPm6wrR4jMzc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rombel/{siswa_id}/rombelsiswadelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\RombelController@rombelsiswadelete',
        'controller' => 'App\\Http\\Controllers\\RombelController@rombelsiswadelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::JMR7XPm6wrR4jMzc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::m1gCYArksxdE9iLE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'moodle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MoodleController@moodle',
        'controller' => 'App\\Http\\Controllers\\MoodleController@moodle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::m1gCYArksxdE9iLE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XgvsTHq6SSbTXLz8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rombel/{rombel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RombelController@show',
        'controller' => 'App\\Http\\Controllers\\RombelController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::XgvsTHq6SSbTXLz8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hKLbjehlfgNQ4rC2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'extra/import_extra_excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
          3 => 'cache.headers:private;max_age=3600',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@import_extra_excel',
        'controller' => 'App\\Http\\Controllers\\NilaiController@import_extra_excel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hKLbjehlfgNQ4rC2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'extra' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'extra',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
          3 => 'cache.headers:private;max_age=3600',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@extra',
        'controller' => 'App\\Http\\Controllers\\NilaiController@extra',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'extra',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hBaasfuj71dZ9HPc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'extra/extracreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@extracreate',
        'controller' => 'App\\Http\\Controllers\\NilaiController@extracreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hBaasfuj71dZ9HPc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JgylvUObLPPqWREH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'extra/{extra}/extradelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@extradelete',
        'controller' => 'App\\Http\\Controllers\\NilaiController@extradelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::JgylvUObLPPqWREH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OZIfAjEnC8SXNihE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'extra/{extra}/extraedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@extraedit',
        'controller' => 'App\\Http\\Controllers\\NilaiController@extraedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OZIfAjEnC8SXNihE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vCaHV7INK7ZaTSxg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'extra/{extra}/extraupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@extraupdate',
        'controller' => 'App\\Http\\Controllers\\NilaiController@extraupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vCaHV7INK7ZaTSxg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OUd48CXY1b2p60My' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'extra_filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:1092:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:873:"function () {
        if (\\request()->start_date || \\request()->end_date) {
            $start_date = \\Carbon\\Carbon::parse(\\request()->start_date)->toDateTimeString();
            $end_date = \\Carbon\\Carbon::parse(\\request()->end_date)->toDateTimeString();
            $data_extra = \\App\\Models\\Extra::whereBetween(\'created_at\', [$start_date, $end_date])->get();
        } else {
            $data_extra = \\App\\Models\\Extra::latest()->get();
        }
        $kompetensiinti = \\App\\Models\\Kompetensiinti::all();
        $mapel = \\App\\Models\\Mapel::all();
        $siswa = \\App\\Models\\Siswa::all();
        $penilaian = \\App\\Models\\Penilaian::all();
        $guru = \\App\\Models\\Guru::all();
        $kelas = \\App\\Models\\Kelas::all();
        return \\view(\'nilai.extrafilter\', \\compact(\'data_extra\', \'mapel\', \'siswa\', \'penilaian\', \'guru\', \'kelas\', \'kompetensiinti\'));
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a5e0000000000000000";}";s:4:"hash";s:44:"l5GAqzLDx+JMgESfgRsoer0OLD+WUSO6XbDE5oYWnSU=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OUd48CXY1b2p60My',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wG49ZGdrbr4PqYnH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/{id}/export_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
          3 => 'cache.headers:private;max_age=3600',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@cetak_pdf',
        'controller' => 'App\\Http\\Controllers\\SiswaController@cetak_pdf',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::wG49ZGdrbr4PqYnH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZdOB23Y6DUhC7JpM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/{id}/cover_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
          3 => 'cache.headers:private;max_age=3600',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@cover_pdf',
        'controller' => 'App\\Http\\Controllers\\SiswaController@cover_pdf',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ZdOB23Y6DUhC7JpM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R876HWspqUK8zix7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/{id}/biodata_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
          3 => 'cache.headers:private;max_age=3600',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@biodata_pdf',
        'controller' => 'App\\Http\\Controllers\\SiswaController@biodata_pdf',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::R876HWspqUK8zix7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gHzS6tUoPysWpIjY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/{guru}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
          3 => 'cache.headers:private;max_age=3600',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruController@profile',
        'controller' => 'App\\Http\\Controllers\\GuruController@profile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gHzS6tUoPysWpIjY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'siswa.editnilai' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'siswa/editnilai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@editnilai',
        'controller' => 'App\\Http\\Controllers\\SiswaController@editnilai',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'siswa.editnilai',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'testsiswaprofile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test/{siswa}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:admin,siswa,guru,tata_usaha',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@testprofile',
        'controller' => 'App\\Http\\Controllers\\SiswaController@testprofile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'testsiswaprofile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'test' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
          3 => 'cache.headers:private;max_age=3600',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@test',
        'controller' => 'App\\Http\\Controllers\\SiswaController@test',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ymZNJV9cOEWn3K7R' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'test/testcreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@testcreate',
        'controller' => 'App\\Http\\Controllers\\SiswaController@testcreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ymZNJV9cOEWn3K7R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CRSGwSwi3e7RbbCs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test/{siswa}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@testedit',
        'controller' => 'App\\Http\\Controllers\\SiswaController@testedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::CRSGwSwi3e7RbbCs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nFi5yZbChy3sDqPN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'test/{siswa}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@testupdate',
        'controller' => 'App\\Http\\Controllers\\SiswaController@testupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nFi5yZbChy3sDqPN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bQusRF0CZ0SP4qGM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test/{siswa}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@testdelete',
        'controller' => 'App\\Http\\Controllers\\SiswaController@testdelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::bQusRF0CZ0SP4qGM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::08nxhHW8TdlWEqSK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'test/{siswa}/addnilai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@testaddnilai',
        'controller' => 'App\\Http\\Controllers\\SiswaController@testaddnilai',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::08nxhHW8TdlWEqSK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OKnQKXRRMNa2qT2X' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test/{siswa}/{idmapel}/testdeletenilai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@testdeletenilai',
        'controller' => 'App\\Http\\Controllers\\SiswaController@testdeletenilai',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OKnQKXRRMNa2qT2X',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AjCryFjJ2e5rVu9L' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test/{id}/aktivasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SiswaController@testaktivasi',
        'controller' => 'App\\Http\\Controllers\\SiswaController@testaktivasi',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::AjCryFjJ2e5rVu9L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tdu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tdu',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\DashboardController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'tdu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kurikulum' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kurikulum',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KurikulumController@index',
        'controller' => 'App\\Http\\Controllers\\KurikulumController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kurikulum',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'kesiswaan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kesiswaan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\KesiswaanController@index',
        'controller' => 'App\\Http\\Controllers\\KesiswaanController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'kesiswaan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uQVVBmTdbmvjDQ7k' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'widget',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WidgetController@index',
        'controller' => 'App\\Http\\Controllers\\WidgetController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::uQVVBmTdbmvjDQ7k',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'isinilai' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'isinilai/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@isinilai',
        'controller' => 'App\\Http\\Controllers\\NilaiController@isinilai',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'isinilai',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hv3z9GvU6JhZkgjh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getSiswa/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@getSiswa',
        'controller' => 'App\\Http\\Controllers\\NilaiController@getSiswa',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hv3z9GvU6JhZkgjh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::g11aorKKaaWNe7Cc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getNamaSiswa/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@getNamaSiswa',
        'controller' => 'App\\Http\\Controllers\\NilaiController@getNamaSiswa',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::g11aorKKaaWNe7Cc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QgBOtECBtJ0xnVSA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getNamaDepan/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@getNamaDepan',
        'controller' => 'App\\Http\\Controllers\\NilaiController@getNamaDepan',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::QgBOtECBtJ0xnVSA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Hs4Jj7CcxP7XYSha' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getNamaBelakang/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@getNamaBelakang',
        'controller' => 'App\\Http\\Controllers\\NilaiController@getNamaBelakang',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Hs4Jj7CcxP7XYSha',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fWLxV5YRlb4ANeYj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nilai_filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:1069:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:850:"function () {
        if (\\request()->start_date || \\request()->end_date) {
            $start_date = \\Carbon\\Carbon::parse(\\request()->start_date)->toDateTimeString();
            $end_date = \\Carbon\\Carbon::parse(\\request()->end_date)->toDateTimeString();
            $data = \\App\\Models\\Nilai::whereBetween(\'created_at\', [$start_date, $end_date])->get();
        } else {
            $data = \\App\\Models\\Nilai::latest()->get();
        }
        $kompetensiinti = \\App\\Models\\Kompetensiinti::all();
        $mapel = \\App\\Models\\Mapel::all();
        $siswa = \\App\\Models\\Siswa::all();
        $penilaian = \\App\\Models\\Penilaian::all();
        $guru = \\App\\Models\\Guru::all();
        $kelas = \\App\\Models\\Kelas::all();
        return \\view(\'nilai.filter\', \\compact(\'data\', \'mapel\', \'siswa\', \'penilaian\', \'guru\', \'kelas\', \'kompetensiinti\'));
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a770000000000000000";}";s:4:"hash";s:44:"HWJdh8/9Z15lwWSBJ9nFqF0RkYEp1trsT+F0DMyLmBI=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::fWLxV5YRlb4ANeYj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LQeUT67AnNnsieKh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nilai/import_excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@import_excel',
        'controller' => 'App\\Http\\Controllers\\NilaiController@import_excel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LQeUT67AnNnsieKh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7r9AKNWXJkxl5mqm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nilai/export_excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@export_excel',
        'controller' => 'App\\Http\\Controllers\\NilaiController@export_excel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::7r9AKNWXJkxl5mqm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MPeMaz97if1YGNWn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nilai/nilaicreate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@nilaicreate',
        'controller' => 'App\\Http\\Controllers\\NilaiController@nilaicreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::MPeMaz97if1YGNWn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IOsQ7QXbOGrjdruB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nilai/{nilai}/nilaidelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@nilaidelete',
        'controller' => 'App\\Http\\Controllers\\NilaiController@nilaidelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::IOsQ7QXbOGrjdruB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8qhh1cdM6Gy0YaCz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nilai/{nilai}/nilaiedit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@nilaiedit',
        'controller' => 'App\\Http\\Controllers\\NilaiController@nilaiedit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8qhh1cdM6Gy0YaCz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mupoxTNlokdPmVwp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nilai/{nilai}/nilaiupdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@nilaiupdate',
        'controller' => 'App\\Http\\Controllers\\NilaiController@nilaiupdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mupoxTNlokdPmVwp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hapusBanyak' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'selected-nilai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@hapusBanyak',
        'controller' => 'App\\Http\\Controllers\\NilaiController@hapusBanyak',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'hapusBanyak',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nilai.multi-delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'posts/multi-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'checkRole:guru,tata_usaha,admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiController@multiDelete',
        'controller' => 'App\\Http\\Controllers\\NilaiController@multiDelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'nilai.multi-delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6bU5Z4It24PEBPEK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'audits',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'App\\Http\\Middleware\\AllowOnlyAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\AuditController@index',
        'controller' => 'App\\Http\\Controllers\\AuditController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::6bU5Z4It24PEBPEK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'site.single.post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@singlepost',
        'as' => 'site.single.post',
        'controller' => 'App\\Http\\Controllers\\JurnalController@singlepost',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
