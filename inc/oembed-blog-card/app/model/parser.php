<?php
class Earn_Pocket_Money_oEmbed_Blog_Card_Parser {
	protected $url;
	protected $content;
	protected $status_code;

	public function __construct( $url ) {
		$this->url = $url;

		$context = stream_context_create( array(
			'http' => array(
				'ignore_errors' => true,
			)
		) );

		$this->content = file_get_contents( $url, false, $context );
		if ( function_exists( 'mb_convert_encoding' ) ) {
			foreach( array( 'UTF-8', 'SJIS', 'EUC-JP', 'ASCII', 'JIS' ) as $encode ) {
				$encoded_content = mb_convert_encoding( $this->content, $encode, $encode );
				if ( strcmp( $this->content, $encoded_content ) === 0 ) {
					$from_encode = $encode;
					break;
				}
			}
			if ( ! empty( $from_encode ) ) {
				$this->content = mb_convert_encoding( $this->content, get_bloginfo( 'charset' ), $from_encode );
			}
		}

		if ( ! empty( $http_response_header[0] ) ) {
			preg_match( '/HTTP\/\d\.\d ([0-9]{3})/', $http_response_header[0], $reg );
			if ( $reg[1] ) {
				$this->status_code = $reg[1];
			}
		}
		if ( ! $this->status_code ) {
			$this->status_code = '404';
		}
	}

	public function get_status_code() {
		return $this->status_code;
	}

	public function get_title() {
		preg_match( '/<meta +?property=["\']og:title["\'][^\/>]*? content=["\']([^"\']+?)["\'].*?\/?>/si', $this->content, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}

		preg_match( '/<title>([^"\']+?)<\/title>/si', $this->content, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}
	}

	public function get_permalink() {
		preg_match( '/<meta +?property=["\']og:url["\'][^\/>]*? content=["\']([^"\']+?)["\'].*?\/?>/si', $this->content, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}

		return $this->url;
	}

	public function get_description() {
		preg_match( '/<meta +?property=["\']og:description["\'][^\/>]*? content=["\']([^"\']+?)["\'].*?\/?>/si', $this->content, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}

		preg_match( '/<meta +?name=["\']description["\'][^\/>]*? content=["\']([^"\']+?)["\'].*?\/?>/si', $this->content, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}
	}

	public function get_domain() {
		$permalink = $this->get_permalink();
		preg_match( '/https?:\/\/([^\/]+)/', $permalink, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}
	}

	public function get_favicon() {
		preg_match( '/<link +?rel=["\']shortcut icon["\'][^\/>]*? href=["\']([^"\']+?)["\'][^\/>]*?\/?>/si', $this->content, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}

		preg_match( '/<link +?rel=["\']icon["\'][^\/>]*? href=["\']([^"\']+?)["\'][^\/>]*?\/?>/si', $this->content, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}
	}

	public function get_thumbnail() {
		preg_match( '/<meta +?property=["\']og:image["\'][^\/>]*? content=["\']([^"\']+?)["\'].*?\/?>/si', $this->content, $reg );
		if ( ! empty( $reg[1] ) ) {
			return $reg[1];
		}
	}
}
