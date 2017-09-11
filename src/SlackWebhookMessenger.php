<?php
/**
 * Slack Webhook Messenger Library
 * @ author [mb]
 * 2017-03-06
 *
 */

use GuzzleHttp\Client;

class SlackWebhookMessenger {
  public $username = 'Webhook Messenger';
  public $slackChannelUrl = '';
  public $text = "Text Template";

  /**
   * Constructor to set all values when Object gets instanciated
   * @param string $username        Slack username
   * @param string $slackChannelUrl Slack channel url
   * @param string $text            Text to send in slack message
   */
  function __construct($username = "", $slackChannelUrl = "", $text = "") {
    if(!empty($username)) {
      $this->username = $username;
    }
    if(!empty($slackChannelUrl)) {
      $this->slackChannelUrl = $slackChannelUrl;
    }
    if(!empty($text)) {
      $this->text = $text;
    }
  }

  // Getter

  function getUsername() {
    return $this->username;
  }

  function getSlackChannelUrl() {
    return $this->username;
  }

  function getText() {
    return $this->text;
  }

  //  Setter

  function setUsername($username = '') {
    $this->username = $username;
  }
  function setSlackChannelUrl($slackChannelUrl = '') {
    $this->slackChannelUrl = $slackChannelUrl;
  }
  function setText($text = '') {
    $this->text = $text;
  }

  function sendMessage($text = '') {
    if(!empty($text)) {
      $this->text = $text;
    }
    $slackData = array(
      'username' => $this->username,
      'text' => $this->text,
    );

    $client = new GuzzleHttp\Client();

    $response = $client->post($this->slackChannelUrl, [
      'json' => $slackData
    ]);
    return($response);
  }
}
?>
