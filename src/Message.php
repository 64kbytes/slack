<?php

namespace Baytree\Slack;

class BaseMessage{

	protected $message;

	protected function set($key, $value)
	{
		$this->message[$key] = $value;
	}

	public function push($key, $value)
	{
		if(!isset($this->message[$key]))
			$this->message[$key] = [];

		array_push($this->message[$key], $value);
		return $this;
	}

	public function get()
	{
		return $this->message;
	}

	public function __toString()
	{
		return json_encode($this->message);
	}
}

class Message extends BaseMessage
{

	public function text($text)
	{
		$this->message['text'] = $text;
		return $this;
	}

	public function username($username)
	{
		$this->message['username'] = $username;
		return $this;
	}

	public function emoji($emoji)
	{
		$this->message['icon_emoji'] = $emoji;
		return $this;
	}

	public function channel($channel)
	{
		$this->message['channel'] = $channel;
		return $this;
	}

	public function add_attachment($attachment)
	{
		$this->push('attachments', $attachment->get());
	    return $this;
	}
}

class Attachment extends BaseMessage{

	public function fallback($text)
	{
		$this->set('fallback', $text);
		return $this;
	}

	public function color($hex)
	{
		$this->set('color', $hex);
		return $this;
	}

	public function pretext($text)
	{
		$this->set('pretext', $text);
		return $this;
	}

	public function author_name($author_name)
	{
		$this->set('author_name', $author_name);
		return $this;
	}

	public function author_link($author_link)
	{
		$this->set('author_link', $author_link);
		return $this;
	}

	public function author_icon($author_icon)
	{
		$this->set('author_icon', $author_icon);
		return $this;
	}

	public function title($title)
	{
		$this->set('title', $title);
		return $this;
	}

	public function title_link($title_link)
	{
		$this->set('title_link', $title_link);
		return $this;
	}

	public function text($text)
	{
		$this->set('text', $text);
		return $this;
	}

	public function add_field($field)
	{
		$this->push('fields', $field->get());
		return $this;
	}

	public function image_url($image_url)
	{
		$this->set('image_url', $image_url);
		return $this;
	}

	public function thumb_url($thumb_url)
	{
		$this->set('thumb_url', $thumb_url);
		return $this;
	}

	public function footer($footer)
	{
		$this->set('footer', $footer);
		return $this;
	}

	public function footer_icon($footer_icon)
	{
		$this->set('footer_icon', $footer_icon);
		return $this;
	}

	public function timestamp($timestamp)
	{
		$this->set('ts', $timestamp);
		return $this;
	}
}

class Field extends BaseMessage{

	public function title($title)
	{
		$this->set('title', $title);
		return $this;
	}

	public function value($value)
	{
		$this->set('value', $value);
		return $this;
	}

	public function short($short)
	{
		$this->set('short', $short);
		return $this;
	}
}