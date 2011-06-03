<?php

class Stripe_Invoice extends Stripe_ApiResource {
  public static function constructFrom($values, $apiKey=null) {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public static function retrieve($id, $apiKey=null) {
    $class = get_class();
    return self::scopedRetrieve($class, $id, $apiKey);
  }

  public static function all($params=null, $apiKey=null) {
    $class = get_class();
    return self::scopedAll($class, $params, $apiKey);
  }

  public static function upcoming($params=null, $apiKey=null) {
    $requestor = new Stripe_ApiRequestor($this->apiKey);
    $url = self::classUrl(get_class()) . '/upcoming';
    list($response, $apiKey) = $requestor->request('get', $url, $params);
    return $this->convertToStripeObject($response, $apiKey);
  }
}

?>