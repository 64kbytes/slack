<?php

namespace Baytree\Slack;

use \GuzzleHttp\Client as HTTPClient;

class Client
{
	
	public function __construct(HTTPClient $HTTPClient)
	{
		$this->http = $HTTPClient;
	}

	public function getQuote()
	{
		$response = $this->http->get('http://quotesondesign.com/wp-json/posts?filter[orderby]=rand&filter[posts_per_page]=1&callback=');
		
		$quote = json_decode((string) $response->getBody());
		$quote = $quote[0];
		$quote->content = html_entity_decode(strip_tags($quote->content));
		$quote->title = html_entity_decode($quote->title);
		return "{$quote->content} - {$quote->title}";
	}

	protected function post($message)
	{
		$r = $this->http->post(\Config::get('slack.credentials.url'), [
            'json' => $message
        ]);
	}

	public function send($message)
	{
		try{
			$this->post($message->get());
	    }
	    catch(\GuzzleHttp\Exception\ClientException $e){

	    	$fallback_msg = [
	    		'username' => 'KnowItFirst',
            	'text' => "Tried to send an exception from ".(\Config::get('app.name'))." to Slack, but couldn't".PHP_EOL.
            		"Here is the error:".PHP_EOL.$e->getMessage().PHP_EOL.
            		"And here is the original message:".PHP_EOL.( (string) $message )
            ];

            $this->post($fallback_msg);

	    }
	    catch(\GuzzleHttp\Exception\ConnectException $e){
	    	throw $e;
	    }
	}
}