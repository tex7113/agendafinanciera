<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Database;
use Kreait\Firebase\Firestore;

class FirebaseService
{
    protected Auth $auth;
    protected Messaging $messaging;
    protected Database $database;
    protected Firestore $firestore;

    public function __construct()
    {

        $path = storage_path('app/firebase/firebase_credentials.json');

        if (!file_exists($path)) {
            die("Este archivo Path .{$path}. no esxiste");
        }
        $factory = (new Factory)
        ->withServiceAccount($path)
        ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $this->auth = $factory->createAuth();
        $this->messaging = $factory->createMessaging();
        $this->database = $factory->createDatabase();
        $this->firestore = $factory->createFirestore();
    }

    public function getAuth(): Auth
    {
        return $this->auth;
    }

    public function getMessaging(): Messaging
    {
        return $this->messaging;
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }
    public function getFirestore(): Firestore
{
    return $this->firestore;
}
}
