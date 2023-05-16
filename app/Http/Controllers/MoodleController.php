<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoodleController extends Controller
{
    public function moodle()
    {
        // Tentukan URL Moodle Anda
        $moodle_url = 'https://sdinpresdabolding.sch.id/elearning';

        // Tentukan kunci API pengguna Moodle Anda
        $token = '3cb7d6aab6b82f6e0f922223ecf43ae0';


        // Tentukan endpoint API pengguna Moodle
        $function_name = 'core_user_get_users';

        // Tentukan parameter yang diperlukan untuk endpoint API pengguna Moodle
        $params = array('criteria' => array(array('key' => 'id', 'value' => '3')));
        //dd($params);
        // Buat URL API dengan parameter yang diperlukan
        $api_url = $moodle_url . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name . '&moodlewsrestformat=json' . '&criteria[0][key]=id&criteria[0][value]=3' . 'username=dion87agung' . 'password=t3ngkuraF1q#' . 'service=laravel1';
        //dd($api_url);
        // Buat permintaan API dengan cURL
        $curl = curl_init();
        //dd($curl);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $api_url,
        ));
        $response = curl_exec($curl);

        //dd($response);
        curl_close($curl);

        // Ubah respons JSON menjadi array
        $result = json_decode($response, true);

        // Tampilkan hasilnya
        dd($result);
        return view('moodle.moodle', [
            'result' => $result,

        ]);
    }
}
