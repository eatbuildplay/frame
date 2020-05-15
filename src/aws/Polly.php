<?php

namespace Frame\Aws;

class Polly {

  public function __construct() {

    #Setup and Credential settings
    $awsAccessKeyId   = 'AKIAU4ANHID7VOOJKIBA';
    $awsSecretKey     = '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';
    $credentials = new \Aws\Credentials\Credentials($awsAccessKeyId, $awsSecretKey);

    #Polly Text to Speach Code
    $client = new \Aws\Polly\PollyClient([ 'version' => '2016-06-10', 'credentials' => $credentials, 'region' => 'us-east-1' ]);

    $result = $client->synthesizeSpeech(
      [
        'OutputFormat' => 'mp3',
        'Text' => "Hello how are you?",
        'TextType' => 'text',
        'VoiceId' => 'Amy'
      ]
    );

    $resultData = $result->get('AudioStream')->getContents();

    header('Content-Transfer-Encoding: binary');
    header('Content-Type: audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3');
    header('Content-length: ' . strlen($resultData));
    header('Content-Disposition: attachment; filename="pollyTTS.mp3"');
    header('X-Pad: avoid browser bug');
    header('Cache-Control: no-cache');

    echo $resultData;

    die();

  }

}

// new Polly();
