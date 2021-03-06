<?php

namespace SMW\DataValues;

use SMWDataValue as DataValue;
use SMWBoolValue as BooleanValue;

/**
 * @license GNU GPL v2+
 * @since 2.4
 *
 * @author mwjames
 */
class UniquenessConstraintValue extends BooleanValue {

	/**
	 * @since 2.4
	 *
	 * @param string $typeid
	 */
	public function __construct( $typeid = '' ) {
		parent::__construct( '__pvuc' );
	}

	/**
	 * @see DataValue::parseUserValue
	 *
	 * @param string $value
	 */
	protected function parseUserValue( $userValue ) {

		if ( !$this->isEnabledFeature( SMW_DV_PVUC ) ) {
			$this->addErrorMsg(
				array(
					'smw-datavalue-feature-not-supported',
					'SMW_DV_PVUC'
				)
			);
		}

		parent::parseUserValue( $userValue );
	}

}
