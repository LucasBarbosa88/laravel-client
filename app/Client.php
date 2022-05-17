<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'id', 'name',
    ];

    public static function createClient($name, $email, $phone)
    {
        // $phone = preg_replace('/[^0-9]/', '', $phone);
        $client = new Client;
        $client->name  		= $name;
        $client->email  	= $email;
        $client->phone  	= $phone;

        if($client->save()){
            return $client;
        }

        return false;
    }

    public static function updateClient($id, $name, $email, $phone)
    {
        $client = Client::find($id);
        // $phone = preg_replace('/[^0-9]/', '', $phone);
        if($client){
            $client->name = $name;
            $client->email = $email;
            $client->phone = $phone;

            if($client->save()){
                return $client;
            }
        }
        return false;
    }
}
