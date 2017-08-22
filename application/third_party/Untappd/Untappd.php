 <?php

class Untappd_api {

    public $token;
    public $email;
    public $cache;
    public $url = 'https://business.untappd.com/api/v1/';

    public function __construct($email, $token, $cache) {
        $this->email = $email;
        $this->token = $token;
        $this->cache = $cache;
    }

    public function getUser() {
        $url = $this->url . 'current_user';
        return $this->get($url);
    }

    public function getLocations() {
        $url = $this->url . 'locations';
        return $this->get($url);
    }

    protected function get($url) {
        $last_update = $this->cache->lastUpdated($url);

        if (!$last_update || (array_key_exists('Updated_At', $last_update) && time() - $last_update['Updated_At'] > 300)) {
            
            $data = $this->retrieveJSON($url);
            // Cache data
            //$encode = json_encode($data);
            //$encode = htmlspecialchars_decode($encode,ENT_NOQUOTES);
            //$encode = str_replace('\'', '\'\'', $encode);
            //$encode = str_replace('&quot;', '"', $encode);
            
            $params = array(
                'URL'        => $url,
                'JSON'       => json_encode($data),
                'Updated_At' => time()
            );
            $cache = new $this->cache($params);
            $cache->insertOrUpdate();
            //var_dump($data);die;
            return $data;
        }
        else {
            $json = $this->cache->selectByUrl($url);

            //$string = html_entity_decode(str_replace('&quot;', '"', $json->json));            
            //$dec = json_decode($json->json);
            
            $str = str_replace('&quot;', '"', $json->json);
            //$str = str_replace('\'\'', '\'', $str);

            //var_dump(json_decode($str, true)); die;
            return json_decode($str, true);
            //$dec = json_decode($str);
            //var_dump($dec);
            //echo json_last_error();
            //die;
        }

        //return $this->retrieveJSON($url);
    }

    protected function retrieveJSON($url) {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_CONNECTTIMEOUT => 10,
            // Basic auth = email : api token
            CURLOPT_USERPWD        => $this->email . ':' . $this->token
        );

        $handle = curl_init($url);
        curl_setopt_array($handle, $options);
        $data   = curl_exec($handle);
        $err    = curl_errno($handle);
        $errmsg = curl_error($handle) ;
        curl_close($handle);

        return json_decode($data, true);
    }
}