<?php

namespace ENTERWELL_THEME\Inc;

use WP_REST_Request;
use ENTERWELL_THEME\Inc\Traits\Singleton;

class Enterwell_Cont
{
    use Singleton;
    public $db_context;

    protected function __construct()
    {
        $this->db_context = Enterwell_DB::get_instance();
        $this->setup_routes();
    }

    protected function setup_routes()
    {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public function  register_routes()
    {
        register_rest_route('enterwell/v1', '/game', [
            'methods' => "POST",
            'callback' => function (WP_REST_Request $request_data) {

                $data = json_decode($request_data->get_body());
                $response =       $this->db_context->save_game_in_database($data);

                return rest_ensure_response($response);
            }
        ]);
        register_rest_route('enterwell/v1', '/stats/(?P<offset>\d+)/(?P<limit>\d+)', [
            'methods' => "GET",
            'callback' => function (WP_REST_Request $request_data) {
                $data = $request_data->get_params();
                $offset = $data['offset'];
                $limit = $data['limit'];
                //  $log = $data['log'];

                $response =       $this->db_context->get_data_by_descending($limit, $offset);
                return rest_ensure_response($response);
            }
        ]);
    }
}
