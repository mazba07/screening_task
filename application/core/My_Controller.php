<?php

class My_Controller extends CI_Controller
{
    private function urlSafeB64Encode($input)
    {
        return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
    }

    private function urlSafeB64Decode($input)
    {
        $remainder = strlen($input) % 4;
        if ($remainder) {
            $padlen = 4 - $remainder;
            $input .= str_repeat('=', $padlen);
        }
        return base64_decode(strtr($input, '-_', '+/'));
    }

    public function render($page_link = '', $data = array())
    {

        if ($page_link) {
            $far_title = "";
            $far_description = "";
            $seo_keyword = "";
            $seo_image = base_url();
            if (array_key_exists('seo_title', $data)) {
                $data['seo_title'] = $data['seo_title'];
            } else {
                $data['seo_title'] = $far_title;
            }
            if (array_key_exists('seo_description', $data)) {
                $data['seo_description'] = $data['seo_description'];
            } else {
                $data['seo_description'] = $far_description;
            }
            if (array_key_exists('seo_keyword', $data)) {
                $data['seo_keyword'] = $data['seo_keyword'];
            } else {
                $data['seo_keyword'] = $seo_keyword;
            }
            if (array_key_exists('seo_image', $data)) {
                $data['seo_image'] = $data['seo_image'];
            } else {
                $data['seo_image'] = $seo_image;
            }

            $data['content_with_full_page_partial'] = $page_link;
            $this->load->view('partials/template', $data);
        }
    }

    public function send_data($success = '', $message = '', $result = '')
    {
        $datetime = new DateTime();
        $data = array(
            'query' => array(
                'created' => $datetime->format(DateTime::ISO8601),
                "lang" => "en-US"
            ),
            'status' => array(
                'success' => $success,
                'message' => $message
            ),
            'result' => $result
        );

        echo json_encode($data);
    }

    
    public function is_valid_param($param = '', $otherwise = '')
    {
        $param = trim($param);
        if (strtolower($param) != 'null' && is_numeric($param) && $param > 0) {
            return $param;
        } elseif ($otherwise) {
            return $otherwise;
        } else {
            $this->send_data(0, 'Invalid parameter');
        }
    }

    public function encodeValue($value = '')
    {
        $secret = 'Mz';
        $this->load->library('encrypt');

        $secure_encrypted = $this->encrypt->encode(json_encode($value), $secret);
        $encoded_value = $this->urlSafeB64Encode($secure_encrypted);
        return $encoded_value;
    }

    public function decodeValue($value = '')
    {
        $secret = 'Mz';
        $this->load->library('encrypt');

        $decode_base64 = $this->urlSafeB64Decode($value);
        $decoded_value = $this->encrypt->decode($decode_base64, $secret);
        return $decoded_value;
    }

    public function debug($debugArray)
    {
        echo "<pre>";
        print_r($debugArray);
        echo "</pre>";
    }


//    for this site only

}