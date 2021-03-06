<?php

namespace SMW\DataValues;

use SMWStringValue as StringValue;
use SMW\Localizer;
use SMWDIBlob as DIBlob;

/**
 * Handles a string value to adhere the BCP47 normative content declaration for
 * a languge code tag
 *
 * @see https://en.wikipedia.org/wiki/IETF_language_tag
 *
 * @license GNU GPL v2+
 * @since 2.4
 *
 * @author mwjames
 */
class LanguageCodeValue extends StringValue {

	/**
	 * @param string $typeid
	 */
	public function __construct( $typeid = '' ) {
		parent::__construct( '__lcode' );
	}

	/**
	 * @see DataValue::parseUserValue
	 *
	 * @param string $value
	 */
	protected function parseUserValue( $userValue ) {

		$languageCode = Localizer::asBCP47FormattedLanguageCode( $userValue );

		if ( $languageCode === '' ) {
			$this->addError( wfMessage(
				'smw-datavalue-languagecode-missing',
				$this->m_property !== null ? $this->m_property->getLabel() : 'UNKNOWN' )->text()
			);
			return;
		}

		// Checks whether any localisation is available for that language tag in
		// MediaWiki
		if ( !Localizer::isSupportedLanguage( $languageCode ) ) {
			$this->addError( wfMessage( 'smw-datavalue-languagecode-invalid', $languageCode )->text() );
			return;
		}

		$this->m_dataitem = new DIBlob( $languageCode );
	}

}
