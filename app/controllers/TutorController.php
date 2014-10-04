<?php

class TutorController extends BaseController {

    public function getTutor($tutor_id) {
        $tutor = Tutor::find($tutor_id);

        return Response::json(array(
            'error' => false,
            'tutor' => $tutor),
            200
        );
    }

    public function filterBySubject($subject, $user_id) {
        $customer = DB::table('users')->where('id', '=', $user_id)->first();
        $tutors = DB::table('subjects')->where('subject', '=', $subject)->get();

        foreach ($tutors as &$tutor) {
            $customer_home_address = $customer->home_address;
            $tutor_home_address = $tutor->user()->home_address;

            // Find the LatLong of Customer
            $address = str_replace(' ', '+', $customer_home_address);
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $geoloc = curl_exec($ch);
            $json = json_decode($geoloc);
            $start = array($json->results[0]->geometry->location->lat, $json->results[0]->geometry->location->lng);

            // Find the LatLong of Tutor (this is a hackathon; DRY doesn't exist here)
            $address = str_replace(' ', '+', $tutor_home_address);
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $geoloc = curl_exec($ch);
            $json = json_decode($geoloc);
            $finish = array($json->results[0]->geometry->location->lat, $json->results[0]->geometry->location->lng);

            $theta = $start[1] - $finish[1];
            $distance = (sin(deg2rad($start[0])) * sin(deg2rad($finish[0]))) + (cos(deg2rad($start[0])) * cos(deg2rad($finish[0])) * cos(deg2rad($theta)));
            $distance = acos($distance);
            $distance = rad2deg($distance);
            $distance = $distance * 60 * 1.1515;
            $distance = round($distance, 2);

            $tutor['distance'] = $distance;
        }

        usort($tutors, function ($a, $b)
        {
            return $a['distance'] - $b['distance'];
        });

        return Response::json(array(
            'error' => false,
            'tutors' => $tutors),
            200
        );
    }

} 