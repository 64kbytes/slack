<?php

namespace Baytree\Slack;

use \GuzzleHttp\Client as HTTPClient;

class Client
{
	public function __construct(HTTPClient $HTTPClient)
	{
		$this->http = $HTTPClient;
	}

	public function send()
	{
		$r = $this->http->post('https://hooks.slack.com/services/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', [
            'json' => [
                "text" => "This is a test message",
                //"channel" => "#devops",
                "link_names" => 1, 
                "username" => "myacobs", 
                "icon_emoji" => ":monkey_face:"
            ]
        ]);
	}
}