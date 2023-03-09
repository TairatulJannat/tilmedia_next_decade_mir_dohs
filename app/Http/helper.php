<?php

function api_config()
{
    return [
        'api_secrate_key' => "1234567812345678",
        'cas_vendor' => "abv",
        'cas_version' => "5.7",
    ];
}

function cas_status_check()
{
    $respones_data = \Illuminate\Support\Facades\Http::post('http://103.159.218.154:5050/api/status', [
        'api_secret_key' => api_config()['api_secrate_key'],
        'cas_vendor' => api_config()['cas_vendor'],
        'cas_version' => api_config()['cas_version'],
    ]);

    return $respones_data->json();
}

function package_update($sc_id, $package_id, $start_date, $end_date)
{
    $respones_data = \Illuminate\Support\Facades\Http::post('http://103.159.218.154:5050/api/entitlement_update', [
        'api_secret_key' => api_config()['api_secrate_key'],
        'cas_vendor' => api_config()['cas_vendor'],
        'cas_version' => api_config()['cas_version'],
        "sc_id" => $sc_id,
        "package_id" => $package_id,
        "start_date" => $start_date,
        "end_date" => $end_date
    ]);

    return $respones_data->json();
}

function add_smart_card($sc_id, $stb_id, $customer_id, $name, $contact_no, $address)
{
    $respones_data = \Illuminate\Support\Facades\Http::post('http://103.159.218.154:5050/api/add_smart_card', [
        'api_secret_key' => api_config()['api_secrate_key'],
        'cas_vendor' => api_config()['cas_vendor'],
        'cas_version' => api_config()['cas_version'],
        "sc_id" => $sc_id, //smc id from set-top-box
        "stb_id" => $stb_id, //stb id set-top-box
        "customer_id" => $customer_id,
        "name" => $name,
        "contact_no" => $contact_no,
        "address" => $address
    ]);

    return $respones_data->json();
}

function deactivate_smart_card($sc_id, $customer_id)
{ 
    $respones_data = \Illuminate\Support\Facades\Http::post('http://103.159.218.154:5050/api/deactivate_smart_card', [
        'api_secret_key' => api_config()['api_secrate_key'],
        'cas_vendor' => api_config()['cas_vendor'],
        'cas_version' => api_config()['cas_version'],
        "sc_id" => $sc_id,
        "customer_id" => $customer_id,
    ]);

    return $respones_data->json();
}