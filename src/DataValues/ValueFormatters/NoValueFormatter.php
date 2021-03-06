<?php

namespace SMW\DataValues\ValueFormatters;

use SMWDataValue as DataValue;
use RuntimeException;

/**
 * @license GNU GPL v2+
 * @since 2.4
 *
 * @author mwjames
 */
class NoValueFormatter extends DataValueFormatter {

	/**
	 * @since 2.4
	 *
	 * {@inheritDoc}
	 */
	public function isFormatterFor( DataValue $dataValue ) {
		return $dataValue instanceOf DataValue;
	}

	/**
	 * @since 2.4
	 *
	 * {@inheritDoc}
	 */
	public function format( $type, $linker = null ) {

		if ( !$this->dataValue instanceOf DataValue ) {
			throw new RuntimeException( "The formatter is missing a valid DataValue object" );
		}

		return $this->dataValue->getDataItem()->getSerialization();
	}

}
