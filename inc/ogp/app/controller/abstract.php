<?php
abstract class Earn_Pocket_Money_OGP_Abstract_Controller {

	protected $title;
	protected $type;
	protected $url;
	protected $image;
	protected $description;
	protected $site_name;
	protected $locale;

	public function __construct() {
		$locale = get_locale();
		if ( 5 > strlen( $locale ) ) {
			if ( 'ja' === $locale ) {
				$locale = 'ja_JP';
			} elseif ( 'en' === $locale ) {
				$locale = 'en_US';
			}
		}
		$this->locale = $locale;

		$this->site_name = get_bloginfo( 'name' );

		$this->init();
	}

	abstract protected function init();

	public function get_title() {
		return $this->title;
	}

	public function get_type() {
		return $this->type;
	}

	public function get_url() {
		return $this->url;
	}

	public function get_image() {
		return $this->image;
	}

	public function get_description() {
		return $this->description;
	}

	public function get_site_name() {
		return $this->site_name;
	}

	public function get_locale() {
		return $this->locale;
	}

	/**
	 * Return post|page description
	 *
	 * @return string
	 */
	protected function _get_description( $post = null) {
		$post = get_post( $post );

		if ( class_exists( 'SCF' ) ) {
			$description = wp_strip_all_tags( SCF::get( 'description' ) );
			if ( $description ) {
				return $description;
			}
		}

		$description = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_excerpt ) ) );
		if ( $description ) {
			return $description;
		}

		$description = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_content ) ) );
		if ( $description ) {
			return $description;
		}
	}

	/**
	 * Return year label
	 *
	 * @param string $year
	 * @return string
	 */
	protected function _year( $year ) {
		if ( 'ja' === get_locale() ) {
			$year .= '年';
		}
		return $year;
	}

	/**
	 * Return month label
	 *
	 * @param string $month
	 * @return string
	 */
	protected function _month( $month ) {
		if ( 'ja' === get_locale() ) {
			$month .= '月';
		} else {
			$monthes = array(
				1  => 'January',
				2  => 'February',
				3  => 'March',
				4  => 'April',
				5  => 'May',
				6  => 'June',
				7  => 'July',
				8  => 'August',
				9  => 'September',
				10 => 'October',
				11 => 'November',
				12 => 'December',
			);
			$month = $monthes[ $month ];
		}
		return $month;
	}

	/**
	 * Return day label
	 *
	 * @param string $day
	 * @return string
	 */
	protected function _day( $day ) {
		if ( 'ja' === get_locale() ) {
			$day .= '日';
		}
		return $day;
	}
}
