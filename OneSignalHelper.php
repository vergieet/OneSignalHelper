<?php
/**
 * Vergie's Framework 
 */
namespace Vetx;

class OneSignalHelper
{
    /**
     * Constructor
     *
     * @param string $app_id
     * @param string $rest_api_key
     *
     * NOTE:
     * This helper need curl support
     */
    protected $app_id;
    protected $rest_api_key;
    
    public function __construct($app_id,$rest_api_key)
    {
        $this->app_id = $app_id; 
        $this->rest_api_key = $rest_api_key;
        $this->default_template = '';
    }

    public function sendToAll($message,$template_id=''){
        $content = array(
            "en" => $message
            );
        if($template_id ==''){
        $fields = array(
            'app_id' => "",
            'included_segments' => array('All'),
            'contents' => $content
        );
       }else{
        $fields = array(
            'app_id' => $this->app_id,
            'included_segments' => array('All'),
            'contents' => $content,
            'template_id' => $template_id
        );
        }
        
        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',   'Authorization: Basic ' . $this->rest_api_key));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
     public function sendToUser($message,$player_ids,$template_id=''){
        $content = array(
            "en" => $message
            );
        if($template_id ==''){
        $fields = array(
            'app_id' => "",
            'include_player_ids' => $player_ids,
            'contents' => $content
        );
       }else{
        $fields = array(
            'app_id' => $this->app_id,
            'included_segments' => array('All'),
            'contents' => $content,
            'template_id' => $template_id
        );
        }
        
        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',   'Authorization: Basic ' . $this->rest_api_key));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }


}
