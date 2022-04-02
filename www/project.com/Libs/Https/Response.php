<?php
namespace Libs\Https;

# ResponseにHeaderをセット、結果を出力するクラス
# Redirectの機能もここに実装する
class Response {
  private string $content;
  private int $status_code;
  private string $status_text;
  private array $http_headers;

  public function __construct(
    string $content = "",
    int $status_code = Status::HTTP_200_OK,
    string $status_text = ''
  ) {
    $this->content = $content;
    $this->status_code = $status_code;
    # 引数.stetus_textが空の場合、改めてStatusクラスからtextメッセージを取得しにいく。
    # header(string 設定したい文字列)
    $this->status_text = empty($status_text) ? Status::text($status_code) : $status_text;
    $this->http_headers = array();
  }

  /**
   * Send response with header and content
   */
  public function send() {
      # レスポンスヘッダを設定する
    header('HTTP/1.1 '.$this->status_code.' '.$this->status_text);

    foreach ($this->http_headers as $name => $value) {
      header($name.': '.$value);
    }
    echo $this->content;
  }

  public function setHttpHeaders($name, $value) {
    $this->http_headers[$name] = $value;
  }

  public function statusCode() {
    return $this->status_code;
  }

  public function statusText() {
    return $this->status_text;
  }

  public static function redirect($location) {
    $response = new self("",
        Status::HTTP_301_MOVED_PERMANENTLY);
    $response->setHttpHeaders('Location', $location);
    return $response;
  }
}
?>